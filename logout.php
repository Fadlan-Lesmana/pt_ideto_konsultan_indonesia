<?php
session_start();
session_unset();
session_destroy();

// Redirect ke halaman login setelah berhasil logout
echo "<script>alert('Anda telah berhasil keluar dari Admin Panel.'); window.location='login.php';</script>";
exit;
?>