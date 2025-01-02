<?php
session_start();
require './database/conection.php';

// Jika sudah login, alihkan ke halaman home
if (isset($_SESSION["login"])) {
    header("Location: ./page/home.php");
    exit;
}

// Proses registrasi
$success = false; // Menandai apakah registrasi berhasil
$error = null; // Menampung pesan kesalahan

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Validasi input
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
  <title>Register</title>
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="../src/css/login.css">
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <div class="wrapper">
    <form action="" method="POST">
      <h1>Register</h1>
      <div class="input-box">
        <input type="text" name="username" placeholder="Username" required>
        <i class='bx bxs-user'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password" placeholder="Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      <div class="input-box">
        <input type="password" name="password2" placeholder="Konfirmasi Password" required>
        <i class='bx bxs-lock-alt'></i>
      </div>
      <button type="submit" class="btn">Register</button>
      <div class="register-link">
        <p>Sudah punya akun? <a href="index.php">Login di sini</a></p>
      </div>
    </form>
  </div>

  <!-- Script untuk menampilkan popup -->
  <script>
    <?php if ($error): ?>
      Swal.fire({
        icon: 'error',
        title: 'Registrasi Gagal',
        text: '<?= htmlspecialchars($error) ?>',
      });
    <?php elseif ($success): ?>
      Swal.fire({
        icon: 'success',
        title: 'Registrasi Berhasil',
        text: 'Akun Anda berhasil dibuat!',
      }).then(() => {
        window.location.href = "index.php"; // Redirect ke halaman login
      });
    <?php endif; ?>
  </script>
</body>
</html>
