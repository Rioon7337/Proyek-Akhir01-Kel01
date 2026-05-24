@extends('layouts.app')

@section('title', 'Sejarah Caldera Toba - Geosite Danau Toba')

@section('content')

<style>
    .sejarah-hero {
        height: 55vh;
        min-height: 360px;
        background: linear-gradient(rgba(0, 51, 102, 0.6), rgba(0, 102, 153, 0.4)), url('/image/Sipinsur/sipinsur.jpg') center/cover no-repeat;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        margin-top: 76px;
    }
    .sejarah-hero h1 { 
        font-size: 3.5rem; 
        font-family: 'Cormorant Garamond', serif; 
        margin-bottom: 12px;
        text-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
    }
    .sejarah-hero p { 
        font-size: 0.9rem; 
        letter-spacing: 0.2em; 
        text-transform: uppercase; 
        opacity: 0.85;
    }

    .section { padding: 60px 0; }
    .bg-light { background: linear-gradient(135deg, #e0ecf7 0%, #d4e4f2 100%); }
    .container { max-width: 1100px; margin: 0 auto; padding: 0 24px; }
    .section-title { text-align: center; margin-bottom: 45px; }
    .section-title h2 { 
        font-size: 2rem; 
        font-family: 'Cormorant Garamond', serif; 
        color: #003366; 
    }
    .divider { width: 50px; height: 2px; background: #c6a43b; margin: 10px auto 0; }

    .sejarah-grid { display: flex; flex-direction: column; gap: 45px; }
    .sejarah-item { display: flex; align-items: center; gap: 50px; flex-wrap: wrap; }
    .sejarah-item.reverse { flex-direction: row-reverse; }
    .sejarah-text { flex: 1; line-height: 1.8; color: #2c5f8a; font-size: 0.95rem; }
    .sejarah-image { 
        flex: 1; 
        border-radius: 16px; 
        overflow: hidden; 
        box-shadow: 0 10px 25px rgba(0, 51, 102, 0.15); 
    }
    .sejarah-image img { width: 100%; height: 260px; object-fit: cover; transition: 0.3s; }
    .sejarah-image:hover img { transform: scale(1.02); }

    .timeline {
        display: flex;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 20px;
        margin-top: 30px;
    }
    .timeline-item {
        flex: 1;
        background: white;
        border-radius: 16px;
        padding: 20px;
        text-align: center;
        transition: 0.3s;
        box-shadow: 0 5px 15px rgba(0, 51, 102, 0.05);
    }
    .timeline-item:hover { 
        transform: translateY(-5px); 
        box-shadow: 0 15px 30px rgba(0, 51, 102, 0.15);
        border-color: #c6a43b;
    }
    .timeline-year { font-size: 1.3rem; font-weight: 700; color: #c6a43b; }
    .timeline-title { font-weight: 600; color: #003366; }

    .fakta-grid { 
        display: grid; 
        grid-template-columns: repeat(3, 1fr); 
        gap: 25px; 
        margin-top: 30px; 
    }
    .fakta-card {
        background: white;
        border-radius: 16px;
        padding: 25px;
        text-align: center;
        transition: 0.3s;
    }
    .fakta-card:hover { transform: translateY(-5px); }
    .fakta-number { font-size: 2rem; font-weight: 700; color: #c6a43b; }
    .fakta-title { font-weight: 600; color: #003366; }

    .cta-section {
        background: linear-gradient(135deg, #003366 0%, #0a4a7a 100%);
        padding: 60px 0;
        text-align: center;
    }
    .cta-btn {
        display: inline-block;
        background: #c6a43b;
        color: #003366;
        padding: 12px 35px;
        border-radius: 40px;
        text-decoration: none;
        font-weight: 600;
    }
    .cta-btn:hover { background: white; }

    @media (max-width: 768px) {
        .sejarah-hero h1 { font-size: 2.2rem; }
        .sejarah-item, .sejarah-item.reverse { flex-direction: column; text-align: center; }
        .timeline { flex-direction: column; }
        .fakta-grid { grid-template-columns: 1fr; }
    }
</style>

<!-- HERO -->
<section class="sejarah-hero">
    <div data-aos="fade-up">
        <h1>Sejarah Geosite Sipinsur</h1>
        <p>Permata Geopark Kaldera Toba</p>
    </div>
</section>

<!-- SEJARAH BERSILANG dari DATABASE -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah & Asal Usul Sipinsur</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-grid">
            @forelse($sejarahList as $index => $item)
            <div class="sejarah-item {{ $index % 2 == 1 ? 'reverse' : '' }}" data-aos="fade-{{ $index % 2 == 0 ? 'right' : 'left' }}">
                <div class="sejarah-image">
                    @if($item->gambar)
                        <img src="{{ $item->gambar && !str_starts_with($item->gambar, 'data:') ? asset('storage/' . $item->gambar) : $item->gambar }}" alt="{{ $item->judul }}">
                    @else
                        <img src="/image/sejarah{{ $index+1 }}.jpg" alt="{{ $item->judul }}">
                    @endif
                </div>
                <div class="sejarah-text">
                    {!! $item->konten !!}
                </div>
            </div>
            @empty
            {{-- Konten statis sementara kalau database kosong --}}
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/tuktuk/slide1.jpg" alt="Asal Usul Sipinsur">
                </div>
                <div class="sejarah-text">
                    <h3>Asal Usul Nama Sipinsur</h3>
                    <p>Sipinsur berasal dari kata dalam bahasa Batak Toba. Kawasan ini secara turun-temurun dikenal sebagai tempat yang memiliki pemandangan indah ke arah Danau Toba dan Pulau Samosir. Masyarakat setempat telah lama menjadikan kawasan ini sebagai bagian dari kehidupan budaya dan tradisi mereka.</p>
                </div>
            </div>
            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image">
                    <img src="/image/tuktuk/slide2.jpg" alt="Sipinsur dan Geopark">
                </div>
                <div class="sejarah-text">
                    <h3>Sipinsur sebagai Bagian Geopark Kaldera Toba</h3>
                    <p>Geosite Sipinsur merupakan salah satu dari geosite yang termasuk dalam kawasan Geopark Kaldera Toba. Kawasan Geopark ini resmi diakui oleh UNESCO sebagai UNESCO Global Geopark pada tahun 2020, menjadikan Sipinsur bagian dari warisan geologi berkelas dunia.</p>
                </div>
            </div>
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/Sipinsur/sipinsur.jpg" alt="Keindahan Alam Sipinsur">
                </div>
                <div class="sejarah-text">
                    <h3>Keindahan Alam Sipinsur</h3>
                    <p>Terletak di ketinggian 1.297 mdpl, Sipinsur menawarkan panorama Danau Toba dan Pulau Samosir yang memukau. Dikelilingi hutan pinus yang asri, kawasan ini menjadi salah satu titik pandang (viewpoint) terbaik di seluruh kawasan Geopark Kaldera Toba yang kini menjadi destinasi wisata unggulan Sumatera Utara.</p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- TIMELINE PERKEMBANGAN SIPINSUR -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Perjalanan Sejarah Sipinsur</h2>
            <div class="divider"></div>
            <p>Dari kawasan budaya lokal hingga geosite bertaraf internasional</p>
        </div>
        <div class="timeline">
            <div class="timeline-item" data-aos="fade-up">
                <div class="timeline-year">74.000 SM</div>
                <div class="timeline-title">Letusan Supervolcano</div>
                <div class="timeline-desc">Letusan dahsyat membentuk Kaldera Toba, cikal bakal terbentuknya Danau Toba yang kita kenal sekarang</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="50">
                <div class="timeline-year">Abad ke-19</div>
                <div class="timeline-title">Hunian Masyarakat Batak</div>
                <div class="timeline-desc">Masyarakat Batak Toba mulai mendiami kawasan sekitar Sipinsur dan menjadikannya bagian dari kehidupan adat budaya</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                <div class="timeline-year">2020</div>
                <div class="timeline-title">UNESCO Global Geopark</div>
                <div class="timeline-desc">Geopark Kaldera Toba termasuk Sipinsur resmi diakui UNESCO sebagai Global Geopark</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="150">
                <div class="timeline-year">Kini</div>
                <div class="timeline-title">Destinasi Wisata Unggulan</div>
                <div class="timeline-desc">Sipinsur berkembang menjadi destinasi wisata alam dan budaya unggulan di Humbang Hasundutan</div>
            </div>
        </div>
    </div>
</section>

<!-- FAKTA UNIK SIPINSUR -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Fakta Unik Sipinsur</h2>
            <div class="divider"></div>
        </div>
        <div class="fakta-grid">
            <div class="fakta-card" data-aos="fade-up">
                <div class="fakta-icon">🏔️</div>
                <div class="fakta-number">1.297</div>
                <div class="fakta-title">Meter di Atas Laut</div>
                <div class="fakta-desc">Ketinggian Sipinsur menjadikannya salah satu viewpoint terbaik untuk melihat Danau Toba</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="50">
                <div class="fakta-icon">🌍</div>
                <div class="fakta-number">2020</div>
                <div class="fakta-title">UNESCO Global Geopark</div>
                <div class="fakta-desc">Bagian dari Geopark Kaldera Toba yang diakui UNESCO sebagai warisan geologi dunia</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="100">
                <div class="fakta-icon">🌲</div>
                <div class="fakta-number">20+</div>
                <div class="fakta-title">UMKM Lokal</div>
                <div class="fakta-desc">Pelaku usaha lokal yang menjual produk khas Batak di sekitar kawasan Geosite Sipinsur</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h3>Jelajahi Geosite Sipinsur</h3>
            <div class="divider"></div>
            <p>Temukan keindahan alam dan kekayaan budaya Batak di Geosite Sipinsur</p>
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ duration: 700, once: true, offset: 50 });</script>

@endsection