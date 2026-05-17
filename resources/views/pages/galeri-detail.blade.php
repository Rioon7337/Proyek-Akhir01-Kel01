@extends('layouts.app')

@section('title', $galeri->judul . ' - Galeri GeoToba')

@section('content')

<style>
    :root {
        --primary: #003366;
        --gold: #c6a43b;
        --text-dark: #1a1a1a;
        --text-gray: #555;
    }

    /* HERO */
    .galeri-detail-hero {
        position: relative;
        height: 75vh;
        min-height: 500px;
        background: #000;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 76px;
        overflow: hidden;
    }

    .galeri-detail-hero img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        position: relative;
        z-index: 2;
    }

    .galeri-detail-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at center, rgba(0,0,0,0.3), rgba(0,0,0,0.9));
        z-index: 1;
    }

    /* CONTENT */
    .galeri-detail-wrapper {
        background: #f8f9fa;
        padding: 50px 0 70px;
    }

    .galeri-detail-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .galeri-info-card {
        background: white;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.07);
        margin-bottom: 30px;
    }

    .galeri-info-card .kategori-badge {
        display: inline-block;
        background: rgba(198, 164, 59, 0.15);
        color: var(--gold);
        font-size: 0.7rem;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 6px 18px;
        border-radius: 30px;
        margin-bottom: 16px;
    }

    .galeri-info-card h1 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--text-dark);
        margin-bottom: 12px;
        line-height: 1.3;
    }

    .galeri-meta {
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
        font-size: 0.8rem;
        color: #999;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid #eee;
    }

    .galeri-meta span i {
        color: var(--gold);
        margin-right: 5px;
    }

    .galeri-info-card .deskripsi-text {
        font-size: 1rem;
        line-height: 1.9;
        color: var(--text-gray);
    }

    /* SUMBER GAMBAR */
    .sumber-info {
        background: #f0f4f8;
        border-left: 4px solid var(--gold);
        padding: 12px 20px;
        border-radius: 0 12px 12px 0;
        font-size: 0.8rem;
        color: var(--text-gray);
        margin-top: 20px;
    }

    /* NAVIGATION */
    .galeri-nav {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .btn-galeri {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 0.85rem;
        font-weight: 600;
        padding: 12px 28px;
        border-radius: 40px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .btn-galeri-primary {
        background: var(--primary);
        color: white;
        border: 2px solid var(--primary);
    }

    .btn-galeri-primary:hover {
        background: transparent;
        color: var(--primary);
    }

    .btn-galeri-outline {
        background: transparent;
        color: var(--primary);
        border: 2px solid var(--primary);
    }

    .btn-galeri-outline:hover {
        background: var(--primary);
        color: white;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .galeri-detail-hero { min-height: 350px; }
        .galeri-info-card { padding: 25px 20px; }
        .galeri-info-card h1 { font-size: 1.5rem; }
    }
</style>

<!-- HERO IMAGE -->
@php
    if($galeri->gambar && str_starts_with($galeri->gambar, 'data:')) {
        $imgSrc = $galeri->gambar;
    } elseif($galeri->gambar) {
        $imgSrc = asset('storage/' . $galeri->gambar);
    } else {
        $imgSrc = asset('image/tuktuk/Tuktuk1.jpg');
    }
@endphp

<section class="galeri-detail-hero">
    <img src="{{ $imgSrc }}" alt="{{ $galeri->judul }}" loading="lazy">
</section>

<!-- CONTENT -->
<div class="galeri-detail-wrapper">
    <div class="galeri-detail-container">

        <div class="galeri-info-card" data-aos="fade-up">
            <span class="kategori-badge">{{ $galeri->kategori }}</span>
            <h1>{{ $galeri->judul }}</h1>

            <div class="galeri-meta">
                @if($galeri->lokasi)
                <span><i class="fas fa-map-marker-alt"></i> {{ $galeri->lokasi }}</span>
                @endif
                @if($galeri->tanggal_foto)
                <span><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($galeri->tanggal_foto)->translatedFormat('d F Y') }}</span>
                @endif
                <span><i class="far fa-eye"></i> {{ $galeri->views ?? 0 }} views</span>
            </div>

            @if($galeri->deskripsi)
            <p class="deskripsi-text">{{ $galeri->deskripsi }}</p>
            @endif

            @if($galeri->sumber_gambar)
            <div class="sumber-info">
                <i class="fas fa-camera me-2"></i> Sumber: {{ $galeri->sumber_gambar }}
            </div>
            @endif
        </div>

        <div class="galeri-nav" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('galeri') }}" class="btn-galeri btn-galeri-primary">
                <i class="fas fa-arrow-left"></i> Kembali ke Galeri
            </a>
            <a href="{{ route('home') }}" class="btn-galeri btn-galeri-outline">
                <i class="fas fa-home"></i> Beranda
            </a>
        </div>

    </div>
</div>

@endsection
