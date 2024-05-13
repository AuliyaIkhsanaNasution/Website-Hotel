<?php 
require "koneksi.php";

$detail_pemesanan_id = $_GET["id"];

// query data user berdasarka id
$sql = "SELECT pemesanan.pemesanan_id, kamar.nomor_kamar, tipekamar.nama_tipe, detailpemesanan.harga_kamar_per_malam, detailpemesanan.fasilitas_plus
FROM detailpemesanan
JOIN pemesanan ON detailpemesanan.pemesanan_id = pemesanan.pemesanan_id
JOIN kamar ON detailpemesanan.kamar_id = kamar.kamar_id
JOIN tipekamar ON detailpemesanan.tipe_kamar_id = tipekamar.tipe_kamar_id
WHERE pemesanan.pemesanan_id = '$detail_pemesanan_id';
";
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

  <div class="flex justify-center">
  <table class="max-w-sm p-6 bg-gray-100 border border-blue-800 rounded-lg shadow divide-y divide-gray-300">
    <thead class="align-bottom">
      <tr class="bg-blue-200">
        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b  shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70 w-[5%]">No</th>
        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70 w-[5%]">Pemesanan ID</th>
        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">Nomor Kamar</th>
        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">Tipe Kamar</th>
        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">Harga Kamar</th>
        <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">Fasilitas Plus</th>
      </tr>
    </thead>
    <tbody class="align-center">
      <?php
      $num = 1;
      while ($detail = $hasil->fetch_assoc()) {
      ?>
        <tr>
          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap  text-center"><?= $num ?></td>
          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap  text-center"><?= $detail['pemesanan_id'] ?></td>
          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap  text-center"><?= $detail['nomor_kamar'] ?></td>
          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap  text-center"><?= $detail['nama_tipe'] ?></td>
          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap  text-center"><?= $detail['harga_kamar_per_malam'] ?></td>
          <td class="p-2 align-middle bg-transparent border-b whitespace-nowrap  text-center"><?= $detail['fasilitas_plus'] ?></td>
        </tr>
      <?php
        $num++;
      }
      ?>
    </tbody>
  </table>
</div>



  <div class="flex justify-center mt-8">
    <a href="../datapemesanan.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Kembali</a>
  </div>

</body>


</html>

