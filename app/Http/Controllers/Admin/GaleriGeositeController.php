<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriGeosite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriGeositeController extends Controller
{
    private array $geositeList = ['ambarita', 'tuktuk', 'tomok'];

    public function index()
    {
        $galeriGeosite = GaleriGeosite::orderBy('geosite')->orderBy('kategori')->paginate(10);
        return view('admin.galeri-geosite.index', compact('galeriGeosite'));
    }

    public function create()
    {
        $geositeList = $this->geositeList;
        return view('admin.galeri-geosite.create', compact('geositeList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'geosite'  => 'required|in:ambarita,tuktuk,tomok',
            'status'   => 'nullable|boolean',
        ]);

        $data = [
            'judul'    => $request->judul,
            'kategori' => $request->kategori,
            'geosite'  => $request->geosite,
            'status'   => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('galeri-geosite', 'public');
        }

        GaleriGeosite::create($data);

        return redirect()->route('admin.galeri-geosite.index')
            ->with('success', 'Galeri Geosite berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $galeriGeosite = GaleriGeosite::findOrFail($id);
        $geositeList   = $this->geositeList;
        return view('admin.galeri-geosite.edit', compact('galeriGeosite', 'geositeList'));
    }

    public function update(Request $request, $id)
    {
        $galeriGeosite = GaleriGeosite::findOrFail($id);

        $request->validate([
            'judul'    => 'required|string|max:255',
            'kategori' => 'required|string|max:100',
            'gambar'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:6144',
            'geosite'  => 'required|in:ambarita,tuktuk,tomok',
            'status'   => 'nullable|boolean',
        ]);

        $data = [
            'judul'    => $request->judul,
            'kategori' => $request->kategori,
            'geosite'  => $request->geosite,
            'status'   => $request->has('status') ? 1 : 0,
        ];

        if ($request->hasFile('gambar')) {
            if ($galeriGeosite->gambar && !str_starts_with($galeriGeosite->gambar, 'data:')) {
                Storage::disk('public')->delete($galeriGeosite->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('galeri-geosite', 'public');
        }

        $galeriGeosite->update($data);

        return redirect()->route('admin.galeri-geosite.index')
            ->with('success', 'Galeri Geosite berhasil diupdate!');
    }

    public function destroy($id)
    {
        $galeriGeosite = GaleriGeosite::findOrFail($id);

        if ($galeriGeosite->gambar && !str_starts_with($galeriGeosite->gambar, 'data:')) {
            Storage::disk('public')->delete($galeriGeosite->gambar);
        }

        $galeriGeosite->delete();

        return redirect()->route('admin.galeri-geosite.index')
            ->with('success', 'Galeri Geosite berhasil dihapus!');
    }
}
