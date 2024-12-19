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


<html>

<head>
    <title>Sign In / Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../src/css/log.css">
</head>

<body>
    <div class="container">
        <div class="right">
            <h2>Halo, Teman!</h2>
            <p>Daftarkan diri anda dan mulai gunakan layanan kami segera</p>
            <a href="index.php" class="text-decoration-none">
                <button class="btn btn-outline-light w-100">SIGN IN</button>
            </a>

        </div>
        <div class="left">
            <h2 class="py-5">Sign Up</h2>
            <!-- Jika ada error -->
            <?php if (isset($error)) { ?>
                <p class="error-message">Username atau Password Salah!</p>
            <?php } ?>
            <form action="" method="POST">
                <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                <a href="../public/page/home.php" class="text-decoration-none">kembali?</a>
                <a href="index.php" class="text-decoration-none">
                    <button type="submit" name="login" class="btn btn-primary mt-3 w-100">SIGN UP</button>
                </a>
            </form>
        </div>
    </div>
</body>

</html>