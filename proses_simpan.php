<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];

    // Folder tujuan upload
    $folder = "uploads/";
    $nama_file = $_FILES['gambar']['name'];
    $tmp_file = $_FILES['gambar']['tmp_name'];

    // Pindahkan file
    if (move_uploaded_file($tmp_file, $folder . $nama_file)) {
        $insert = mysqli_query($conn, "INSERT INTO tb_kegiatan (judul, deskripsi, gambar) 
                                  VALUES ('$judul', '$deskripsi', '$nama_file')");
        
        if ($insert) {
            echo "<script>alert('Berhasil Update!'); window.location='admin.php';</script>";
        }
    } else {
        echo "Gagal mengunggah gambar.";
    }
}
?>