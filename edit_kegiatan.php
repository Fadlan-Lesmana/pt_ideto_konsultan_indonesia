<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: index.php");
    exit;
}

if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: admin.php");
    exit;
}

// 1. AMANKAN ID (Paksa jadi angka)
$id = (int)$_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM tb_kegiatan WHERE id = '$id'");
$data = mysqli_fetch_object($query);

// Proses Update Data
if(isset($_POST['update'])) {
    // 2. AMANKAN TEKS DARI SQL INJECTION
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $foto_lama = $_POST['foto_lama'];
    
    // Cek apakah admin mengunggah foto baru
    if($_FILES['gambar']['name'] != '') {
        $foto_baru = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $ukuran_file = $_FILES['gambar']['size'];
        
        // 3. VALIDASI FILE (Hanya Gambar & Maksimal 5MB)
        $ekstensi_diperbolehkan = array('jpg', 'jpeg', 'png', 'gif');
        $x = explode('.', $foto_baru);
        $ekstensi = strtolower(end($x));
        
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran_file < 5000000) {
                // Beri nama unik agar tidak bentrok
                $nama_file_unik = uniqid() . '.' . $ekstensi;
                move_uploaded_file($tmp_name, 'uploads/'.$nama_file_unik);
                
                // Hapus foto lama
                if(file_exists("uploads/".$foto_lama)) {
                    unlink("uploads/".$foto_lama);
                }
                $foto_baru = $nama_file_unik;
            } else {
                echo "<script>alert('Ukuran file terlalu besar! Maksimal 5MB.'); window.location='edit_kegiatan.php?id=$id';</script>";
                exit; // Hentikan proses
            }
        } else {
            echo "<script>alert('Ekstensi ditolak! Hanya unggah JPG, PNG, atau GIF.'); window.location='edit_kegiatan.php?id=$id';</script>";
            exit; // Hentikan proses
        }
    } else {
        $foto_baru = $foto_lama; // Jika tidak upload, gunakan foto lama
    }

    // 4. UPDATE KE DATABASE
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