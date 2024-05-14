<?php
require "koneksi.php";

$id = $_GET['id'];
$status_pemesanan = $_GET['status'];

$sql = "UPDATE pemesanan SET status_pemesanan='$status_pemesanan' WHERE pemesanan_id=$id";

if ($conn->query($sql) === TRUE) {
    header("Location: ../datapemesanan.php"); // Redirect back to the main page after updating
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}
?>
