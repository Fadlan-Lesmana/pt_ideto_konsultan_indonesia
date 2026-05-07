<?php
session_start();
include 'koneksi.php';

// Proteksi halaman admin
if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: index.php"); 
    exit;
}

if(isset($_GET['id'])) {
    // Amankan ID
    $id = (int)$_GET['id'];
    
    // Hapus dari database
    $delete = mysqli_query($conn, "DELETE FROM tb_pesan WHERE id = '$id'");
    
    if($delete) {
        echo "<script>alert('Pesan berhasil dihapus!'); window.location='admin_pesan.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus pesan!'); window.location='admin_pesan.php';</script>";
    }
} else {
    header("Location: admin_pesan.php");
}
?>