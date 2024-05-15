<?php
require "koneksi.php"; // Mengimport file koneksi.php

if (isset($_GET['tipekamarId'])) {
    $tipekamarId = htmlspecialchars($_GET['tipekamarId']);
    $checkin = htmlspecialchars($_GET['checkin']);

    // Query untuk mengambil data kamar berdasarkan tipe kamar
    $queryKamar = "SELECT * FROM kamar JOIN tipekamar ON kamar.tipe_kamar_id = tipekamar.tipe_kamar_id WHERE kamar.tipe_kamar_id = '$tipekamarId'";
    $resultKamar = $conn->query($queryKamar);
    $html = '';


    if (!$resultKamar) {
        echo "Error: " . $conn->error; // Tampilkan error jika query gagal
    } else {
        while ($kamar = $resultKamar->fetch_assoc()) {
            $harga = $kamar['harga'];
            $bookingDates = json_decode($kamar['booking_date']);

            if (!in_array($checkin, $bookingDates)) {
                $html .=  "<option value='{$kamar['kamar_id']}'>{$kamar['nomor_kamar']}</option>";
            }
        }
        if ($resultKamar->num_rows == 0) {
            $html .= "<option>Tidak ada kamar tersedia</option>"; // Tidak ada kamar yang cocok
        }
    }

    echo json_encode(['html' => $html, 'harga' => $harga]);
}
