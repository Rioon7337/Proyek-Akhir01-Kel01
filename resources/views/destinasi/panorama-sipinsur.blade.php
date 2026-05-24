@extends('layouts.app')

@section('title', 'Panorama Sipinsur - Geosite Danau Toba')

@section('content')

<style>
    .sejarah-hero {
        height: 55vh;
        min-height: 360px;
        background: linear-gradient(rgba(0, 51, 102, 0.6), rgba(0, 102, 153, 0.4)), url('/image/Tuktuk/Tuktuk3.jpg') center/cover no-repeat;
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
    .sejarah-text h3 {
        font-size: 1.5rem;
        font-family: 'Cormorant Garamond', serif;
        color: #003366;
        margin-bottom: 15px;
    }
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
        <h1>Panorama Sipinsur</h1>
        <p>Titik Pandang Terbaik Menikmati Keindahan Kaldera Toba</p>
    </div>
</section>

<!-- SEJARAH BERSILANG -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Tentang Panorama Sipinsur</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-grid">
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/Tuktuk/Tuktuk1.jpg" alt="Panorama Sipinsur">
                </div>
                <div class="sejarah-text">
                    <h3>Asal-Usul Nama Sipinsur</h3>
                    <p>Sipinsur berasal dari bahasa Batak Toba yang secara harfiah merujuk pada tanah atau tebing tinggi yang curam dan menonjol. Lokasi ini sejak lama dimanfaatkan oleh warga sekitar sebagai viewpoint alami untuk memantau keadaan perairan danau di bawahnya sebelum bertransformasi menjadi destinasi wisata.</p>
                </div>
            </div>

            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image">
                    <img src="/image/Tomok/Tomok1.jpg" alt="Keindahan Alam Sipinsur">
                </div>
                <div class="sejarah-text">
                    <h3>Puncak Viewpoint Kaldera Toba</h3>
                    <p>Dari ketinggian 1.297 mdpl, Panorama Sipinsur menyuguhkan pemandangan 360 derajat perairan Danau Toba yang biru berkilau, berpadu dengan kemegahan Pulau Samosir dan Pulau Sibandang di kejauhan. Keunikan lanskap inilah yang dinobatkan sebagai salah satu viewpoint terbaik di wilayah Kaldera Toba.</p>
                </div>
            </div>

            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/Tuktuk/destinasi-alam.jpg" alt="UNESCO Geopark Site">
                </div>
                <div class="sejarah-text">
                    <h3>Bagian UNESCO Global Geopark</h3>
                    <p>Sebagai situs penting warisan geologi Toba, Sipinsur dikelola secara berkelanjutan untuk melestarikan lingkungan alam dan budayanya. Menjadi bagian dari UNESCO Global Geopark sejak tahun 2020 mempertegas status internasional kawasan wisata alam andalan Humbang Hasundutan ini.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TIMELINE -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Garis Waktu Panorama Sipinsur</h2>
            <div class="divider"></div>
            <p>Sejarah pembentukan lanskap alam hingga menjadi destinasi internasional</p>
        </div>
        <div class="timeline">
            <div class="timeline-item" data-aos="fade-up">
                <div class="timeline-year">74.000 SM</div>
                <div class="timeline-title">Letusan Gunung Api Toba</div>
                <div class="timeline-desc">Letusan supervolcano Toba membentuk kaldera besar yang menjadi cikal bakal tebing tinggi Sipinsur</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="50">
                <div class="timeline-year">Era Kolonial</div>
                <div class="timeline-title">Titik Pantau Alami</div>
                <div class="timeline-desc">Digunakan oleh penduduk setempat dan pos pengamatan karena posisinya yang sangat strategis dan tinggi</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                <div class="timeline-year">2020</div>
                <div class="timeline-title">UNESCO Global Geopark</div>
                <div class="timeline-desc">Situs Panorama Sipinsur resmi masuk ke dalam daftar Geosite UNESCO Global Geopark Kaldera Toba</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="150">
                <div class="timeline-year">Kini</div>
                <div class="timeline-title">Ekowisata Andalan</div>
                <div class="timeline-desc">Menjadi destinasi wisata alam terpopuler yang dikunjungi ribuan wisatawan domestik dan mancanegara</div>
            </div>
        </div>
    </div>
</section>

<!-- FAKTA UNIK -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Fakta Menarik Panorama Sipinsur</h2>
            <div class="divider"></div>
        </div>
        <div class="fakta-grid">
            <div class="fakta-card" data-aos="fade-up">
                <div class="fakta-icon">🏔️</div>
                <div class="fakta-number">1.297</div>
                <div class="fakta-title">Meter di Atas Laut</div>
                <div class="fakta-desc">Ketinggian puncak Sipinsur menghasilkan hawa dingin yang sejuk berkisar antara 18°C hingga 22°C</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="50">
                <div class="fakta-icon">🏞️</div>
                <div class="fakta-number">2</div>
                <div class="fakta-title">Pulau Terlihat Jelas</div>
                <div class="fakta-desc">Dari bibir tebing Sipinsur, Anda dapat melihat Pulau Samosir dan Pulau Sibandang secara bersamaan</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="100">
                <div class="fakta-icon">🌲</div>
                <div class="fakta-number">10+</div>
                <div class="fakta-title">Hektar Area Wisata</div>
                <div class="fakta-desc">Kawasan wisata terintegrasi yang mencakup taman bermain, spot foto tebing, hutan pinus, dan camping ground</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h3>Kunjungi Panorama Sipinsur</h3>
            <div class="divider"></div>
            <p>Saksikan langsung kemegahan ciptaan alam Kaldera Toba dan nikmati kesegaran udara pegunungan di Sipinsur</p>
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ duration: 700, once: true, offset: 50 });</script>

@endsection
