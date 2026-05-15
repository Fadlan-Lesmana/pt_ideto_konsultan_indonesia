<?php
session_start();

// Cek apakah admin sudah login
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: ../index.php"); // Keluar folder menuju halaman utama
    exit;
}

include '../koneksi.php'; 

if(isset($_GET['id'])) {
    /** @var mysqli $conn */
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Cari nama gambar di database terlebih dahulu
    $query = mysqli_query($conn, "SELECT gambar FROM tb_kegiatan WHERE id = '$id'");
    
    if(mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_array($query);
        $gambar = $data['gambar'];
        
        // Hapus file fisiknya dari folder uploads (keluar folder admin dulu)
        if(file_exists("../uploads/" . $gambar)) {
            unlink("../uploads/" . $gambar);
        }
        
        // Hapus datanya dari database
        $delete = mysqli_query($conn, "DELETE FROM tb_kegiatan WHERE id = '$id'");
        
        if($delete) {
            echo "<script>alert('Kegiatan dan foto berhasil dihapus!'); window.location='admin.php';</script>";
        } else {
            echo "<script>alert('Gagal menghapus kegiatan dari database!'); window.location='admin.php';</script>";
        }
    } else {
        echo "<script>alert('Data kegiatan tidak ditemukan!'); window.location='admin.php';</script>";
    }
} else {
    header("Location: admin.php");
}
?>