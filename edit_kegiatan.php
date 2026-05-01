<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: login.php");
    exit;
}

// Ambil data yang mau diedit berdasarkan ID
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM tb_kegiatan WHERE id = '$id'");
$data = mysqli_fetch_object($query);

// Proses Update Data Jika Tombol Simpan Diklik
if(isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $foto_lama = $_POST['foto_lama'];
    
    // Cek apakah admin mengunggah foto baru
    if($_FILES['gambar']['name'] != '') {
        $foto_baru = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp_name, 'uploads/'.$foto_baru);
        
        // Hapus foto lama agar folder tidak penuh
        if(file_exists("uploads/".$foto_lama)) {
            unlink("uploads/".$foto_lama);
        }
    } else {
        // Jika tidak upload foto baru, gunakan foto lama
        $foto_baru = $foto_lama;
    }

    $update = mysqli_query($conn, "UPDATE tb_kegiatan SET 
                            judul = '$judul', 
                            deskripsi = '$deskripsi', 
                            gambar = '$foto_baru' 
                            WHERE id = '$id'");

    if($update) {
        echo "<script>alert('Data berhasil diperbarui!'); window.location='admin.php';</script>";
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Kegiatan - Admin IDETO</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body>
    <div class="admin-container">
        <aside class="sidebar">
            <h2 style="text-align: center; margin-bottom: 30px;">IDETO Admin</h2>
            <nav style="display: flex; flex-direction: column; gap: 10px;">
                <a href="admin.php" class="admin-nav-item active"><i class="fas fa-image"></i> Kelola Kegiatan</a>
                <a href="admin.php" class="admin-nav-item"><i class="fas fa-arrow-left"></i> Kembali</a>
            </nav>
        </aside>

        <main class="admin-content">
            <h1>Edit Kegiatan</h1>
            <div class="admin-card">
                <form action="" method="POST" enctype="multipart/form-data" class="admin-form">
                    <div class="group">
                        <label>Judul Kegiatan</label>
                        <input type="text" name="judul" value="<?php echo $data->judul; ?>" required>
                    </div>
                    <div class="group">
                        <label>Deskripsi</label>
                        <textarea name="deskripsi" rows="5" required><?php echo $data->deskripsi; ?></textarea>
                    </div>
                    <div class="group">
                        <label>Foto Saat Ini</label><br>
                        <img src="uploads/<?php echo $data->gambar; ?>" width="150" style="border-radius: 5px; margin-bottom: 10px;">
                        <input type="hidden" name="foto_lama" value="<?php echo $data->gambar; ?>">
                    </div>
                    <div class="group">
                        <label>Ganti Foto (Biarkan kosong jika tidak ingin ganti)</label>
                        <input type="file" name="gambar">
                    </div>
                    <button type="submit" name="update" class="btn-admin" style="background-color: #0d6efd;">Update Kegiatan</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>