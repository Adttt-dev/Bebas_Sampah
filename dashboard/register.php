<?php
session_start();
require './database/conection.php';

// Jika sudah login, alihkan ke halaman home
if (isset($_SESSION["login"])) {
    header("Location: ./page/home.php");
    exit;
}

// Proses registrasi
$success = false; // Variabel untuk menandai apakah registrasi berhasil
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Validasi username dan password
    if (empty($username) || empty($password) || empty($password2)) {
        $error = "Semua field harus diisi!";
    } elseif ($password !== $password2) {
        $error = "Konfirmasi password tidak sesuai!";
    } else {
        // Cek apakah username sudah digunakan
        $stmt = $conection->prepare("SELECT username FROM users WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "Username sudah digunakan!";
        } else {
            // Hash password dan tambahkan ke database
            $passwordHash = password_hash($password, PASSWORD_BCRYPT);
            $created_at = date('Y-m-d H:i:s');
            $stmt = $conection->prepare("INSERT INTO users (username, password, role, created_at) VALUES (?, ?, 'user', ?)");
            $stmt->bind_param("sss", $username, $passwordHash, $created_at);

            if ($stmt->execute()) {
                $success = true; // Registrasi berhasil
            } else {
                $error = "Terjadi kesalahan. Silakan coba lagi!";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center">Sign Up</h2>
                <!-- Jika ada error -->
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
                    <div class="mb-3">
                        <label for="password2" class="form-label">Konfirmasi Password</label>
                        <input type="password" name="password2" id="password2" class="form-control" required>
                    </div>
                    <button type="submit" name="signup" class="btn btn-primary w-100">Sign Up</button>
                </form>
                <a href="index.php" class="d-block text-center mt-3">Sudah punya akun? Login di sini</a>
            </div>
        </div>
    </div>

    <!-- Modal Box -->
    <?php if ($success) { ?>
        <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="successModalLabel">Registrasi Berhasil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Selamat! Registrasi berhasil. Silakan login untuk masuk ke akun Anda.
                    </div>
                    <div class="modal-footer">
                        <a href="index.php" class="btn btn-primary">Login Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script>
        // Tampilkan modal jika registrasi berhasil
        <?php if ($success) { ?>
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        <?php } ?>
    </script>
</body>

</html>
