<?php
session_start();
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
        </main>
    </div>
</body>
</html>