<?php
require "../koneksi.php"; // Mengimport file koneksi.php

if (isset($_POST["submit"])) {
    // Ambil data dari formulir dengan menggunakan fungsi htmlspecialchars untuk menghindari serangan XSS
    $pemesanan_id = rand(100000, 999999);
    $nik = htmlspecialchars($_POST["nik"]);
    $tanggal_pesan = date('Y-m-d');
    $tanggal_checkin = htmlspecialchars($_POST["tanggal_checkin"]);
    $tanggal_checkout = htmlspecialchars($_POST["tanggal_checkout"]);
    $jumlah_tamu = htmlspecialchars($_POST["jumlah_tamu"]);
    $status_pemesanan = 'proses';
    $kamar = isset($_POST["nomor_kamar"]) ? htmlspecialchars($_POST["nomor_kamar"]) : '';
    $tipe_kamar = isset($_POST["tipe_kamar"]) ? htmlspecialchars($_POST["tipe_kamar"]) : '';
    $harga_kamar = htmlspecialchars($_POST["harga_kamar"]);
    $fasilitas_plus = htmlspecialchars($_POST["fasilitas_plus"]);

    // Hitung selisih hari antara tanggal check-in dan check-out
    $tanggal_checkin_unix = strtotime($tanggal_checkin);
    $tanggal_checkout_unix = strtotime($tanggal_checkout);
    $selisih_hari = ($tanggal_checkout_unix - $tanggal_checkin_unix) / (60 * 60 * 24);

    // Hitung total harga berdasarkan harga kamar per malam dan jumlah malam menginap
    $total_harga = $harga_kamar * $selisih_hari;

    // Jika fasilitas_plus adalah 'sarapan', tambahkan biaya tambahan sebesar 100.000 per hari
    if ($fasilitas_plus == 'sarapan') {
        $biaya_sarapan_per_hari = 100000;
        $total_biaya_sarapan = $biaya_sarapan_per_hari * $selisih_hari;
        $total_harga += $total_biaya_sarapan; // Tambahkan biaya tambahan untuk sarapan
    }

    // Memulai transaksi
    $conn->begin_transaction();

    try {
        // Lakukan query untuk memasukkan data pemesanan
        $query_pemesanan = "INSERT INTO pemesanan (pemesanan_id, user_id, tanggal_pesan, tanggal_checkin, tanggal_checkout, jumlah_tamu, total_harga, status_pemesanan) VALUES ('$pemesanan_id', '$nik', '$tanggal_pesan', '$tanggal_checkin', '$tanggal_checkout', '$jumlah_tamu', '$total_harga', '$status_pemesanan')";
        if (!$conn->query($query_pemesanan)) {
            throw new Exception("Error: " . $query_pemesanan . " " . $conn->error);
        }

        // Lakukan query untuk memasukkan data detail pemesanan
        $query_detail_pemesanan = "INSERT INTO detailpemesanan (pemesanan_id, kamar_id, tipe_kamar, harga_kamar_per_malam, fasilitas_plus) VALUES ('$pemesanan_id', '$kamar', '$tipe_kamar', '$harga_kamar', '$fasilitas_plus')";
        if (!$conn->query($query_detail_pemesanan)) {
            throw new Exception("Error: " . $query_detail_pemesanan . " " . $conn->error);
        }

        // Memeriksa apakah booking_date ada di tabel kamar
        $checkKamarSql = "SELECT booking_date FROM kamar WHERE kamar_id = '$kamar'";
        $checkKamarResult = $conn->query($checkKamarSql);
        if (!$checkKamarResult) {
            throw new Exception("Error: " . $checkKamarSql . " " . $conn->error);
        }

        $checkKamar = $checkKamarResult->fetch_assoc();
        $kamarArr = [];
        $checkin = new DateTime($tanggal_checkin);
        $checkout = new DateTime($tanggal_checkout);

        // Jika booking_date null, masukkan tanggal baru
        if (is_null($checkKamar['booking_date'])) {
            // Looping untuk menghasilkan interval tanggal
            for ($date = clone $checkin; $date < $checkout; $date->modify('+1 day')) {
                $kamarArr[] = $date->format('Y-m-d');
            }
        } else {
            // Ambil data booking_date dan decode JSON
            $array = json_decode($checkKamar['booking_date'], true);
            if (!is_array($array)) {
                throw new Exception("Error decoding booking_date JSON");
            }

            // Looping untuk menambahkan interval tanggal
            for ($date = clone $checkin; $date < $checkout; $date->modify('+1 day')) {
                $array[] = $date->format('Y-m-d');
            }
            $kamarArr = $array;
        }

        // Ubah array ke JSON string dan update ketersediaan kamar
        $booking_date = json_encode($kamarArr);
        $updateKamarSql = "UPDATE kamar SET booking_date = '$booking_date' WHERE kamar_id = '$kamar'";
        if (!$conn->query($updateKamarSql)) {
            throw new Exception("Error: " . $updateKamarSql . " " . $conn->error);
        }

        // Commit transaksi jika semua berhasil
        $conn->commit();
        header("Location: ../../datapemesanan.php?tambah=true");
        exit;
    } catch (Exception $e) {
        // Rollback transaksi jika ada error
        $conn->rollback();
        echo "Failed: " . $e->getMessage();
    }

    // Menutup koneksi
    $conn->close();
}
