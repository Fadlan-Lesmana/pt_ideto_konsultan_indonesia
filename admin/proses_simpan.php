<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    // 1. Amankan teks dari SQL Injection
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);

    $nama_file = $_FILES['gambar']['name'];
    $tmp_file = $_FILES['gambar']['tmp_name'];
    $ukuran_file = $_FILES['gambar']['size'];

    // 2. Validasi Ekstensi File (Hanya boleh gambar)
    $ekstensi_diperbolehkan = array('jpg', 'jpeg', 'png', 'gif');
    $x = explode('.', $nama_file);
    $ekstensi = strtolower(end($x));

    if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        if ($ukuran_file < 5000000) { // Maksimal 5MB
            // 3. Ubah nama file menjadi unik agar tidak bentrok
            $nama_file_baru = uniqid() . '.' . $ekstensi;
            $folder = "uploads/";

            // 4. PENAMBAHAN DI SINI: Cek dan buat folder uploads/ jika belum ada
            if (!is_dir($folder)) {
                mkdir($folder, 0777, true);
            }

            // Pindahkan file ke folder tujuan
            if (move_uploaded_file($tmp_file, $folder . $nama_file_baru)) {
                $insert = mysqli_query($conn, "INSERT INTO tb_kegiatan (judul, deskripsi, gambar) 
                                        VALUES ('$judul', '$deskripsi', '$nama_file_baru')");
                
                if ($insert) {
                    echo "<script>alert('Kegiatan berhasil dipublikasikan!'); window.location='admin.php';</script>";
                } else {
                    echo "<script>alert('Gagal menyimpan ke database.'); window.location='admin.php';</script>";
                }
            } else {
                echo "<script>alert('Gagal mengunggah gambar ke server.'); window.location='admin.php';</script>";
            }
        } else {
            echo "<script>alert('Ukuran file terlalu besar! Maksimal 5MB.'); window.location='admin.php';</script>";
        }
    } else {
        echo "<script>alert('Ekstensi file ditolak! Hanya boleh unggah JPG, JPEG, PNG, atau GIF.'); window.location='admin.php';</script>";
    }
}
?>