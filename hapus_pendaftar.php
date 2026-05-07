<?php
session_start();
include 'koneksi.php';

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: index.php"); // Melempar ke halaman utama jika belum login
    exit;
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Perintah untuk menghapus data dari tabel tb_pendaftar berdasarkan ID
    $delete = mysqli_query($conn, "DELETE FROM tb_pendaftar WHERE id = '$id'");
    
    if($delete) {
        echo "<script>alert('Data pendaftar berhasil dihapus!'); window.location='admin_pendaftar.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus data!'); window.location='admin_pendaftar.php';</script>";
    }
} else {
    // Jika tidak ada ID, kembalikan ke halaman daftar
    header("Location: admin_pendaftar.php");
}
?>