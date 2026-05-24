@extends('layouts.app')

@section('title', 'Geosite Batu Bahisan - Geopark Danau Toba')

@section('content')

<style>
    .sejarah-hero {
        height: 55vh;
        min-height: 360px;
        background: linear-gradient(rgba(0, 51, 102, 0.6), rgba(0, 102, 153, 0.4)), url('/image/Tomok/Tomok2.jpg') center/cover no-repeat;
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
        <h1>Geosite Batu Bahisan</h1>
        <p>Situs Sejarah Geologi Batuan Eksotis Toba</p>
    </div>
</section>

<!-- SEJARAH BERSILANG -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Sejarah & Misteri Batu Bahisan</h2>
            <div class="divider"></div>
        </div>
        <div class="sejarah-grid">
            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/Tomok/Tomok1.jpg" alt="Batu Bahisan">
                </div>
                <div class="sejarah-text">
                    <h3>Asal-Usul Nama Batu Bahisan</h3>
                    <p>Batu Bahisan berasal dari kata "bahis" yang berarti "tajam" atau "senjata" dalam dialek bahasa Batak Toba kuno. Batu-batu besar bertekstur kokoh ini dipercaya oleh masyarakat setempat sebagai peninggalan perkakas pertahanan dan tempat penyusunan strategi perang para leluhur marga Batak dahulu kala.</p>
                </div>
            </div>

            <div class="sejarah-item reverse" data-aos="fade-left">
                <div class="sejarah-image">
                    <img src="/image/Tomok/Tomok3.jpg" alt="Proses Terbentuknya Batuan">
                </div>
                <div class="sejarah-text">
                    <h3>Keunikan Formasi Batuan Vulkanik</h3>
                    <p>Berdasarkan kajian ilmiah geologi, formasi batuan di Batu Bahisan ini terbentuk dari material piroklastik hasil letusan supervolcano Toba puluhan ribu tahun yang lalu. Batuan ini kemudian mengalami pelapukan dan erosi air danau secara terus-menerus selama ribuan tahun, menciptakan guratan tebing batu yang khas dan eksotis.</p>
                </div>
            </div>

            <div class="sejarah-item" data-aos="fade-right">
                <div class="sejarah-image">
                    <img src="/image/Tuktuk/destinasi-buatan.jpg" alt="Ritual Adat Batu Bahisan">
                </div>
                <div class="sejarah-text">
                    <h3>Ritual Keselamatan dan Pertanian</h3>
                    <p>Dalam sejarah tradisi agraris lokal Batak, situs Batu Bahisan sering dijadikan tempat berkumpulnya para tetua adat untuk melaksanakan ritual permohonan cuaca baik dan keselamatan pertanian (Mangan Rambu). Nilai spiritual serta keunikan geologinya kini disatukan menjadi daya tarik ekowisata cagar budaya.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TIMELINE -->
<section class="section bg-light">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Garis Waktu Perjalanan Batu Bahisan</h2>
            <div class="divider"></div>
            <p>Evolusi dari bentukan alam purba hingga cagar budaya geopark dilindungi</p>
        </div>
        <div class="timeline">
            <div class="timeline-item" data-aos="fade-up">
                <div class="timeline-year">74.000 SM</div>
                <div class="timeline-title">Letusan Gunung Toba</div>
                <div class="timeline-desc">Deposisi batuan vulkanik masif akibat muntahan magma letusan supervolcano terbesar bumi</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="50">
                <div class="timeline-year">Era Kerajaan Batak</div>
                <div class="timeline-title">Pertahanan Tradisional</div>
                <div class="timeline-desc">Pemanfaatan formasi tebing batuan tinggi sebagai pos pengamatan dan benteng pertahanan alami antar-huta</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="100">
                <div class="timeline-year">2020</div>
                <div class="timeline-title">Pengakuan UNESCO</div>
                <div class="timeline-desc">Batu Bahisan tercatat sebagai warisan geologi bernilai tinggi di bawah perlindungan UNESCO Global Geopark</div>
            </div>
            <div class="timeline-item" data-aos="fade-up" data-aos-delay="150">
                <div class="timeline-year">Kini</div>
                <div class="timeline-title">Situs Budaya & Wisata</div>
                <div class="timeline-desc">Dikembangkan sebagai destinasi edukasi kebumian (geowisata) serta spot fotografi andalan wisatawan</div>
            </div>
        </div>
    </div>
</section>

<!-- FAKTA UNIK -->
<section class="section">
    <div class="container">
        <div class="section-title" data-aos="fade-up">
            <h2>Fakta Unik Batu Bahisan</h2>
            <div class="divider"></div>
        </div>
        <div class="fakta-grid">
            <div class="fakta-card" data-aos="fade-up">
                <div class="fakta-icon">🪨</div>
                <div class="fakta-number">100%</div>
                <div class="fakta-title">Batuan Vulkanik Asli</div>
                <div class="fakta-desc">Seluruh struktur tersusun atas batuan hasil pembekuan abu vulkanik panas tebal pasca letusan gunung api purba</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="50">
                <div class="fakta-icon">🛡️</div>
                <div class="fakta-number">1</div>
                <div class="fakta-title">Benteng Pertahanan Alam</div>
                <div class="fakta-desc">Menjadi salah satu benteng batu alam tertua di wilayah Balige yang menyimpan cerita heroisme prajurit Batak</div>
            </div>
            <div class="fakta-card" data-aos="fade-up" data-aos-delay="100">
                <div class="fakta-icon">📸</div>
                <div class="fakta-number">360°</div>
                <div class="fakta-title">Panorama Indah Danau</div>
                <div class="fakta-desc">Menyajikan sudut pemandangan menyeluruh keindahan perairan Danau Toba dari puncak tebing batu</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta-section">
    <div class="container">
        <div class="cta-content" data-aos="fade-up">
            <h3>Jelajahi Geosite Batu Bahisan</h3>
            <div class="divider"></div>
            <p>Saksikan keagungan sejarah bumi dan keunikan geologi purba Toba di Batu Bahisan</p>
            <a href="{{ url('/') }}" class="cta-btn">Kembali ke Beranda</a>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init({ duration: 700, once: true, offset: 50 });</script>

@endsection