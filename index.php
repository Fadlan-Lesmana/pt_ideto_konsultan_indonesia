<?php include 'header.php'; ?>

    <main>
        <!-- Bagian Hero & Stats tetap sama -->
        <section class="hero-home">
            <div class="hero-overlay"></div>
            <div class="container hero-content-home align-center">
                <div class="badge-outline">PT IDETO KONSULTAN INDONESIA</div>
                <h1 class="hero-title-large mt-20">Solusi Konsultasi<br>Lingkungan, Pelatihan,<br>dan Sertifikasi Terpercaya</h1>
                <p class="hero-subtitle-home mt-20">Mitra strategis Anda dalam mewujudkan kepatuhan regulasi, peningkatan kompetensi SDM, dan keberlanjutan bisnis melalui layanan profesional berstandar tinggi.</p>
                <div class="hero-buttons mt-40">
                    <!-- LINK SUDAH DIPERBAIKI KE .php -->
                    <a href="kontak.php" class="btn-primary-white">Hubungi Kami <i class="fas fa-arrow-right"></i></a>
                    <a href="profile.php" class="btn-outline-white">Pelajari Lebih Lanjut</a>
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

        <!-- BAGIAN DINAMIS: Menampilkan Kegiatan dari Database -->
        <section class="container page-padding">
            <div class="align-center mb-50">
                <h2 class="section-title">Kegiatan & Berita Terbaru</h2>
                <p class="section-subtitle">Update terbaru mengenai aktivitas konsultasi dan pelatihan kami.</p>
            </div>

            <div class="grid-3-col">
                <?php
                    include 'koneksi.php'; 
                    $query = mysqli_query($conn, "SELECT * FROM tb_kegiatan ORDER BY id DESC LIMIT 3");
                    if($query && mysqli_num_rows($query) > 0) {
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
                <!-- LINK SUDAH DIPERBAIKI KE .php -->
                <a href="kontak.php" class="btn-primary-white">Mulai Konsultasi Gratis</a>
            </div>
        </section>
    </main>

<?php include 'footer.php'; ?>