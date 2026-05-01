<?php
session_start();
include 'koneksi.php'; 

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftar - Admin IDETO</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body>
    <div class="admin-container">
        <!-- SIDEBAR -->
        <aside class="sidebar">
            <h2 style="text-align: center; margin-bottom: 30px;">IDETO Admin</h2>
            <nav style="display: flex; flex-direction: column; gap: 10px;">
                <a href="admin.php" class="admin-nav-item"><i class="fas fa-image"></i> Kelola Kegiatan</a>
                <a href="admin_pesan.php" class="admin-nav-item"><i class="fas fa-envelope"></i> Pesan Masuk</a>
                <a href="admin_pendaftar.php" class="admin-nav-item active"><i class="fas fa-users"></i> Data Pendaftar</a>
                
                <a href="logout.php" class="admin-nav-item" style="margin-top: 40px; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 20px;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </nav>
        </aside>

        <!-- KONTEN DATA PENDAFTAR -->
        <main class="admin-content">
            <h1 style="margin-bottom: 20px;">Data Pendaftaran Pelatihan</h1>
            
            <div class="admin-card" style="padding: 0; overflow: hidden;">
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="background-color: #1a7a43; color: white;">
                                <th style="padding: 15px; border-bottom: 1px solid #ddd;">No</th>
                                <th style="padding: 15px; border-bottom: 1px solid #ddd;">Tanggal Daftar</th>
                                <th style="padding: 15px; border-bottom: 1px solid #ddd;">Instansi / PIC</th>
                                <th style="padding: 15px; border-bottom: 1px solid #ddd;">Kontak</th>
                                <th style="padding: 15px; border-bottom: 1px solid #ddd;">Detail Program</th>
                                <th style="padding: 15px; border-bottom: 1px solid #ddd; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            // Mengambil data dari tb_pendaftar
                            $query = @mysqli_query($conn, "SELECT * FROM tb_pendaftar ORDER BY id DESC");
                            
                            if($query && mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 15px; vertical-align: top;"><?php echo $no++; ?></td>
                                <td style="padding: 15px; vertical-align: top; color: #666; font-size: 14px;">
                                    <?php echo date('d M Y', strtotime($row['tanggal'])); ?><br>
                                    <?php echo date('H:i', strtotime($row['tanggal'])); ?> WIB
                                </td>
                                <td style="padding: 15px; vertical-align: top;">
                                    <strong style="display: block; color: #1a7a43;"><?php echo $row['perusahaan']; ?></strong>
                                    <span style="font-size: 14px; color: #555;">PIC: <?php echo $row['nama_pic']; ?></span>
                                </td>
                                <td style="padding: 15px; vertical-align: top; font-size: 14px;">
                                    <i class="fas fa-envelope text-green"></i> <?php echo $row['email']; ?><br>
                                    <i class="fas fa-phone text-green" style="margin-top: 5px;"></i> <?php echo $row['no_telp']; ?>
                                </td>
                                <td style="padding: 15px; vertical-align: top; font-size: 14px;">
                                    <strong>Program:</strong> <?php echo strtoupper($row['program_pelatihan']); ?><br>
                                    <strong>Peserta:</strong> <?php echo $row['jumlah_peserta']; ?> Orang<br>
                                    <strong>Tipe:</strong> <span style="background-color: #e9ecef; padding: 2px 6px; border-radius: 4px; font-size: 12px;"><?php echo ucfirst($row['tipe_pelatihan']); ?></span>
                                </td>
                                <td style="padding: 15px; text-align: center; vertical-align: top;">
                                    <a href="#" onclick="alert('Fitur hapus segera aktif')" 
                                       style="background-color: #dc3545; color: white; padding: 6px 10px; text-decoration: none; border-radius: 4px; font-size: 13px;">
                                       Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php 
                                } 
                            } else {
                                echo "<tr><td colspan='6' style='padding: 30px; text-align: center; color: #888;'>Belum ada data pendaftar pelatihan.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>