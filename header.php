<?php 
// Mulai session jika ada halaman yang membutuhkan (seperti cek login)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include 'koneksi.php'; 

// Ambil nama file yang sedang diakses (contoh: 'profile.php')
$halaman_aktif = basename($_SERVER['PHP_SELF']);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PT IDETO KONSULTAN INDONESIA</title>

    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body>
    <header class="header-light">
        <div class="container header-container">
            <a href="index.php" class="logo">
                <div class="logo-icon"><i class="fas fa-leaf"></i></div>
                <div class="logo-text">
                    <span class="logo-title">PT IDETO</span>
                    <span class="logo-subtitle">KONSULTAN INDONESIA</span>
                </div>
            </a>

            <nav class="nav-links" id="nav-links">
                <a href="index.php" class="nav-item <?php echo ($halaman_aktif == 'index.php') ? 'active' : ''; ?>">Home</a>
                <a href="profile.php" class="nav-item <?php echo ($halaman_aktif == 'profile.php') ? 'active' : ''; ?>">Profile</a>
                <a href="konsultasi.php" class="nav-item <?php echo ($halaman_aktif == 'konsultasi.php') ? 'active' : ''; ?>">Konsultasi</a>
                <a href="pelatihan.php" class="nav-item <?php echo ($halaman_aktif == 'pelatihan.php') ? 'active' : ''; ?>">Pendidikan & Pelatihan</a>
                <a href="galeri.php" class="nav-item <?php echo ($halaman_aktif == 'galeri.php') ? 'active' : ''; ?>">Galeri</a>
                <a href="kontak.php" class="nav-item <?php echo ($halaman_aktif == 'kontak.php') ? 'active' : ''; ?>">Kontak</a>
            </nav>

            <button class="hamburger" id="hamburger">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>