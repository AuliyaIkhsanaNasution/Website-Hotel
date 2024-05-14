<?php 
require "koneksi.php";

$detail_pemesanan_id = $_GET["id"];

// query data user berdasarka id
$sql = "SELECT 
pemesanan.pemesanan_id, 
kamar.nomor_kamar, 
tipekamar.nama_tipe, 
detailpemesanan.harga_kamar_per_malam, 
detailpemesanan.fasilitas_plus,
user.nama AS nama_user,
user.nik,  -- Mengambil nama dari tabel user
pemesanan.tanggal_checkin,  -- Mengambil tanggal check-in dari tabel pemesanan
pemesanan.tanggal_checkout,  -- Mengambil tanggal check-out dari tabel pemesanan
pemesanan.jumlah_tamu,  -- Mengambil jumlah tamu dari tabel pemesanan
pemesanan.total_harga  -- Mengambil total harga dari tabel pemesanan
FROM 
detailpemesanan
JOIN 
pemesanan ON detailpemesanan.pemesanan_id = pemesanan.pemesanan_id
JOIN 
kamar ON detailpemesanan.kamar_id = kamar.kamar_id
JOIN 
tipekamar ON detailpemesanan.tipe_kamar_id = tipekamar.tipe_kamar_id
JOIN 
user ON pemesanan.user_id = user.user_id  -- Join dengan tabel user
WHERE 
pemesanan.pemesanan_id = '$detail_pemesanan_id'";
$hasil = $conn->query($sql);
?>

<?php

?>


<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Detail Pesanan Nuansa Nusantara Hotel</title>

  <!-- tailwind -->
  <link href="./src/output.css" rel="stylesheet" />
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- flowbite -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <!-- mycss -->
  <link rel="stylesheet" href="src/style.css" />

  <!-- icons -->
  <script src="https://kit.fontawesome.com/22f19496c5.js" crossorigin="anonymous"></script>
</head>

<body class="overflow-x-hidden bg-blue-100">

  <div class="flex justify-center">
    <h2 class="text-3xl font-semibold mb-4 mt-8 text-blue-900">Detail Pemesanan</h2>
  </div>

<?php
      $num = 1;
      while ($detail = $hasil->fetch_assoc()) {
      ?>

 <center> 
<a href="#" class="block max-w-5xl p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 mb-6 ">

<div class="grid gap-6 mb-6 md:grid-cols-2">
<div class="mb-6">
    <label for="default-input" class="block mb-2 text-xl  font-semibold text-blue-900 text-left ">ID Pemesanan</label>
    <input type="text" id="default-input" class="bg-gray-100 border border-blue-900 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " readonly value="<?= $detail['pemesanan_id'] ?>">
</div>

<div class="mb-6">
    <label for="default-input" class="block mb-2 text-xl  font-semibold text-blue-900 text-left ">NIK Customer</label>
    <input type="text" id="default-input" class="bg-gray-100 border border-blue-900 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " readonly value="<?= $detail['nik'] ?>">
</div>

<div class="mb-6">
    <label for="default-input" class="block mb-2 text-xl  font-semibold text-blue-900 text-left ">Nama Customer</label>
    <input type="text" id="default-input" class="bg-gray-100 border border-blue-900 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " readonly value="<?= $detail['nama_user'] ?>">
</div>

<div class="mb-6">
    <label for="default-input" class="block mb-2 text-xl  font-semibold text-blue-900 text-left ">Nomor Kamar</label>
    <input type="text" id="default-input" class="bg-gray-100 border border-blue-900 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " readonly value="<?= $detail['nomor_kamar'] ?>">
</div>

<div class="mb-6">
    <label for="default-input" class="block mb-2 text-xl  font-semibold text-blue-900 text-left ">Tipe Kamar</label>
    <input type="text" id="default-input" class="bg-gray-100 border border-blue-900 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " readonly value="<?= $detail['nama_tipe'] ?>">
</div>

<div class="mb-6">
    <label for="default-input" class="block mb-2 text-xl  font-semibold text-blue-900 text-left ">Fasilitas Tambahan</label>
    <input type="text" id="default-input" class="bg-gray-100 border border-blue-900 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " readonly value="<?= $detail['fasilitas_plus'] ?>">
</div>

<div class="mb-6">
    <label for="default-input" class="block mb-2 text-xl  font-semibold text-blue-900 text-left ">Harga Kamar Per Malam</label>
    <input type="text" id="default-input" class="bg-gray-100 border border-blue-900 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " readonly value="<?= $detail['harga_kamar_per_malam'] ?>">
</div>

<div class="mb-6">
    <label for="default-input" class="block mb-2 text-xl  font-semibold text-blue-900 text-left ">Tanggal Check-In</label>
    <input type="text" id="default-input" class="bg-gray-100 border border-blue-900 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " readonly value="<?= date('d-m-Y', strtotime($detail['tanggal_checkin'])) ?>">
</div>

<div class="mb-6">
    <label for="default-input" class="block mb-2 text-xl  font-semibold text-blue-900 text-left ">Tanggal Check-Out</label>
    <input type="text" id="default-input" class="bg-gray-100 border border-blue-900 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " readonly value="<?= date('d-m-Y', strtotime($detail['tanggal_checkout'])) ?>">
</div>

<div class="mb-6">
    <label for="default-input" class="block mb-2 text-xl  font-semibold text-blue-900 text-left ">Jumlah Tamu Per Kamar</label>
    <input type="text" id="default-input" class="bg-gray-100 border border-blue-900 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " readonly value="<?= $detail['jumlah_tamu'] ?>">
</div>

<div class="mb-6">
    <label for="default-input" class="block mb-2 text-xl  font-semibold text-blue-900 text-left ">Total Harga</label>
    <input type="text" id="default-input" class="bg-gray-100 border border-blue-900 text-gray-900 text-lg rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " readonly value="<?= $detail['total_harga'] ?>">
</div>
</div>
</a>
</center>

<?php
        $num++;
      }
      ?>

<div class="flex justify-center mt-5 mb-3">
    <a href="../datapemesanan.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
  </div>

</body>


</html>

