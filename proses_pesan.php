<?php
include 'koneksi.php';

if(isset($_POST['kirim_pesan'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $telp = $_POST['no_telp'];
    $subjek = $_POST['subjek'];
    $pesan = $_POST['pesan'];

    // 1. Simpan data ke Database Admin Panel terlebih dahulu
    $insert = mysqli_query($conn, "INSERT INTO tb_pesan (nama, email, no_telp, subjek, pesan) 
                                   VALUES ('$nama', '$email', '$telp', '$subjek', '$pesan')");

    if($insert) {
        // 2. Siapkan format teks untuk dikirim ke WhatsApp
        // Gunakan nomor Contact Person Anda: 6282298804710 (Ganti angka 0 di depan dengan 62)
        $no_wa_tujuan = "6282298804710"; 
        
        // %0A adalah kode spasi/enter di WhatsApp API
        $teks_wa = "Halo PT IDETO Konsultan Indonesia,%0A%0A";
        $teks_wa .= "Perkenalkan saya *$nama*.%0A%0A";
        $teks_wa .= "*Detail Kontak:*%0A";
        $teks_wa .= "Email: $email%0A";
        $teks_wa .= "No HP: $telp%0A%0A";
        $teks_wa .= "*Subjek:* $subjek%0A";
        $teks_wa .= "*Pesan:*%0A$pesan";

        // URL resmi WhatsApp API
        $link_wa = "https://api.whatsapp.com/send?phone=$no_wa_tujuan&text=$teks_wa";

        // 3. Tampilkan pesan sukses dan redirect ke WhatsApp
        echo "<script>
                alert('Pesan berhasil disimpan di sistem. Anda akan dialihkan ke WhatsApp untuk melanjutkan.');
                window.location.href = '$link_wa';
              </script>";
    } else {
        echo "<script>alert('Terjadi kesalahan saat menyimpan pesan.'); window.location='kontak.php';</script>";
    }
}
?>