<?php
require "koneksi.php"; // Mengimport file koneksi.php

if (isset($_GET['tipekamarId'])) {
    $tipekamarId = htmlspecialchars($_GET['tipekamarId']);

    // Query untuk mengambil data kamar berdasarkan tipe kamar
    $queryKamar = "SELECT * FROM kamar WHERE tipe_kamar_id = '$tipekamarId'";
    $resultKamar = $conn->query($queryKamar);

    echo "<select name='kamar' class='w-full p-2 mt-1 border rounded-md'>";
    while ($kamar = $resultKamar->fetch_assoc()) {
        echo "<option value='{$kamar['kamar_id']}'>{$kamar['nomor_kamar']}</option>";
    }
    echo "</select>";
}
?>
