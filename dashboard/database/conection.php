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

        $email = strtolower(stripslashes($data['email']));
        $password = $data['password'];
        $password2 = $data['password2'];
        $role = 'user'; // Default role adalah 'user'

        // Cek apakah email sudah ada
        $stmt = $conection->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->fetch_assoc()) {
            echo "<script>alert('email sudah terdaftar!');</script>";
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
        $stmt = $conection->prepare("INSERT INTO users (email, password, role) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $email, $passwordHash, $role);

        if ($stmt->execute()) {
            return $stmt->affected_rows;
        } else {
            die("Error: " . $stmt->error);
        }
    }
    ?>
