<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    // Mencegah SQL Injection dengan escaping input
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$user'");
    
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        
        // Memverifikasi password yang sudah di-hash di database
        if (password_verify($pass, $data['password'])) {
            $_SESSION['status_login'] = true;
            $_SESSION['admin_user'] = $data['username'];
            header("Location: admin.php");
            exit;
        } else {
            echo "<script>alert('Password salah!');</script>";
        }
    } else {
        echo "<script>alert('Username tidak ditemukan!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - IDETO</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login-ideto.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="login-page">
    <div class="login-box">
        <h2>Admin Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="btn-admin">Login</button>
        </form>
    </div>
</body>
</html>