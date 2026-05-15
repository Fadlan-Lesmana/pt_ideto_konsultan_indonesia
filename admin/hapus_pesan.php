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
    
    // Perintah untuk menghapus data dari tabel tb_pesan berdasarkan ID
    $delete = mysqli_query($conn, "DELETE FROM tb_pesan WHERE id = '$id'");
    
    if($delete) {
        echo "<script>alert('Pesan berhasil dihapus!'); window.location='admin_pesan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus pesan!'); window.location='admin_pesan.php';</script>";
    }
} else {
    // Jika tidak ada ID, kembalikan ke halaman pesan
    header("Location: admin_pesan.php");
}
?>