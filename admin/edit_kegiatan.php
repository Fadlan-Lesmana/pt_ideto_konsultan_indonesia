<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['status_login']) || $_SESSION['status_login'] !== true) {
    header("Location: ../index.php");
    exit;
}

$id = $_GET['id'];
/** @var mysqli $conn */
$query = mysqli_query($conn, "SELECT * FROM tb_kegiatan WHERE id = '$id'");
$data = mysqli_fetch_object($query);

if(isset($_POST['update'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $foto_lama = $_POST['foto_lama'];
    
    if($_FILES['gambar']['name'] != '') {
        $foto_baru = time() . '_' . $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        move_uploaded_file($tmp_name, '../uploads/'.$foto_baru);
        
        if(file_exists("../uploads/".$foto_lama)) {
            unlink("../uploads/".$foto_lama);
        }
    } else {
        $foto_baru = $foto_lama;
    }

    $update = mysqli_query($conn, "UPDATE tb_kegiatan SET judul = '$judul', deskripsi = '$deskripsi', gambar = '$foto_baru' WHERE id = '$id'");
    if($update) { echo "<script>alert('Berhasil!'); window.location='admin.php';</script>"; }
}
?>