<?php
require "koneksi.php";

$kamar_id = $_GET["id"];
$query = "DELETE FROM kamar WHERE kamar_id = '$kamar_id'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../datakamar.php?hapus=true");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
