<?php
session_start();
include 'koneksi.php';

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Cek ke database
    $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$user' AND password = '$pass'");
    if (mysqli_num_rows($cek) > 0) {
        $_SESSION['status_login'] = true;
        header("Location: admin.php");
    } else {
        echo "<script>alert('Username atau Password Salah!');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin - IDETO</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .login-box { width: 300px; margin: 100px auto; padding: 20px; border: 1px solid #ccc; border-radius: 8px; }
        .login-box input { width: 100%; margin-bottom: 10px; padding: 10px; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2 style="text-align:center;">Admin Login</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login" class="btn-admin" style="width:100%;">Login</button>
        </form>
    </div>
</body>
</html>