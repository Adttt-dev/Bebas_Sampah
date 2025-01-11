<?php
session_start();
require './database/conection.php';

if (isset($_SESSION['login']) && $_SESSION['login'] === true) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: ../dashboard/page/home.php");
    } else {
        header("Location: ../public/page/home.php");
    }
    exit;
}

$error = "";
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
            $_SESSION['user_id'] = $row['id']; // Menyimpan id pengguna di session

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

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="../src/css/login.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>

<body>

<div class="wrapper">
    <form action="" method="POST">
        <h1>Login</h1>
        <div class="input-box">
            <input type="text" name="username" placeholder="Username" required>
            <i class='bx bxs-user'></i>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" required>
            <i class='bx bxs-lock-alt'></i>
        </div>
        <button type="submit" name="login" class="btn">Login</button>
        <div class="register-link">
            <p>Belum memiliki akun? <a href="./register.php">Register</a></p>
            <p><a href="../public/page/home.php">Kembali</a></p>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script>
    <?php if (!empty($error)) { ?>
        Swal.fire({
            icon: 'error',
            title: 'Login Gagal',
            text: '<?= htmlspecialchars($error); ?>',
            confirmButtonText: 'OK'
        });
    <?php } ?>
</script>

</body>
</html>
