@extends('layouts.app')

@section('title', 'Geosite Meat - Geopark Danau Toba')

@section('content')

<style>
    .sejarah-hero {
        height: 55vh;
        min-height: 360px;
        background: linear-gradient(rgba(0, 51, 102, 0.6), rgba(0, 102, 153, 0.4)), url('/image/Tuktuk/slide1.jpg') center/cover no-repeat;
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
        <h1>Desa Wisata Meat</h1>
        <p>Jantung Budaya Batak di Pinggir Danau Toba</p>
    </div>
</section>

<!-- SEJARAH BERSILANG -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah & Budaya Desa Meat</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-grid">
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/Tuktuk/Tuktuk1.jpg" alt="Desa Meat">
                </div>
                <div class="sejarah-text">
                    <h3>Desa Meat - Jantung Budaya Batak</h3>
                    <p>Meat adalah salah satu desa bersejarah di Kecamatan Tampahan, Kabupaten Toba, Provinsi Sumatra Utara. Terletak di tepi Danau Toba yang tenang, desa ini dikelilingi oleh perbukitan hijau yang memukau. Desa ini menjadi salah satu pusat pelestarian kebudayaan Batak yang paling autentik dan terjaga kelestariannya hingga saat ini.</p>
                </div>
            </div>

            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image">
                    <img src="/image/Tuktuk/destinasi-budaya.jpg" alt="Tradisi Tenun Ulos">
                </div>
                <div class="sejarah-text">
                    <h3>Tradisi Hidup yang Diwariskan</h3>
                    <p>Masyarakat Desa Meat secara turun-temurun berprofesi sebagai penenun Ulos tradisional (Hela). Ulos bermotif ragi hotang dan pinunsaan dari Desa Meat terkenal memiliki detail pengerjaan yang sangat halus dan nilai adat yang tinggi. Selain menenun, upacara adat serta kesenian musik Gondang dan tari Tortor masih lestari sebagai bagian penting kehidupan warga sehari-hari.</p>
                </div>
            </div>

            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/Tuktuk/Tuktuk3.jpg" alt="Keindahan Wisata Desa Meat">
                </div>
                <div class="sejarah-text">
                    <h3>Destinasi Wisata Unggulan Kaldera Toba</h3>
                    <p>Keunikan lanskap alam perbukitan berpadu dengan sawah terasering yang hijau di tepi Danau Toba menjadikan Desa Meat sebagai salah satu destinasi wisata unggulan di Geopark Danau Toba. Pengunjung dapat menikmati sensasi kedamaian alam berpadu dengan kehangatan interaksi sosial budaya khas Batak Toba.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TIMELINE -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Perjalanan Desa Meat</h2>
            <div class="divider"></div>
            <p>Dari pemukiman kuno hingga menjadi ikon desa wisata nasional</p>
        </div>
        <div class="timeline">
            <div class="timeline-item" data-aos="fade-up">
                <div class="timeline-year">Era Pra-Kemerdekaan</div>
                <div class="timeline-title">Pusat Tenun Tradisional</div>
                <div class="timeline-desc">Masyarakat Meat mulai dikenal luas sebagai pembuat kain Ulos bermutu tinggi untuk upacara adat kerajaan Batak</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="50">
                <div class="timeline-year">2016</div>
                <div class="timeline-title">Pencanangan Desa Wisata</div>
                <div class="timeline-desc">Kementerian Pariwisata secara resmi menetapkan Desa Meat sebagai salah satu desa adat wisata karena orisinalitas budayanya</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                <div class="timeline-year">2020</div>
                <div class="timeline-title">UNESCO Geopark Site</div>
                <div class="timeline-desc">Menjadi bagian integral dari program perlindungan geologi dan budaya UNESCO Global Geopark Kaldera Toba</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="150">
                <div class="timeline-year">Sekarang</div>
                <div class="timeline-title">Ekowisata dan Kreatif</div>
                <div class="timeline-desc">Kombinasi atraksi alam, festival budaya tahunan, camping ground, serta kerajinan lokal berkualitas tinggi</div>
            </div>
        </div>
    </div>
</section>

<!-- FAKTA UNIK -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Fakta Unik Desa Meat</h2>
            <div class="divider"></div>
        </div>
        <div class="fakta-grid">
            <div class="fakta-card" data-aos="fade-up">
                <div class="fakta-icon">🌾</div>
                <div class="fakta-number">905</div>
                <div class="fakta-title">Meter di Atas Permukaan Laut</div>
                <div class="fakta-desc">Terletak di lembah tenang berudara sejuk dengan pemandangan sawah terasering yang membentang langsung ke danau</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="50">
                <div class="fakta-icon">🧣</div>
                <div class="fakta-number">100+</div>
                <div class="fakta-title">Prajurit Tenun Aktif</div>
                <div class="fakta-desc">Lebih dari seratus ibu rumah tangga di desa ini aktif menenun Ulos ragi hotang asli dengan tangan tanpa mesin</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="100">
                <div class="fakta-icon">⛺</div>
                <div class="fakta-number">3+</div>
                <div class="fakta-title">Spot Camping Populer</div>
                <div class="fakta-desc">Menawarkan area berkemah terbaik di tepi pantai Danau Toba dengan latar belakang tebing perbukitan yang megah</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h3>Kunjungi Desa Adat Meat</h3>
            <div class="divider"></div>
            <p>Jelajahi keasrian budaya Batak Toba yang menyatu harmonis dengan keagungan alam Danau Toba</p>
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ duration: 700, once: true, offset: 50 });</script>

@endsection