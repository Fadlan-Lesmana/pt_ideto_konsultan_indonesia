<?php include 'header.php'; ?>

    <main class="pb-80">
      <section class="page-padding container align-center animate-fade-in-up">
        <h1 class="main-title">Galeri Kegiatan</h1>
        <p class="main-subtitle">
          Dokumentasi aktivitas profesional kami dalam memberikan layanan terbaik untuk klien.
        </p>
      </section>

      <section class="container">
        <div class="filter-container animate-fade-in-up delay-1">
          <button class="filter-btn active" data-filter="semua">Semua</button>
          <button class="filter-btn" data-filter="kegiatan">Kegiatan Terbaru</button>
        </div>

        <div class="gallery-grid mt-40">
          <?php
          // Pastikan database dipanggil karena di file ini kita melakukan query terpisah
          include 'koneksi.php';
          $query = mysqli_query($conn, "SELECT * FROM tb_kegiatan ORDER BY id DESC");
          
          if(mysqli_num_rows($query) > 0) {
              while($row = mysqli_fetch_array($query)) {
          ?>
              <div class="card card-white gallery-card shadow-hover" data-category="kegiatan">
                <div class="gallery-img-wrapper" style="position: relative;">
                  <img 
                    src="uploads/<?php echo $row['gambar']; ?>" 
                    alt="<?php echo htmlspecialchars($row['judul']); ?>" 
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
              echo "<p style='grid-column: 1/-1; text-align: center; color: #666;'>Belum ada foto yang diunggah.</p>";
          }
          ?>
        </div>
      </section>
    </main>

<?php include 'footer.php'; ?>