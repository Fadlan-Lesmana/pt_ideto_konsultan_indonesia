<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT IDETO KONSULTAN INDONESIA</title>
    
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

    <header class="header-light">
        <div class="container header-container">
            <!-- 2. Ubah index.html menjadi index.php pada logo -->
            <a href="index.php" class="logo">
                <div class="logo-icon"><i class="fas fa-leaf"></i></div>
                <div class="logo-text">
                    <span class="logo-title">PT IDETO</span>
                    <span class="logo-subtitle">KONSULTAN INDONESIA</span>
                </div>
            </a>
            
            <nav class="nav-links" id="nav-links">
                <!-- 3. Ubah semua referensi index.html menjadi index.php -->
                <a href="index.php" class="nav-item active">Home</a>
                <a href="profile.html" class="nav-item">Profile</a>
                <a href="konsultasi.html" class="nav-item">Konsultasi</a>
                <a href="pelatihan.html" class="nav-item">Pendidikan & Pelatihan</a>
                <a href="galeri.html" class="nav-item">Galeri</a>
                <a href="kontak.html" class="nav-item">Kontak</a>
            </nav>
            
            <button class="hamburger" id="hamburger"><i class="fas fa-bars"></i></button>
        </div>
    </header>

    <main>
        <!-- Bagian Hero & Stats tetap sama -->
        <section class="hero-home">
            <div class="hero-overlay"></div>
            <div class="container hero-content-home align-center">
                <div class="badge-outline">PT IDETO KONSULTAN INDONESIA</div>
                <h1 class="hero-title-large mt-20">Solusi Konsultasi<br>Lingkungan, Pelatihan,<br>dan Sertifikasi Terpercaya</h1>
                <p class="hero-subtitle-home mt-20">Mitra strategis Anda dalam mewujudkan kepatuhan regulasi, peningkatan kompetensi SDM, dan keberlanjutan bisnis melalui layanan profesional berstandar tinggi.</p>
                <div class="hero-buttons mt-40">
                    <a href="kontak.html" class="btn-primary-white">Hubungi Kami <i class="fas fa-arrow-right"></i></a>
                    <a href="profile.html" class="btn-outline-white">Pelajari Lebih Lanjut</a>
                </div>
            </div>
        </section>

        <section class="container stats-section pull-up">
            <div class="card card-white shadow-hover grid-3-col stats-grid align-center">
                <div class="stat-item">
                    <i class="far fa-calendar-alt text-green stat-icon"></i>
                    <h3 class="stat-number">Sejak 2015</h3>
                    <p class="text-gray">Berpengalaman</p>
                </div>
                <div class="stat-item stat-border">
                    <i class="fas fa-users text-green stat-icon"></i>
                    <h3 class="stat-number">Ratusan</h3>
                    <p class="text-gray">Klien Terpercaya</p>
                </div>
                <div class="stat-item">
                    <i class="fas fa-award text-green stat-icon"></i>
                    <h3 class="stat-number">BNSP</h3>
                    <p class="text-gray">Sertifikasi Resmi</p>
                </div>
            </div>
        </section>

        <!-- 4. BAGIAN DINAMIS: Menampilkan Kegiatan dari Database -->
        <section class="container page-padding">
            <div class="align-center mb-50">
                <h2 class="section-title">Kegiatan & Berita Terbaru</h2>
                <p class="section-subtitle">Update terbaru mengenai aktivitas konsultasi dan pelatihan kami.</p>
            </div>

            <div class="grid-3-col">
                <?php
                // Ambil data kegiatan terbaru
                $query = mysqli_query($conn, "SELECT * FROM tb_kegiatan ORDER BY id DESC LIMIT 3");
                
                if(mysqli_num_rows($query) > 0) {
                    while($row = mysqli_fetch_array($query)) {
                ?>
                    <div class="card card-white shadow-hover outline-card align-left">
                        <div class="img-wrapper mb-20" style="overflow:hidden; border-radius:8px; height:180px;">
                            <img src="uploads/<?php echo $row['gambar']; ?>" style="width:100%; height:100%; object-fit:cover;">
                        </div>
                        <h3 class="card-sub-heading mb-10"><?php echo $row['judul']; ?></h3>
                        <p class="text-gray fs-small mb-20"><?php echo substr($row['deskripsi'], 0, 100); ?>...</p>
                        <span class="fs-small text-green"><?php echo date('d M Y', strtotime($row['tanggal'])); ?></span>
                    </div>
                <?php 
                    } 
                } else {
                    echo "<p class='align-center'>Belum ada kegiatan yang dipublikasikan.</p>";
                }
                ?>
            </div>
        </section>
        
        <!-- Layanan Utama Tetap Sama -->
        <section class="cta-section align-center">
            <div class="container">
                <h2 class="hero-title-large text-white mb-20">Siap Meningkatkan Kinerja<br>Lingkungan Perusahaan Anda?</h2>
                <a href="kontak.html" class="btn-primary-white">Mulai Konsultasi Gratis</a>
            </div>
        </section>
    </main>

    <!-- Logo Slider & Footer tetap sama, hanya ganti link index.html -->
    <footer class="footer-green"> 
        <div class="container">
            <div class="footer-links">
                <h4 class="footer-heading">Tautan Cepat</h4>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="profile.html">Profile</a></li>
                    <!-- Tautan lainnya -->
                </ul>
            </div>
            <!-- Bagian footer lainnya -->
        </div>
    </footer>
    <script src="script.js"></script>
</body>
</html>