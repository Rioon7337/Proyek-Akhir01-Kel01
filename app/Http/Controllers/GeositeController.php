<?php

namespace App\Http\Controllers;

use App\Models\Umkm;
use App\Models\Penginapan;
use App\Models\Fasilitas;


class GeositeController extends Controller
{
    public function tuktuk()
    {
        $umkm = Umkm::where('geosite', 'tuktuk')->where('status', true)->get();
        $penginapan = Penginapan::where('geosite', 'tuktuk')->where('status', true)->get();
        $fasilitas = Fasilitas::where('geosite', 'tuktuk')->where('status', true)->get();
        

        return view('geosite.Tuk-tuk', compact('umkm', 'penginapan', 'fasilitas'));
    }
    
    public function Ambarita()
    {
        $umkm = Umkm::where('geosite', 'ambarita')->where('status', true)->get();
        $penginapan = Penginapan::where('geosite', 'ambarita')->where('status', true)->get();
        $fasilitas = Fasilitas::where('geosite', 'ambarita')->where('status', true)->get();
   

        return view('geosite.Ambarita', compact('umkm', 'penginapan', 'fasilitas'));
    }
    
    public function Tomok()
    {
        $umkm = Umkm::where('geosite', 'tomok')->where('status', true)->get();
        $penginapan = Penginapan::where('geosite', 'tomok')->where('status', true)->get();
        $fasilitas = Fasilitas::where('geosite', 'tomok')->where('status', true)->get();
       

        return view('geosite.Tomok', compact('umkm', 'penginapan', 'fasilitas'));
    }
}