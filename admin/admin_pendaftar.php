<?php
session_start();
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: ../index.php");
    exit;
}
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pendaftar - Admin IDETO</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body>
    <div class="admin-container">
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

        <main class="admin-content">
            <h1 style="margin-bottom: 20px;">Data Pendaftaran Pelatihan</h1>
            <div class="admin-card" style="padding: 0; overflow: hidden;">
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse; text-align: left;">
                        <thead>
                            <tr style="background-color: #1a7a43; color: white;">
                                <th style="padding: 15px;">No</th>
                                <th style="padding: 15px;">Instansi / PIC</th>
                                <th style="padding: 15px;">Program</th>
                                <th style="padding: 15px;">Tipe</th>
                                <th style="padding: 15px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            /** @var mysqli $conn */
                            $query = mysqli_query($conn, "SELECT * FROM tb_pendaftar ORDER BY id DESC");
                            if($query && mysqli_num_rows($query) > 0) {
                                while($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 15px;"><?php echo $no++; ?></td>
                                <td style="padding: 15px;"><strong><?php echo $row['perusahaan']; ?></strong><br>PIC: <?php echo $row['nama_pic']; ?></td>
                                <td style="padding: 15px;"><?php echo $row['program_pelatihan']; ?></td>
                                <td style="padding: 15px;"><?php echo $row['tipe_pelatihan']; ?></td>
                                <td style="padding: 15px; text-align: center;">
                                    <a href="hapus_pendaftar.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Hapus data ini?')" style="background-color: #dc3545; color: white; padding: 6px 10px; border-radius: 4px; text-decoration: none;">Hapus</a>
                                </td>
                            </tr>
                            <?php } } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
</body>
</html>