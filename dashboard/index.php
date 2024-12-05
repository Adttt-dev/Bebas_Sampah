<?php
session_start();
if (isset($_SESSION["login"])) {
    header("Location: ./page/home.php");
    exit;
}

require './database/conection.php';

// jika tombol submit sudah di klik
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $result = mysqli_query($conection, "SELECT * FROM hanya_admin WHERE username = '$username'");

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION["login"] = true;
            header("Location: ./page/home.php");
            exit;
        }
    }
    $error = true;
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../src/css/login.css">
    <title>Login</title>
    <style>
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Login</h1>
        
        <!-- Jika ada error -->
        <?php if (isset($error)) { ?>
            <p class="error-message">Username atau Password Salah!</p>
        <?php } ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username Anda" autocomplete="off">
                </div>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" id="password" placeholder="Masukkan password Anda">
                </div>
            </div>
            <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
            <a href="../public/page/home.php">Kembali ke Home</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
