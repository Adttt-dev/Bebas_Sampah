<?php
session_start();
require './database/conection.php';

// Cek apakah pengguna sudah login
if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: ../dashboard/page/home.php");
    } else {
        header("Location: ../public/page/home.php");
    }
    exit;
}

// Proses login jika form disubmit
if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conection, $_POST['username']);
    $password = $_POST['password'];

    // Cek username di database menggunakan prepared statement untuk keamanan
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = mysqli_prepare($conection, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        // Verifikasi password menggunakan password_verify
        if (password_verify($password, $row['password'])) {
            // Set session
            $_SESSION['login'] = true;
            $_SESSION['role'] = $row['role'];
            $_SESSION['username'] = $row['username']; // Menambahkan username ke session

            // Redirect berdasarkan role
            if ($row['role'] === 'admin') {
                header("Location: ../dashboard/page/home.php");
            } else {
                header("Location: ../public/page/home.php");
            }
            exit;
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Username tidak ditemukan!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Login</h2>
                <?php if (isset($error)) { ?>
                    <p class="text-danger text-center"><?= $error; ?></p>
                <?php } ?>
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
                    <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
                    <a href="./register.php" class="d-block text-center mt-3">Daftar</a>
                    <a href="../public/page/home.php" class="d-block text-center mt-3">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
