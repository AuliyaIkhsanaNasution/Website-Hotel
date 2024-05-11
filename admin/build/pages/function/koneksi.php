<?php

// connect database
$conn = mysqli_connect("localhost", "root", "", "hotel");

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}


// query (banyak untuk read)
function query($query)
{
    global $conn;
    $rows = [];
    // memilih table / query
    $data = mysqli_query($conn, $query);

    // fetch
    while ($hotel = mysqli_fetch_array($data)) {
        $rows[] = $hotel;
    }

    return $rows;
}

function upload() {

    $fileName = $_FILES['image']['name'];
    $fileSize = $_FILES['image']['size'];
    $error = $_FILES['image']['error'];
    $tmpName = $_FILES['image']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if  ($error === 4) {
        echo "<script>
                alert('Pilih gambar terlebih dahulu!');
              </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $validExtension = ['jpeg'];
    $extension = explode('.', $fileName);
    $extension = strtolower(end($extension));
    if ( !in_array($extension, $validExtension) ) {
        echo "<script>
                alert('Yang anda upload bukan gambar!');
              </script>";
        return false;
    }

    // cek jika ukuran gambar terlalu besar
    if ( $fileSize > 2000000 ) {
        echo "<script>
                alert('Ukuran gambar terlalu besar!');
              </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $newFileName = uniqid();
    // $newFileName .= '.';
    // $newFileName .= $extension;
    move_uploaded_file($tmpName, '../../assets/img/' . $newFileName . '.' . $extension);
    return $newFileName;
}
