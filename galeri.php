<?php 
include 'koneksi.php'; 
?>
<!doctype html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Galeri Kegiatan - PT IDETO KONSULTAN INDONESIA</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  </head>
  <body>
    <header class="header-light">
      <div class="container header-container">
        <!-- Pastikan link logo mengarah ke .php -->
        <a href="index.php" class="logo">
          <div class="logo-icon"><i class="fas fa-leaf"></i></div>
          <div class="logo-text">
            <span class="logo-title">PT IDETO</span>
            <span class="logo-subtitle">KONSULTAN INDONESIA</span>
          </div>
        </a>

        <nav class="nav-links" id="nav-links">
          <!-- Update semua link .html menjadi .php di navigasi -->
          <a href="index.php" class="nav-item">Home</a>
          <a href="profile.html" class="nav-item">Profile</a>
          <a href="konsultasi.html" class="nav-item">Konsultasi</a>
          <a href="pelatihan.html" class="nav-item">Pendidikan & Pelatihan</a>
          <a href="galeri.php" class="nav-item active">Galeri</a>
          <a href="kontak.html" class="nav-item">Kontak</a>
        </nav>

        <button class="hamburger" id="hamburger">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </header>

    <main class="pb-80">
      <section class="page-padding container align-center animate-fade-in-up">
        <h1 class="main-title">Galeri Kegiatan</h1>
        <p class="main-subtitle">
          Dokumentasi aktivitas profesional kami dalam memberikan layanan terbaik untuk klien.
        </p>
      </section>

      <section class="container">
        <!-- Filter tetap ada (opsional untuk data dinamis) -->
        <div class="filter-container animate-fade-in-up delay-1">
          <button class="filter-btn active" data-filter="semua">Semua</button>
          <button class="filter-btn" data-filter="kegiatan">Kegiatan Terbaru</button>
        </div>

        <div class="gallery-grid mt-40">
          
          <?php
          // 2. Ambil data foto dari database
          $query = mysqli_query($conn, "SELECT * FROM tb_kegiatan ORDER BY id DESC");
          
          if(mysqli_num_rows($query) > 0) {
              while($row = mysqli_fetch_array($query)) {
          ?>
              <!-- 3. Tampilan Kartu Galeri Dinamis -->
              <div class="card card-white gallery-card shadow-hover" data-category="kegiatan">
                <div class="gallery-img-wrapper">
                  <!-- Gambar diambil dari folder uploads -->
                  <img 
                    src="uploads/<?php echo $row['gambar']; ?>" 
                    alt="<?php echo $row['judul']; ?>" 
                    class="gallery-img" 
                  />
                  <div class="gallery-overlay" style="padding: 15px; color: white; background: rgba(26, 122, 67, 0.8); position: absolute; bottom: 0; width: 100%;">
                      <h4 style="margin: 0; font-size: 0.9rem;"><?php echo $row['judul']; ?></h4>
                  </div>
                </div>
              </div>
          <?php 
              } 
          } else {
              // Jika data kosong
              echo "<p style='grid-column: 1/-1; text-align: center; color: #666;'>Belum ada foto yang diunggah.</p>";
          }
          ?>

        </div>
      </section>
    </main>

    <footer class="footer-green" style="margin-top: 0">
      <div class="container">
        <div class="grid-3-col-footer">
          <div class="footer-brand">
            <div class="logo-white-group">
              <div class="logo-icon-white"><i class="fas fa-leaf"></i></div>
              <div class="logo-text-white">
                <span class="fw-bold">PT IDETO</span><br />
                <span class="fs-small">KONSULTAN INDONESIA</span>
              </div>
            </div>
            <p class="footer-desc mt-20">
              Solusi Konsultasi Lingkungan, Pelatihan, dan Sertifikasi Terpercaya.
            </p>
          </div>

          <div class="footer-links">
            <h4 class="footer-heading">Tautan Cepat</h4>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="profile.html">Profile</a></li>
              <li><a href="konsultasi.html">Konsultasi</a></li>
              <li><a href="pelatihan.html">Pendidikan & Pelatihan</a></li>
              <li><a href="galeri.php">Galeri</a></li>
              <li><a href="kontak.html">Kontak</a></li>
            </ul>
          </div>

          <div class="footer-contact">
            <h4 class="footer-heading">Informasi Kontak</h4>
            <ul class="contact-list">
              <li><i class="fas fa-phone-alt"></i> +6221-75673754</li>
              <li><i class="fas fa-envelope"></i> admin@idetokonsultan.co.id</li>
            </ul>
          </div>
        </div>

        <div class="footer-bottom">
          <p>&copy; 2026 PT IDETO Konsultan Indonesia. All rights reserved.</p>
        </div>
      </div>
    </footer>

    <script src="script.js"></script>
  </body>
</html>