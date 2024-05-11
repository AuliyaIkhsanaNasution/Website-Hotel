<?php
require "koneksi.php";

$tipe_kamar_id = $_GET["id"];
$query = "DELETE FROM tipekamar WHERE tipe_kamar_id = '$tipe_kamar_id'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../datatipekamar.php?hapus=true");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
