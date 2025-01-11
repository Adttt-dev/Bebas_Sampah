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

    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    // Masukkan hanya kolom yang perlu diisi
    $query = "INSERT INTO laporan (laporan, lokasi, gambar) VALUES ('$laporan', '$lokasi', '$gambar')";

    mysqli_query($conection, $query);

    return mysqli_affected_rows($conection);
}

function upload()
{
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo
        "<script>
            alert('Pilih gambar dulu!');
        </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo
        "<script>
            alert('Bukan gambar!');
        </script>";
        return false;
    }

    // cek ukuran gambar
    if ($ukuranFile > 2000000) {
        echo
        "<script>
            alert('Ukuran gambar terlalu besar!');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid('', true); 
    $namaFileBaru .= '.' . $ekstensiGambar;

    $folderTujuan = '../../database/img/';

    // Lolos pengecekan, gambar siap diupload
    if (move_uploaded_file($tmpName, $folderTujuan . $namaFileBaru)) {
        return $namaFileBaru;
    } else {
        return false;
    }
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

    // Periksa apakah ada gambar baru yang diunggah
    if ($_FILES['gambar']['error'] === 4) {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $gambar = $data['gambar_lama'];  // Asumsi gambar lama disertakan dalam data
    } else {
        // Jika ada gambar baru, proses upload gambar
        $gambar = upload();
        if (!$gambar) {
            return false;  // Jika upload gagal, return false
        }
    }

    // Query untuk update laporan
    $query = "UPDATE laporan SET laporan = '$laporan', lokasi = '$lokasi', gambar = '$gambar' WHERE id = $id";

    // Eksekusi query
    mysqli_query($conection, $query);

    // Cek apakah query berhasil
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

// Fungsi untuk mendapatkan data carousel (video edukasi)
function getCarouselItems()
{
    global $conection;
    $query = "SELECT * FROM edukasi_yt";
    return query($query); // pastikan fungsi query aman (menggunakan prepared statements jika memungkinkan)
}

// Fungsi untuk mengupdate video
function updateVideo($data)
{
    global $conection;
    $id = (int)$data['id']; // pastikan id adalah integer
    $title = htmlspecialchars($data['title']);
    $url_video = htmlspecialchars($data['url_video']);
    $video_embed = htmlspecialchars($data['video_embed']);

    // Query untuk update data dengan prepared statements
    $query = "UPDATE edukasi_yt SET title = ?, url_video = ?, video_embed = ? WHERE id = ?";
    $stmt = mysqli_prepare($conection, $query);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "sssi", $title, $url_video, $video_embed, $id);

    // Eksekusi query
    mysqli_stmt_execute($stmt);

    // Periksa apakah ada perubahan pada data
    return mysqli_stmt_affected_rows($stmt);
}

// Fungsi untuk menghapus video
function deleteVideo($id)
{
    global $conection;
    $id = (int)$id; // pastikan id adalah integer

    // Query untuk menghapus video
    $query = "DELETE FROM edukasi_yt WHERE id = ?";
    $stmt = mysqli_prepare($conection, $query);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "i", $id);

    // Eksekusi query
    mysqli_stmt_execute($stmt);

    // Periksa apakah ada perubahan pada data
    return mysqli_stmt_affected_rows($stmt);
}

// Fungsi untuk menambah video
function tambahVideo($data)
{
    global $conection;

    $title = htmlspecialchars($data["title"]);
    $url_video = htmlspecialchars($data["url_video"]);
    $video_embed = htmlspecialchars($data["video_embed"]);

    // Query untuk insert data dengan prepared statements
    $query = "INSERT INTO edukasi_yt (title, url_video, video_embed) VALUES (?, ?, ?)";
    $stmt = mysqli_prepare($conection, $query);

    // Bind parameter
    mysqli_stmt_bind_param($stmt, "sss", $title, $url_video, $video_embed);

    // Eksekusi query
    mysqli_stmt_execute($stmt);

    // Periksa apakah ada perubahan pada data
    return mysqli_stmt_affected_rows($stmt);
}
