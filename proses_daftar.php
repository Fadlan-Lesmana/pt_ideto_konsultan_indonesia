<?php
include 'koneksi.php';

if(isset($_POST['daftar'])) {
    $program = $_POST['program_pelatihan'];
    $pic = $_POST['nama_pic'];
    $perusahaan = $_POST['perusahaan'];
    $email = $_POST['email'];
    $telp = $_POST['no_telp'];
    $jumlah = $_POST['jumlah_peserta'];
    $tipe = $_POST['tipe_pelatihan'];

    $insert = mysqli_query($conn, "INSERT INTO tb_pendaftar (program_pelatihan, nama_pic, perusahaan, email, no_telp, jumlah_peserta, tipe_pelatihan) 
                                  VALUES ('$program', '$pic', '$perusahaan', '$email', '$telp', '$jumlah', '$tipe')");

    if($insert) {
        echo "<script>alert('Pendaftaran berhasil! Kami akan segera menghubungi Anda.'); window.location='pelatihan.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan sistem. Silakan coba lagi.'); window.location='pelatihan.php';</script>";
    }
}
?>