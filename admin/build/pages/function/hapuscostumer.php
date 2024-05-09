<?php
require "koneksi.php";

$user_id = $_GET["id"];
$query = "DELETE FROM user WHERE user_id = '$user_id'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../datacustomer.php?hapus=true");
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}
