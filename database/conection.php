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

    // Masukkan hanya kolom yang perlu diisi
    $query = "INSERT INTO laporan (laporan, lokasi, pelapor) VALUES ('$laporan', '$lokasi', '$pelapor')";

    mysqli_query($conection, $query);

    return mysqli_affected_rows($conection);
}


// delete laporan
function deleteLaporan($id)
{
    global $conection;
    mysqli_query($conection, "DELETE FROM laporan WHERE id = $id");
    return mysqli_affected_rows($conection);
};

// delete saran
function deleteSaran($id)
{
    global $conection;
    mysqli_query($conection, "DELETE FROM saran WHERE id = $id");
    return mysqli_affected_rows($conection);
};


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

    if ($affectedRows === 0) {
        return -1;
    }

    // Return the number of affected rows (greater than 0 indicates success)
    return $affectedRows;
}


// edukasi

function getCarouselItems()
{
    global $conection;
    $query = "SELECT * FROM edukasi_yt";
    return query($query);
}

function updateVideo($data)
{
    global $conection;
    $id = $data['id'];
    $title = htmlspecialchars($data['title']);
    $url_video = htmlspecialchars($data['url_video']);
    $video_embed = htmlspecialchars($data['video_embed']);

    // Query untuk update data
    $query = "UPDATE edukasi_yt SET 
                title = '$title', 
                url_video = '$url_video', 
                video_embed = '$video_embed' 
              WHERE id = $id";

    mysqli_query($conection, $query);

    return mysqli_affected_rows($conection);
}


function deleteVideo($id)
{
    global $conection;
    mysqli_query($conection, "DELETE FROM edukasi_yt WHERE id = $id");
    return mysqli_affected_rows($conection);
}

function tambahVideo($data)
{
    global $conection;

    $title = htmlspecialchars($data["title"]);
    $url_video = htmlspecialchars($data["url_video"]); // Sesuaikan dengan nama field di form
    $video_embed = htmlspecialchars($data["video_embed"]);

    $query = "INSERT INTO edukasi_yt (title, url_video, video_embed) 
              VALUES ('$title', '$url_video', '$video_embed')";

    mysqli_query($conection, $query);

    return mysqli_affected_rows($conection);
}

