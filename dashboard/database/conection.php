<?php
$hostname = "localhost";
$user = "root";
$password = "";
$databaseName = "db_web_bs";

// Membuat koneksi ke database
$conection = mysqli_connect($hostname, $user, $password, $databaseName);

// Cek koneksi
if (!$conection) {
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Fungsi registrasi
function register($data)
{
    global $conection;

    $username = strtolower(stripslashes($data['username']));
    $password = $data['password'];
    $password2 = $data['password2'];
    $role = 'user'; // Default role adalah 'user'

    // Cek apakah username sudah ada
    $stmt = $conection->prepare("SELECT username FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->fetch_assoc()) {
        echo "<script>alert('Username sudah terdaftar!');</script>";
        return false;
    }

    // Validasi konfirmasi password
    if ($password !== $password2) {
        echo "<script>alert('Konfirmasi password tidak sesuai');</script>";
        return false;
    }

    // Enkripsi password
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru ke database
    $stmt = $conection->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $passwordHash, $role);

    if ($stmt->execute()) {
        return $stmt->affected_rows;
    } else {
        die("Error: " . $stmt->error);
    }
}
?>
