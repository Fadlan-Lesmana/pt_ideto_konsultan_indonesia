<?php
session_start();
include '../koneksi.php';

// Proteksi halaman
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: ../index.php");
    exit;
}

// Ambil data berdasarkan ID
$id = $_GET['id'];
/** @var mysqli $conn */
$query = mysqli_query($conn, "SELECT * FROM tb_kegiatan WHERE id = '$id'");
$data = mysqli_fetch_object($query);

// Jika data tidak ditemukan, balikkan ke halaman admin
if(!$data) {
    header("Location: admin.php");
    exit;
}

// Proses Update Data
if(isset($_POST['update'])) {
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $foto_lama = $_POST['foto_lama'];
    
    // Cek apakah user mengunggah foto baru
    if($_FILES['gambar']['name'] != '') {
        $foto_baru = time() . '_' . $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        
        // Upload foto baru ke folder uploads (keluar folder admin dulu)
        move_uploaded_file($tmp_name, '../uploads/'.$foto_baru);
        
        // Hapus foto lama agar tidak memenuhi hosting
        if(file_exists("../uploads/".$foto_lama)) {
            unlink("../uploads/".$foto_lama);
        }
    } else {
        // Jika tidak upload foto baru, pakai foto yang sudah ada
        $foto_baru = $foto_lama;
    }

    $update = mysqli_query($conn, "UPDATE tb_kegiatan SET 
                                   judul = '$judul', 
                                   deskripsi = '$deskripsi', 
                                   gambar = '$foto_baru' 
                                   WHERE id = '$id'");
                                   
    if($update) { 
        echo "<script>alert('Data Berhasil Diperbarui!'); window.location='admin.php';</script>"; 
    } else {
        echo "<script>alert('Gagal memperbarui data.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kegiatan - Admin IDETO</title>
    <link rel="stylesheet" href="../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2 style="text-align: center; margin-bottom: 30px;">IDETO Admin</h2>
            <nav style="display: flex; flex-direction: column; gap: 10px;">
                <a href="admin.php" class="admin-nav-item active"><i class="fas fa-image"></i> Kelola Kegiatan</a>
                <a href="admin_pesan.php" class="admin-nav-item"><i class="fas fa-envelope"></i> Pesan Masuk</a>
                <a href="admin_pendaftar.php" class="admin-nav-item"><i class="fas fa-users"></i> Data Pendaftar</a>
                <a href="logout.php" class="admin-nav-item" style="margin-top: 40px; border-top: 1px solid rgba(255,255,255,0.2); padding-top: 20px;">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </nav>
        </aside>

        <main class="admin-content">
            <h1>Edit Kegiatan</h1>
            <div class="admin-card">
                <form action="" method="POST" enctype="multipart/form-data" class="admin-form">
                    <input type="hidden" name="foto_lama" value="<?php echo $data->gambar; ?>">
                    
                    <div class="group" style="margin-bottom: 15px;">
                        <label>Judul Kegiatan</label>
                        <input type="text" name="judul" value="<?php echo $data->judul; ?>" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd;">
                    </div>
                    
                    <div class="group" style="margin-bottom: 15px;">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" rows="8" required style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd;"><?php echo $data->deskripsi; ?></textarea>
                    </div>
                    
                    <div class="group" style="margin-bottom: 15px;">
                        <label>Foto Saat Ini</label><br>
                        <img src="../uploads/<?php echo $data->gambar; ?>" width="200" style="border-radius: 8px; margin-bottom: 10px;">
                        <br>
                        <label>Ganti Foto (Biarkan kosong jika tidak ingin ganti)</label>
                        <input type="file" name="gambar">
                    </div>
                    
                    <div style="margin-top: 20px;">
                        <button type="submit" name="update" class="btn-admin">Simpan Perubahan</button>
                        <a href="admin.php" style="background-color: #6c757d; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px; margin-left: 10px;">Batal</a>
                    </div>
                </form>
            </div>
        </main>
    </div>
</body>
</html>