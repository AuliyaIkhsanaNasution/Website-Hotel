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
