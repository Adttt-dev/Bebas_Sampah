<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "db_web_bs";

$conection = mysqli_connect($host, $user, $password, $database);

function query($query)
{
    global $conection;
    $result = mysqli_query($conection, query: $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// insert
function tambah($data)
{
    global $conection;

    $laporan = htmlspecialchars($data["laporan"]);
    $lokasi = htmlspecialchars($data["lokasi"]);
    $pelapor = htmlspecialchars($data["pelapor"]);
    $query = "INSERT INTO laporan VALUES ('', '$laporan', '$lokasi', '$pelapor')";
    mysqli_query($conection, $query);
    return mysqli_affected_rows($conection);
}

function delete($id)
{
    global $conection;
    $query = "DELETE FROM laporan WHERE id = '$id'";
    mysqli_query($conection, $query);
    return mysqli_affected_rows($conection);
}


// update
function update($data)
{
    global $conection;                              
    $id = $data['id'];
    $laporan = htmlspecialchars($data['laporan']);
    $lokasi = htmlspecialchars($data['lokasi']);
    $pelapor = htmlspecialchars($data['pelapor']);


    // query insert data
    $query = "UPDATE laporan SET laporan = '$laporan', lokasi = '$lokasi', pelapor = '$pelapor' WHERE id = $id";

    mysqli_query($conection, $query);

    return mysqli_affected_rows($conection);
}


// Fungsi untuk menambah saran ke dalam database
function tambahSaran($data)
{
    global $conection;

    // Sanitasi input untuk mencegah XSS
    $kategori = htmlspecialchars($data["kategori"]);
    $saran = htmlspecialchars($data["saran"]);

    // Query SQL untuk memasukkan data
    $query = "INSERT INTO saran (kategori, saran) VALUES ('$kategori', '$saran')";

    // Eksekusi query
    mysqli_query($conection, $query);

    // Return jumlah baris yang terpengaruh
    return mysqli_affected_rows($conection);
}


// function tambahSaran($data)
// {
//     global $conection;

//     // Menyaring input data untuk mencegah XSS
//     $kategori = htmlspecialchars($data["kategori"]);
//     $saran = htmlspecialchars($data["saran"]);

//     // Membuat query SQL dengan prepared statement untuk mencegah SQL Injection
//     $query = "INSERT INTO saran (kategori, saran) VALUES (?, ?)";
//     $stmt = mysqli_prepare($conection, $query);

//     // Menyiapkan parameter untuk query
//     mysqli_stmt_bind_param($stmt, "ss", $kategori, $saran);

//     // Menjalankan query
//     if (mysqli_stmt_execute($stmt)) {
//         // Jika query berhasil, mengembalikan jumlah baris yang terpengaruh
//         $affectedRows = mysqli_stmt_affected_rows($stmt);

//         // Menutup statement setelah query berhasil
//         mysqli_stmt_close($stmt);

//         return $affectedRows;
//     } else {
//         // Menangani error jika query gagal
//         echo "Error: " . mysqli_error($conection);
//         // Menutup statement setelah query gagal
//         mysqli_stmt_close($stmt);

//         return 0;
//     }
// }





// // catat aksi
// function logAksi($aksi, $laporan_id, $user = 'Admin') {
//     global $conn;
//     $stmt = $conn->prepare("INSERT INTO log_aksi (aksi, laporan_id, user) VALUES (?, ?, ?)");
//     $stmt->bind_param("sis", $aksi, $laporan_id, $user);
//     $stmt->execute();
// }

// // jumlah aksi
// function countTotalAksi() {
//     global $conn;
//     $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM log_aksi");
//     $row = mysqli_fetch_assoc($result);
//     return $row['total'];
// }

// // aksi berdasarkan jenis
// function countAksiByType($type) {
//     global $conn;
//     $stmt = $conn->prepare("SELECT COUNT(*) as total FROM log_aksi WHERE aksi = ?");
//     $stmt->bind_param("s", $type);
//     $stmt->execute();
//     $result = $stmt->get_result();
//     $row = $result->fetch_assoc();
//     return $row['total'];
// }


// update saran
function updateSaran($data)
{
    global $conection;

    // Validate and sanitize input
    $id = mysqli_real_escape_string($conection, $data['id']);
    $kategori = htmlspecialchars($data['kategori']);
    $saran = htmlspecialchars($data['saran']);

    // Prepare SQL query with parameterized statement
    $query = "UPDATE saran SET kategori = ?, saran = ? WHERE id = ?";

    // Prepare statement
    $stmt = mysqli_prepare($conection, $query);

    // Bind parameters
    mysqli_stmt_bind_param($stmt, "ssi", $kategori, $saran, $id);

    // Execute statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the query was successful
    if (!$result) {
        die("Error updating record: " . mysqli_error($conection));
    }

    // Check if any row was affected
    $affectedRows = mysqli_stmt_affected_rows($stmt);

    // Close statement
    mysqli_stmt_close($stmt);

    // If no rows were affected, maybe data wasn't changed
    if ($affectedRows === 0) {
        // This means no row was updated, possibly due to no change in data
        return -1; // Use -1 to indicate no changes were made
    }

    // Return the number of affected rows (greater than 0 indicates success)
    return $affectedRows;
}
