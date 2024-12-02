<?php
$hostname = "localhost";
$user = "root";
$password = "";
$databaseName = "db_web_bs";

$conection = mysqli_connect($hostname, $user, $password, $databaseName,);

// registrasi
function register($data)
{
    global $conection;
    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conection, $data['password']);
    $password2 = mysqli_real_escape_string($conection, $data['password2']);

    // cek username sudah ada atau belum
    // $result = mysqli_query($conection, "SELECT username FROM login_admin WHERE username = '$username'");
    $result = mysqli_query($conection, "SELECT * FROM hanya_admin WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo
        "<script>
            alert('username sudah terdaftar!');
        </script>";
        return false;
    }

    // cek konfrimasi password
    if ($password !== $password2) {
        echo
        "<script>
            alert('konfirmasi  password tidak sesuai');
        </script>";
        return false;
    }

    // enkripsi password //PASSWORD_DEFAULT mengubah password menjadi karakter acak
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    $query = "INSERT INTO hanya_admin VALUES ('', '$username', '$password')";
    // var_dump($password); die;


    mysqli_query($conection, $query) or die(mysqli_error($conection));
    return mysqli_affected_rows($conection);
}

?>
