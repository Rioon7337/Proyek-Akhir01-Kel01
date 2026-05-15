<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::latest()->paginate(10);
        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'penulis' => 'nullable|string|max:100',
            'status' => 'nullable|boolean'
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'penulis' => $request->penulis ?? 'Admin',
            'status' => $request->has('status') ? 1 : 0
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.edit', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'penulis' => 'nullable|string|max:100',
            'status' => 'nullable|boolean'
        ]);

        $data = [
            'judul' => $request->judul,
            'konten' => $request->konten,
            'penulis' => $request->penulis ?? 'Admin',
            'status' => $request->has('status') ? 1 : 0
        ];

        if ($request->hasFile('gambar')) {
            if ($berita->gambar && !str_starts_with($berita->gambar, 'data:')) {
                Storage::disk('public')->delete($berita->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil diupdate!');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);

        if ($berita->gambar && !str_starts_with($berita->gambar, 'data:')) {
            Storage::disk('public')->delete($berita->gambar);
        }

        $berita->delete();

        return redirect()->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus!');
    }
}