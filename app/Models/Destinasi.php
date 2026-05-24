<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destinasi extends Model
{
    use HasFactory;

    protected $table = 'destinasis';

    protected $fillable = [
        'nama',
        'slug',
        'kategori',     // 
        'lokasi',
        'deskripsi',
        'gambar',       // 
        'tags'
    ];

    protected $casts = [
        'tags' => 'array'
    ];
}