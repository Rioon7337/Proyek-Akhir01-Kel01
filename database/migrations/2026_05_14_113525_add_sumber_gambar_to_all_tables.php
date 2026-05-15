<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $tables = ['berita', 'galeri', 'informasi', 'umkm', 'penginapan', 'fasilitas', 'galeri_geosite'];

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && !Schema::hasColumn($table, 'sumber_gambar')) {
                Schema::table($table, function (Blueprint $t) {
                    $t->string('sumber_gambar', 500)->nullable();
                });
            }
        }

        // Destinasi uses gambar_utama instead of gambar
        if (Schema::hasTable('destinasi') && !Schema::hasColumn('destinasi', 'sumber_gambar')) {
            Schema::table('destinasi', function (Blueprint $t) {
                $t->string('sumber_gambar', 500)->nullable();
            });
        }
    }

    public function down(): void
    {
        $tables = ['berita', 'galeri', 'informasi', 'destinasi', 'umkm', 'penginapan', 'fasilitas', 'galeri_geosite'];

        foreach ($tables as $table) {
            if (Schema::hasTable($table) && Schema::hasColumn($table, 'sumber_gambar')) {
                Schema::table($table, function (Blueprint $t) {
                    $t->dropColumn('sumber_gambar');
                });
            }
        }
    }
};
