<?php
session_start();
include 'koneksi.php';

$user = mysqli_real_escape_string($conn, $_POST['username']);
$pass = mysqli_real_escape_string($conn, $_POST['password']);

// Gunakan MD5
$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$user' AND password = '".md5($pass)."'");

if (mysqli_num_rows($query) > 0) {
    $data = mysqli_fetch_assoc($query);
    $_SESSION['status_login'] = true;
    header("Location: admin.php");
    exit;
} else {
    echo "<script>alert('Login Gagal!');</script>";
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