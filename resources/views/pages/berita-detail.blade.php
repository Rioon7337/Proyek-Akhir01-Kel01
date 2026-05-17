@extends('layouts.app')

@section('title', $berita->judul . ' - Berita GeoToba')

@section('content')

<style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap');

    :root {
        --primary: #003366;
        --gold: #c6a43b;
        --text-dark: #1a1a1a;
        --text-gray: #555;
        --shadow-lg: 0 16px 40px rgba(0,0,0,0.12);
    }

    /* HERO */
    .berita-detail-hero {
        position: relative;
        height: 55vh;
        min-height: 380px;
        background-size: cover;
        background-position: center;
        display: flex;
        align-items: flex-end;
        color: white;
        margin-top: 76px;
        overflow: hidden;
    }

    .berita-detail-hero::before {
        content: '';
        position: absolute;
        inset: 0;
        background: linear-gradient(to bottom, rgba(0,0,0,0.1) 0%, rgba(0,51,102,0.8) 100%);
        z-index: 1;
    }

    .berita-detail-hero-content {
        position: relative;
        z-index: 2;
        padding: 50px 60px;
        max-width: 900px;
        animation: fadeInUp 0.8s ease;
    }

    .berita-detail-hero-content .meta-badge {
        display: inline-block;
        background: var(--gold);
        color: white;
        font-size: 0.65rem;
        font-weight: 600;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 5px 16px;
        border-radius: 30px;
        margin-bottom: 14px;
    }

    .berita-detail-hero-content h1 {
        font-size: 2.8rem;
        font-weight: 700;
        font-family: 'Playfair Display', serif;
        text-shadow: 0 4px 20px rgba(0,0,0,0.5);
        line-height: 1.2;
        margin-bottom: 15px;
    }

    .berita-detail-hero-content .meta-info {
        font-size: 0.85rem;
        opacity: 0.9;
        display: flex;
        gap: 20px;
        flex-wrap: wrap;
    }

    .berita-detail-hero-content .meta-info span i {
        color: var(--gold);
        margin-right: 6px;
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* READING PROGRESS */
    .reading-progress {
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 4px;
        background: var(--gold);
        z-index: 9999;
        transition: width 0.1s ease;
    }

    /* CONTENT */
    .berita-detail-wrapper {
        background: #f8f9fa;
        padding: 60px 0;
    }

    .berita-detail-container {
        max-width: 850px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .article-body {
        background: white;
        border-radius: 20px;
        padding: 45px;
        margin-bottom: 30px;
        box-shadow: 0 8px 30px rgba(0,0,0,0.07);
    }

    .article-body p {
        font-size: 1.05rem;
        line-height: 2;
        color: var(--text-gray);
        margin-bottom: 20px;
    }

    .article-body img {
        max-width: 100%;
        border-radius: 12px;
        margin: 20px 0;
    }

    /* SUMBER GAMBAR */
    .sumber-gambar-info {
        background: #f0f4f8;
        border-left: 4px solid var(--gold);
        padding: 12px 20px;
        border-radius: 0 12px 12px 0;
        margin-bottom: 30px;
        font-size: 0.8rem;
        color: var(--text-gray);
    }

    /* SHARE / NAVIGATION */
    .article-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 15px;
    }

    .btn-back-berita {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: var(--primary);
        color: white;
        font-size: 0.85rem;
        font-weight: 600;
        padding: 12px 28px;
        border-radius: 40px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid var(--primary);
    }

    .btn-back-berita:hover {
        background: transparent;
        color: var(--primary);
    }

    .views-count {
        font-size: 0.8rem;
        color: #999;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .berita-detail-hero { min-height: 320px; }
        .berita-detail-hero-content { padding: 30px 24px; }
        .berita-detail-hero-content h1 { font-size: 1.8rem; }
        .article-body { padding: 25px 20px; }
    }
</style>

<!-- READING PROGRESS BAR -->
<div class="reading-progress" id="readingProgress"></div>

<!-- HERO -->
@php
    $heroImg = $berita->gambar
        ? (str_starts_with($berita->gambar, 'data:') ? $berita->gambar : asset('storage/' . $berita->gambar))
        : asset('image/tuktuk/Tuktuk1.jpg');
@endphp

<section class="berita-detail-hero" style="background-image: url('{{ $heroImg }}');">
    <div class="berita-detail-hero-content container">
        <span class="meta-badge">Berita</span>
        <h1>{{ $berita->judul }}</h1>
        <div class="meta-info">
            <span><i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($berita->created_at)->translatedFormat('d F Y') }}</span>
            <span><i class="far fa-user"></i> {{ $berita->penulis ?? 'Admin GeoToba' }}</span>
            <span><i class="far fa-eye"></i> {{ $berita->views }} kali dibaca</span>
        </div>
    </div>
</section>

<!-- KONTEN -->
<div class="berita-detail-wrapper">
    <div class="berita-detail-container">

        @if($berita->sumber_gambar)
        <div class="sumber-gambar-info">
            <i class="fas fa-camera me-2"></i> Sumber gambar: {{ $berita->sumber_gambar }}
        </div>
        @endif

        <div class="article-body" data-aos="fade-up">
            {!! $berita->konten !!}
        </div>

        <div class="article-footer" data-aos="fade-up" data-aos-delay="100">
            <a href="{{ route('berita') }}" class="btn-back-berita">
                <i class="fas fa-arrow-left"></i> Semua Berita
            </a>
            <div class="views-count">
                <i class="far fa-eye"></i> {{ $berita->views }} views
            </div>
        </div>

    </div>
</div>

<script>
    // Reading progress bar
    window.addEventListener('scroll', function() {
        const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
        const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (winScroll / height) * 100;
        document.getElementById('readingProgress').style.width = scrolled + '%';
    });
</script>

@endsection
