<?php
require "koneksi.php"; // Mengimport file koneksi.php

// Memastikan bahwa pemesanan_id ada dalam URL
if (isset($_GET["id"])) {
    $pemesanan_id = $_GET["id"];

    // Query untuk menghapus data dari tabel detailpemesanan terlebih dahulu
    $query_detail = "DELETE FROM detailpemesanan WHERE pemesanan_id = '$pemesanan_id'";

    if (mysqli_query($conn, $query_detail) === TRUE) {
        // Setelah berhasil menghapus data dari tabel detailpemesanan, lanjutkan dengan menghapus data dari tabel pemesanan
        $query_pemesanan = "DELETE FROM pemesanan WHERE pemesanan_id = '$pemesanan_id'";

        if (mysqli_query($conn, $query_pemesanan) === TRUE) {
            header("location: ../datapemesanan.php?hapus=true");
        } else {
            echo "Error: " . $query_pemesanan . "<br>" . $conn->error;
        }
    } else {
        echo "Error: " . $query_detail . "<br>" . $conn->error;
    }
} else {
    echo "ID pemesanan tidak ditemukan.";
}
?>
