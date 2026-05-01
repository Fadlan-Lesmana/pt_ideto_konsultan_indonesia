<?php
session_start();
// Tambahkan koneksi database di sini agar tabel bisa membaca data
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
    <title>Admin Panel - IDETO</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2>IDETO Admin</h2>
            <nav>
                <a href="admin.php" class="admin-nav-item active">Update Kegiatan</a>
                <a href="logout.php" class="admin-nav-item">Logout</a>
            </nav>
        </aside>

        <main class="admin-content">
            <h1>Tambah Kegiatan Baru</h1>
            <div class="admin-card">
                <form action="proses_simpan.php" method="POST" enctype="multipart/form-data" class="admin-form">
                    <div class="group">
                        <label>Judul Kegiatan</label>
                        <input type="text" name="judul" required>
                    </div>
                    <div class="group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" rows="5" required></textarea>
                    </div>
                    <div class="group">
                        <label>Foto Kegiatan</label>
                        <input type="file" name="gambar" required>
                    </div>
                    <button type="submit" name="simpan" class="btn-admin">Publikasikan</button>
                </form>
            </div>

            <!-- TABEL DAFTAR KEGIATAN MULAI DARI SINI -->
            <h2 style="margin-top: 40px; margin-bottom: 20px;">Daftar Kegiatan Tersimpan</h2>
            <div class="admin-card" style="padding: 0; overflow: hidden;">
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="background-color: #1a7a43; color: white;">
                                <th style="padding: 15px; border-bottom: 1px solid #ddd;">No</th>
                                <th style="padding: 15px; border-bottom: 1px solid #ddd;">Foto</th>
                                <th style="padding: 15px; border-bottom: 1px solid #ddd;">Judul Kegiatan</th>
                                <th style="padding: 15px; border-bottom: 1px solid #ddd;">Deskripsi Singkat</th>
                                <th style="padding: 15px; border-bottom: 1px solid #ddd; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            // Mengambil data dari database urut dari yang paling baru
                            $query = mysqli_query($conn, "SELECT * FROM tb_kegiatan ORDER BY id DESC");
                            
                            if(mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 15px;"><?php echo $no++; ?></td>
                                <td style="padding: 15px;">
                                    <img src="uploads/<?php echo $row['gambar']; ?>" width="80" style="border-radius: 4px; object-fit: cover; height: 60px;">
                                </td>
                                <td style="padding: 15px; font-weight: 500;"><?php echo $row['judul']; ?></td>
                                <td style="padding: 15px; color: #666;">
                                    <!-- Memotong deskripsi agar tidak terlalu panjang di tabel -->
                                    <?php echo substr($row['deskripsi'], 0, 50) . '...'; ?>
                                </td>
                                <td style="padding: 15px; text-align: center;">
                                    <a href="hapus_kegiatan.php?id=<?php echo $row['id']; ?>" 
                                       onclick="return confirm('Yakin ingin menghapus kegiatan ini?')" 
                                       style="background-color: #dc3545; color: white; padding: 8px 12px; text-decoration: none; border-radius: 4px; font-size: 14px; display: inline-block;">
                                       Hapus
                                    </a>
                                </td>
                            </tr>
                            <?php 
                                } 
                            } else {
                                echo "<tr><td colspan='5' style='padding: 30px; text-align: center; color: #888;'>Belum ada data kegiatan yang dipublikasikan.</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- TABEL DAFTAR KEGIATAN SELESAI -->

        </main>
    </div>
</body>
</html>