<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: index.php"); // Melempar ke halaman utama jika belum login
    exit;
}

if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    
    // Cari nama gambar di database
    $query = mysqli_query($conn, "SELECT gambar FROM tb_kegiatan WHERE id = '$id'");
    $data = mysqli_fetch_array($query);
    $gambar = $data['gambar'];
    
    // Hapus file fisiknya dari folder uploads
    if(file_exists("uploads/" . $gambar)) {
        unlink("uploads/" . $gambar);
    }
    
    // Hapus datanya dari database
    $delete = mysqli_query($conn, "DELETE FROM tb_kegiatan WHERE id = '$id'");
    
    if($delete) {
        echo "<script>alert('Kegiatan berhasil dihapus!'); window.location='admin.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus kegiatan!'); window.location='admin.php';</script>";
    }
} else {
    header("Location: admin.php");
}
?>