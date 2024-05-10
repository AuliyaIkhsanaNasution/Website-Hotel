<?php
require "koneksi.php";

$pegawai_id = $_GET["id"];
$query = "DELETE FROM pegawai WHERE pegawai_id = '$pegawai_id'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../datapegawai.php?hapus=true");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
