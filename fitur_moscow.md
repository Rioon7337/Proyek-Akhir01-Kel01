# Analisis Fitur & Metode MoSCoW — Website GeoToba

## 📌 Tentang Website
**GeoToba** adalah Sistem Informasi Geosite Danau Toba berbasis web yang menyajikan informasi tentang 3 geosite utama: **Tuktuk, Ambarita, dan Tomok**. Website ini dibangun menggunakan framework **Laravel** dengan arsitektur MVC dan memiliki dua sisi: **Frontend** (publik) dan **Backend** (admin panel).

---

## 📋 Daftar Fitur Website

### A. Fitur Frontend (Publik)

| No | Fitur | Deskripsi |
|----|-------|-----------|
| F1 | **Halaman Beranda (Home)** | Landing page dengan hero slider, statistik, pengenalan geosite (Tuktuk, Ambarita, Tomok), dan peta lokasi |
| F2 | **Halaman Informasi** | Menampilkan sejarah dan informasi Caldera Toba secara berurutan dari database |
| F3 | **Halaman Destinasi** | Daftar destinasi wisata dengan filter kategori: Alam, Buatan, Budaya |
| F4 | **Detail Destinasi** | Halaman detail tiap destinasi dengan deskripsi, tags, lokasi, dan embed Google Maps |
| F5 | **Halaman Galeri** | Galeri foto wisata dikelompokkan berdasarkan kategori dengan tampilan card stack interaktif |
| F6 | **Detail Galeri** | Halaman detail foto galeri dengan informasi sumber dan kategori |
| F7 | **Halaman Berita** | Daftar berita terkini dengan tampilan circle card slider dan inline reader modal |
| F8 | **Detail Berita** | Halaman detail artikel berita dengan reading progress bar |
| F9 | **Halaman Geosite Tuktuk** | Halaman khusus geosite Tuktuk menampilkan UMKM, Penginapan, dan Fasilitas |
| F10 | **Halaman Geosite Ambarita** | Halaman khusus geosite Ambarita menampilkan UMKM, Penginapan, dan Fasilitas |
| F11 | **Halaman Geosite Tomok** | Halaman khusus geosite Tomok menampilkan UMKM, Penginapan, dan Fasilitas |
| F12 | **Halaman Kontak** | Form kontak dengan Google Maps embed, info alamat, telepon, email, dan jam operasional |
| F13 | **Pengiriman Email Kontak** | Pengunjung dapat mengirim pesan ke email admin via form kontak |
| F14 | **Navigasi Responsif** | Navbar responsif dengan dropdown destinasi, scroll effect, dan mobile hamburger menu |
| F15 | **Back to Top Button** | Tombol scroll ke atas yang muncul otomatis saat user scroll ke bawah |
| F16 | **Animasi Scroll (AOS)** | Animasi fade-in pada elemen saat di-scroll menggunakan library AOS |

### B. Fitur Backend (Admin Panel)

| No | Fitur | Deskripsi |
|----|-------|-----------|
| F17 | **Dashboard Admin** | Menampilkan statistik total data (Galeri, Berita, Informasi, Destinasi, UMKM, Penginapan, Fasilitas), tabel berita terbaru, dan quick action buttons |
| F18 | **CRUD Galeri** | Create, Read, Update, Delete foto galeri dengan upload gambar ke storage |
| F19 | **CRUD Berita** | Create, Read, Update, Delete berita dengan slug otomatis dan upload gambar |
| F20 | **CRUD Informasi** | Create, Read, Update, Delete informasi/sejarah dengan urutan kustom |
| F21 | **CRUD Destinasi** | Create, Read, Update, Delete destinasi wisata dengan kategori, tags, dan slug unik |
| F22 | **CRUD UMKM** | Create, Read, Update, Delete data UMKM per geosite |
| F23 | **CRUD Penginapan** | Create, Read, Update, Delete data penginapan per geosite |
| F24 | **CRUD Fasilitas** | Create, Read, Update, Delete data fasilitas per geosite |
| F25 | **Toggle Status** | Kemampuan mengaktifkan/menonaktifkan konten (publish/draft) |

### C. Fitur Autentikasi & Keamanan

| No | Fitur | Deskripsi |
|----|-------|-----------|
| F26 | **Login Admin** | Halaman login dengan validasi email dan password |
| F27 | **Logout** | Fitur logout dengan invalidasi session |
| F28 | **Lupa Password (OTP)** | Reset password 3 langkah: input email → verifikasi OTP 6 digit → buat password baru |
| F29 | **Kirim OTP via Email** | Sistem mengirim kode OTP ke email admin menggunakan Laravel Mail |
| F30 | **Proteksi Route Admin** | Middleware `auth` melindungi semua route admin dari akses tidak sah |
| F31 | **CSRF Protection** | Token CSRF pada semua form untuk mencegah cross-site request forgery |

### D. Fitur Teknis

| No | Fitur | Deskripsi |
|----|-------|-----------|
| F32 | **File-based Image Storage** | Gambar disimpan di `storage/app/public/` melalui Laravel Storage, bukan base64 di DB |
| F33 | **Backward Compatibility Gambar** | Mendukung gambar lama (base64) dan gambar baru (file path) secara bersamaan |
| F34 | **Auto Slug Generation** | Slug otomatis dari judul untuk Berita, Informasi, dan Destinasi |
| F35 | **Unique Slug Handling** | Destinasi memiliki slug unik dengan suffix angka otomatis jika duplikat |
| F36 | **Database Seeder** | Seeder untuk semua tabel agar mudah setup data awal |
| F37 | **Views Counter** | Penghitung views pada Berita untuk tracking popularitas konten |
| F38 | **Responsive Design** | Layout responsif untuk desktop, tablet, dan mobile |

---

## 🏷️ Analisis MoSCoW

### ✅ Must Have (Harus Ada — Fitur Inti)
> Fitur yang **wajib ada** agar website berfungsi sesuai tujuan utamanya sebagai sistem informasi geosite.

| Prioritas | Fitur | Alasan |
|-----------|-------|--------|
| M1 | **F1 — Halaman Beranda** | Pintu masuk utama pengunjung, menampilkan overview 3 geosite |
| M2 | **F2 — Halaman Informasi** | Menyediakan informasi sejarah/edukasi tentang Caldera Toba |
| M3 | **F3, F4 — Destinasi + Detail** | Fitur utama — menampilkan tempat wisata yang menjadi tujuan website |
| M4 | **F9, F10, F11 — Halaman Geosite** | Konten inti — informasi per geosite (Tuktuk, Ambarita, Tomok) |
| M5 | **F17 — Dashboard Admin** | Admin harus bisa melihat ringkasan data website |
| M6 | **F18–F24 — CRUD Semua Modul** | Admin harus bisa mengelola seluruh konten website |
| M7 | **F26, F27 — Login & Logout** | Keamanan dasar agar hanya admin yang bisa mengakses panel |
| M8 | **F30, F31 — Proteksi Route & CSRF** | Keamanan minimum yang wajib ada di setiap web application |
| M9 | **F32 — File-based Image Storage** | Menyimpan gambar sebagai file (bukan base64) agar database stabil |
| M10 | **F14 — Navigasi Responsif** | Pengunjung harus bisa menavigasi website di semua perangkat |
| M11 | **F38 — Responsive Design** | Website harus bisa diakses di desktop dan mobile |

---

### 🔶 Should Have (Sebaiknya Ada — Fitur Penting)
> Fitur yang **sangat diharapkan** dan menambah nilai signifikan, tapi website masih bisa berjalan tanpanya.

| Prioritas | Fitur | Alasan |
|-----------|-------|--------|
| S1 | **F5, F6 — Galeri + Detail** | Dokumentasi visual penting untuk menarik wisatawan |
| S2 | **F7, F8 — Berita + Detail** | Informasi terkini meningkatkan engagement pengunjung |
| S3 | **F12, F13 — Kontak + Email** | Channel komunikasi antara pengunjung dan pengelola |
| S4 | **F25 — Toggle Status (Publish/Draft)** | Admin perlu kontrol mana konten yang ditampilkan ke publik |
| S5 | **F28, F29 — Lupa Password + OTP** | Penting agar admin tidak terkunci dari sistem |
| S6 | **F34, F35 — Auto Slug + Unique Slug** | URL yang bersih dan SEO-friendly |
| S7 | **F33 — Backward Compatibility Gambar** | Menjaga data lama tetap bisa tampil setelah migrasi |
| S8 | **F37 — Views Counter** | Membantu admin mengetahui berita yang populer |

---

### 🟢 Could Have (Bisa Ada — Fitur Tambahan)
> Fitur yang **bagus jika ada** tapi bukan prioritas. Ditambahkan jika waktu dan sumber daya tersedia.

| Prioritas | Fitur | Alasan |
|-----------|-------|--------|
| C1 | **F15 — Back to Top Button** | Peningkatan UX, tapi bukan keharusan |
| C2 | **F16 — Animasi Scroll (AOS)** | Membuat tampilan lebih menarik tapi bukan fungsi utama |
| C3 | **F36 — Database Seeder** | Memudahkan development, tapi tidak digunakan user akhir |
| C4 | **Fitur Pencarian (belum ada)** | Memudahkan pencarian destinasi/berita, tapi skala data masih kecil |
| C5 | **Dashboard Charts (belum ada)** | Grafik di dashboard admin untuk visualisasi data lebih baik |
| C6 | **Interactive Map / Leaflet (belum ada)** | Peta interaktif semua destinasi, tapi sudah ada embed Google Maps |
| C7 | **Galeri di Halaman Geosite (belum ada)** | Foto-foto spesifik per geosite, controller sudah disiapkan |

---

### ❌ Won't Have (Tidak untuk Saat Ini)
> Fitur yang **ditunda** untuk versi mendatang karena di luar scope atau terlalu kompleks.

| Prioritas | Fitur | Alasan |
|-----------|-------|--------|
| W1 | **Multi-Admin + Role Permission** | Saat ini cukup 1 admin, role system terlalu kompleks |
| W2 | **PWA / Offline Support** | Membutuhkan service worker dan manifest, belum prioritas |
| W3 | **Visitor Analytics Dashboard** | Butuh tracking system tersendiri, cukup pakai Google Analytics |
| W4 | **Testimonial / Review Pengunjung** | Butuh moderasi konten, terlalu kompleks untuk fase ini |
| W5 | **Multi-language / i18n** | Website fokus untuk pengguna lokal Indonesia |
| W6 | **Soft Delete** | Bagus untuk keamanan data tapi menambah kompleksitas |
| W7 | **Reservasi / Booking Online** | Di luar scope website informasi, butuh integrasi payment |
| W8 | **Social Media Login** | Tidak relevan karena hanya admin yang login |

---

## 📊 Ringkasan MoSCoW

```
┌──────────────────────────┬───────────────────┬──────────┐
│ Kategori                 │ Jumlah Fitur      │ Status   │
├──────────────────────────┼───────────────────┼──────────┤
│ ✅ Must Have             │ 11 fitur          │ ✅ DONE  │
│ 🔶 Should Have           │ 8 fitur           │ ✅ DONE  │
│ 🟢 Could Have            │ 7 fitur (3 baru)  │ ⏳ PARTIAL│
│ ❌ Won't Have            │ 8 fitur           │ 🚫 LATER │
├──────────────────────────┼───────────────────┼──────────┤
│ TOTAL TERIDENTIFIKASI    │ 34 fitur          │          │
│ TOTAL TERIMPLEMENTASI    │ 38 fitur          │          │
└──────────────────────────┴───────────────────┴──────────┘
```

> [!TIP]
> **Kesimpulan:** Website GeoToba telah mengimplementasikan **semua fitur Must Have dan Should Have** dengan baik. Beberapa fitur Could Have (C4–C7) bisa dijadikan target pengembangan selanjutnya untuk meningkatkan user experience.

---

## 🏗️ Arsitektur Teknis

### Tech Stack
| Komponen | Teknologi |
|----------|-----------|
| Backend Framework | Laravel (PHP) |
| Frontend | Blade Template + Bootstrap 5 |
| Database | MySQL |
| Authentication | Laravel Auth (Session-based) |
| Image Storage | Laravel Storage (filesystem) |
| Email | Laravel Mail (SMTP) |
| Animation | AOS.js |
| Icons | Font Awesome 6 |
| Typography | Google Fonts (Inter, Playfair Display) |

### Database Schema (10 Tabel)
```
admin ──┬── berita
        ├── informasi
        ├── galeri
        ├── destinasis
        ├── umkm
        ├── penginapan
        └── fasilitas

password_resets (untuk OTP)
cache / cache_locks (Laravel system)
```

### Design Pattern
- **MVC (Model-View-Controller)** — Pemisahan logika bisnis, tampilan, dan routing
- **Resource Controller** — CRUD terstandar untuk semua modul admin
- **Blade Layouts** — Template inheritance (`layouts.app` untuk frontend, `layouts.admin` untuk backend)
