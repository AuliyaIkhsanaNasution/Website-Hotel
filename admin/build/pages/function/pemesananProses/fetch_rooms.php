<?php
/// fetch_rooms.php
include 'koneksi.php';

$tipe_kamar_id = $_GET['tipe_kamar_id'];
$tanggal_checkin = $_GET['tanggal_checkin'];

// Ambil semua kamar dari tipe yang dipilih
$query = "SELECT * FROM kamar WHERE tipe_kamar_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $tipe_kamar_id);
$stmt->execute();
$result = $stmt->get_result();

$rooms = [];
while ($row = $result->fetch_assoc()) {
    // Decode JSON booking_date
    $bookedDates = json_decode($row['booking_date'], true);

    // Cek jika tanggal check-in tidak ada dalam booking_date
    if (!in_array($tanggal_checkin, $bookedDates)) {
        $rooms[] = $row;
    }
}

echo json_encode($rooms);
