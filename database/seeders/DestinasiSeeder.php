<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Destinasi;

class DestinasiSeeder extends Seeder
{
    public function run()
    {
        Destinasi::insert([
            [
                'nama' => 'Geosite Sipinsur',
                'slug' => 'sipinsur',
                'gambar' => 'sipinsur.jpg',
                'deskripsi' => 'Bukit pinus dengan panorama langsung ke Danau Toba, terkenal sebagai spot terbaik menikmati sunrise dan sunset.'
            ],
            [
                'nama' => 'Liang Sipege',
                'slug' => 'liang-sipege',
                'gambar' => 'liang-sipege.jpg',
                'deskripsi' => 'Goa alami dengan stalaktit dan stalagmit yang unik, cocok untuk eksplorasi dan edukasi geologi.'
            ],
            [
                'nama' => 'Batu Bahisan',
                'slug' => 'batu-bahisan',
                'gambar' => 'batu-bahisan.jpg',
                'deskripsi' => 'Formasi batuan alami hasil proses geologi ribuan tahun, menjadi spot foto favorit wisatawan.'
            ],
            [
                'nama' => 'Panorama Danau Toba',
                'slug' => 'panorama-danau-toba',
                'gambar' => 'panorama.jpg',
                'deskripsi' => 'Pemandangan luas Danau Toba dari ketinggian Sipinsur yang memberikan pengalaman visual yang menakjubkan.'
            ]
        ]);
    }
}