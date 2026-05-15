<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Mail\OtpResetPasswordMail;
use App\Mail\KontakMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class AuthController extends Controller
{
    // ==================== LOGIN ====================

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // ==================== LUPA PASSWORD (OTP) ====================

    /** Langkah 1: Tampilkan form input email */
    public function showForgotForm()
    {
        return view('auth.forgot-password');
    }

    /** Langkah 1: Kirim OTP 6 digit ke email */
    public function sendOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:admin,email'
        ]);

        // Generate OTP 6 digit
        $otp = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);

        // Hapus OTP lama, simpan yang baru (expired 10 menit)
        DB::table('password_resets')->where('email', $request->email)->delete();
        DB::table('password_resets')->insert([
            'email'      => $request->email,
            'token'      => $otp,
            'created_at' => Carbon::now(),
        ]);

        try {
            Mail::to($request->email)->send(new OtpResetPasswordMail($otp, $request->email));

            // Simpan email di session untuk langkah berikutnya
            session(['otp_email' => $request->email]);

            return redirect()->route('password.verify-otp')
                ->with('success', 'Kode OTP 6 digit telah dikirim ke ' . $request->email . '. Berlaku 10 menit.');
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Gagal mengirim email: ' . $e->getMessage()]);
        }
    }

    /** Langkah 2: Tampilkan form input OTP */
    public function showVerifyOtp()
    {
        if (!session('otp_email')) {
            return redirect()->route('password.request');
        }
        return view('auth.verify-otp');
    }

    /** Langkah 2: Verifikasi kode OTP */
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|string|size:6',
        ]);

        $email = session('otp_email');
        if (!$email) {
            return redirect()->route('password.request')->withErrors(['otp' => 'Sesi habis. Silakan ulangi.']);
        }

        $record = DB::table('password_resets')
            ->where('email', $email)
            ->where('token', $request->otp)
            ->first();

        if (!$record) {
            return back()->withErrors(['otp' => 'Kode OTP salah. Silakan coba lagi.']);
        }

        // Cek kadaluarsa (10 menit)
        if (Carbon::now()->diffInMinutes(Carbon::parse($record->created_at)) > 10) {
            DB::table('password_resets')->where('email', $email)->delete();
            session()->forget('otp_email');
            return redirect()->route('password.request')
                ->withErrors(['email' => 'Kode OTP sudah kadaluarsa. Silakan request ulang.']);
        }

        // OTP valid → simpan ke session, redirect ke form reset password
        session(['otp_verified' => true]);
        return redirect()->route('password.reset-form');
    }

    /** Langkah 3: Tampilkan form ganti password */
    public function showResetForm()
    {
        if (!session('otp_email') || !session('otp_verified')) {
            return redirect()->route('password.request');
        }
        return view('auth.reset-password');
    }

    /** Langkah 3: Simpan password baru */
    public function resetPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $email = session('otp_email');
        if (!$email || !session('otp_verified')) {
            return redirect()->route('password.request');
        }

        Admin::where('email', $email)->update([
            'password' => Hash::make($request->password),
        ]);

        DB::table('password_resets')->where('email', $email)->delete();
        session()->forget(['otp_email', 'otp_verified']);

        return redirect()->route('login')
            ->with('success', 'Password berhasil diubah! Silakan login dengan password baru Anda.');
    }

    // ==================== KONTAK ====================

    /** Terima pesan kontak dan kirim ke email admin */
    public function kirimKontak(Request $request)
    {
        $request->validate([
            'nama'    => 'required|string|max:100',
            'email'   => 'required|email|max:100',
            'telepon' => 'nullable|string|max:20',
            'subjek'  => 'required|string|max:100',
            'pesan'   => 'required|string|max:2000',
        ]);

        try {
            Mail::to(config('mail.from.address'))->send(new KontakMail(
                $request->nama,
                $request->email,
                $request->telepon ?? '-',
                $request->subjek,
                $request->pesan
            ));

            return back()->with('success', 'Pesan Anda berhasil dikirim! Kami akan merespons segera.');
        } catch (\Exception $e) {
            return back()->withErrors(['pesan' => 'Gagal mengirim pesan: ' . $e->getMessage()])
                         ->withInput();
        }
    }
}