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
    <title>Admin Login</title>
    <style>
        body {
            background: linear-gradient(135deg, #3a6186, #89253e);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        .login-container {
            background: #fff;
            border-radius: 15px;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .login-container h1 {
            font-size: 24px;
            font-weight: bold;
            color: #89253e;
            text-align: center;
        }

        .btn-primary {
            background-color: #89253e;
            border-color: #89253e;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-primary:hover {
            background-color: #3a6186;
            border-color: #3a6186;
        }

        .input-group-text {
            background-color: #89253e;
            color: #fff;
            border: none;
        }

        .form-control {
            border-left: none;
            border-color: #ddd;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #89253e;
        }

        .error-message {
            color: #ff4d4d;
            font-size: 14px;
            margin-bottom: 15px;
            text-align: center;
        }

        @media (max-width: 576px) {
            .login-container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="login-container">
        <h1>Login Admin</h1>
        
        <!-- Jika ada error -->
        <?php if (isset($error)) { ?>
            <p class="error-message">Username atau Password Salah!</p>
        <?php } ?>

        <form action="" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                    <input type="text" name="username" class="form-control" id="username" placeholder="Masukkan username Anda">
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
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
