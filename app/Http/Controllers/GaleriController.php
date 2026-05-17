<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Halaman galeri publik — kelompok berdasarkan kategori.
     */
    public function index()
    {
        $allGaleri = Galeri::where('status', true)
            ->orderBy('created_at', 'desc')
            ->get();

        $galeriByKategori = $allGaleri->groupBy('kategori');

        return view('pages.galeri', compact('galeriByKategori'));
    }

    /**
     * Halaman detail galeri berdasarkan ID.
     */
    public function show($id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->increment('views');

        return view('pages.galeri-detail', compact('galeri'));
    }
}