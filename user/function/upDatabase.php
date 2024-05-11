<?php
require "koneksi.php";
// Mengatur zona waktu
date_default_timezone_set('Asia/Jakarta');

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $kontak = $_POST['kontak'];
    $alamat = $_POST['alamat'];
    $localData = $_POST['localData'];
    $idPemesanan =  rand(100000, 999999);
    $userId =  rand(1, 999999);
    $nik = $_POST['nik'];
    $jmlhTamu = 0;
    $totalHarga = 0;
    $dateNow = date("Y-m-d");


    $dataArray = json_decode($localData, true);
    $dataAwal = $dataArray[0];
    $checkin = $dataAwal['checkin'];
    $checkout = $dataAwal['checkout'];


    // memasukkan ke table user
    $userSql = "INSERT INTO user (user_id, email, nama, alamat, no_telepon)
       VALUES ($userId, '$nik', '$email', '$nama','$alamat', '$kontak')";
    $userResult = mysqli_query($conn, $userSql);

    // memasukkan ke table pemesanan
    $pemesananSql = "INSERT INTO pemesanan (pemesanan_id, user_id, tanggal_pesan, tanggal_checkin, tanggal_checkout, jumlah_tamu, total_harga, status_pemesanan)
       VALUES ($idPemesanan, $userId, NOW(), '$checkin', '$checkout', $jmlhTamu, '$totalHarga',  'proses')";
    $pemesananResult = mysqli_query($conn, $pemesananSql);

    foreach ($dataArray as $item) {
        $checkin = new DateTime($item['checkin']);
        $checkout = new DateTime($item['checkout']);
        $fasilitas = $item['fasilitas'];
        $harga = $item['harga'];
        $idType = $item['idType'];
        $kamar = $item['kamar'];
        $tamu = $item['tamu'];
        $tipeKamar = $item['tipeKamar'];
        $total = $item['total'];
        $kamarArr = [];


        // memasukkan ke table detail pemesanan
        $sql = "INSERT INTO detailpemesanan (pemesanan_id, kamar_id, tipe_kamar, harga_kamar_per_malam, fasilitas_plus)
        VALUES ($idPemesanan, '$kamar', '$idType', '$total', '$fasilitas')";
        $result = mysqli_query($conn, $sql);

        // memeriksa apakah bookingdate ada di table kamar
        $checkKamarSql = "SELECT booking_date FROM kamar WHERE kamar_id = '$kamar'";
        $checkKamarResult = mysqli_query($conn, $checkKamarSql);
        $checkKamar = mysqli_fetch_assoc($checkKamarResult);

        // memasukkan ke table kamar
        if ($checkKamar['booking_date'] == null) {
            // looping utruk menhasilkan interval tanggl
            for ($date = clone  $checkin; $date < $checkout; $date->modify('+1 day')) {
                $kamarArr[] = $date->format('Y-m-d');
            }

            // mengubah aray json ke string
            $booking_date = json_encode($kamarArr);
            // update ketersediaan kamar
            $updateKamarSql = "UPDATE kamar SET booking_date = '$booking_date' WHERE kamar_id = '$kamar'";
            mysqli_query($conn, $updateKamarSql);
        } else {
            // AMBIL data booking_date
            $checkKamarDate = $checkKamar['booking_date'];
            $json_string = str_replace("'", '"', $checkKamarDate);
            $array = json_decode($json_string, true);

            // looping utruk menambahkan interval tanggl
            for ($date = clone  $checkin; $date < $checkout; $date->modify('+1 day')) {
                $array[] = $date->format('Y-m-d');
            }

            // mengubah aray json ke string
            $booking_date = json_encode($array);
            // update ketersediaan kamar
            $updateKamarSql = "UPDATE kamar SET booking_date = '$booking_date' WHERE kamar_id = '$kamar'";
            mysqli_query($conn, $updateKamarSql);
        }

        $jmlhTamu += $tamu;
        $totalHarga += $total;
    }

    // update harga dan jmlh tamu pemesanan
    $updatePemesananSql = "UPDATE pemesanan SET total_harga = $totalHarga, jumlah_tamu = $jmlhTamu WHERE pemesanan_id = $idPemesanan";
    mysqli_query($conn, $updatePemesananSql);



    if ($pemesananResult == true && $result == true) {
        header("Location: ../../index.php?success=true");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
