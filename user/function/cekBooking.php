<?php
require 'koneksi.php';

if (isset($_POST['cekBooking'])) {

    $nik = $_POST['nik'];

    // ambil userid dari nik
    $sql = "SELECT * FROM user WHERE nik = '$nik'";
    $query = mysqli_query($conn, $sql);
    $data = mysqli_fetch_array($query);

    // ambil data user id dari hasil query
    $user_id = $data['user_id'];

    // masukkan user id ke dlam pemesanan utuk cek
    $sql2 = "SELECT * FROM pemesanan JOIN user ON pemesanan.user_id = user.user_id WHERE pemesanan.user_id = '$user_id' ORDER BY tanggal_checkin DESC";
    $query2 = mysqli_query($conn, $sql2);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Booking</title>

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
</head>

<body>

    <div class="my-10 text-center lg:my-16">
        <h1 class="text-3xl font-bold tracking-wide text-gray-900 md:text-4xl">CEK BOOKING</h1>
        <p class="max-w-2xl mx-auto text-gray-500">Hasil cari pemesanan tiket hotel yang telah anda booking disini.</p>
    </div>

    <section class="flex items-center justify-center w-screen my-10 lg:my-20">
        <div class="relative w-full px-3 lg:p-0 lg:w-[80%] overflow-x-auto shadow-md sm:rounded-lg">
            <p class="text-sm font-light text-slate-500">* <span class="font-bold text-red-700">ID Pemesanan</span> adalah bagian penting, dimana kamu dapat mengonfirmasi sewaktu checkin dengan memberikan ID Pemesanan yang tertera.</p>
            <table class="w-full text-sm text-left text-gray-500 rtl:text-right">
                <thead class="text-xs text-center text-gray-700 uppercase bg-yellow-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID Pemesanan
                        </th>
                        <th scope="col" class="px-6 py-3 lg:hidden">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama
                        </th>
                        <th scope="col" class="px-6 py-3">
                            NIK
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Checkin
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Checkout
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Jumlah Tamu
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Total Harga
                        </th>
                        <th scope="col" class="hidden px-6 py-3 text-right lg:block">
                            Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($data2 = mysqli_fetch_array($query2)) :
                    ?>
                        <tr class="text-center bg-white border-b hover:bg-gray-50 ">
                            <th scope="row" class="px-6 py-4 text-xl font-extrabold text-gray-900 whitespace-nowrap">
                                <?= $data2['pemesanan_id'] ?>
                            </th>
                            <td class="px-6 py-4 lg:hidden <?= ($data2['status_pemesanan'] == 'proses') ? 'text-yellow-500' : ($data2['status_pemesanan'] == 'selesai' ? 'text-green-500' : ($data2['status_pemesanan'] == 'batal' ? 'text-red-500' : '')); ?>">
                                <?= $data2['status_pemesanan'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $data2['nama'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $data2['nik'] ?>
                            </td>
                            <td class="px-6 py-4 font-semibold">
                                <?= date('j F Y', strtotime($data2['tanggal_checkin'])) ?>
                            </td>
                            <td class="px-6 py-4 font-semibold">
                                <?= date('j F Y', strtotime($data2['tanggal_checkout'])) ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $data2['jumlah_tamu'] ?>
                            </td>
                            <td class="px-6 py-4">
                                Rp <?= number_format($data2['total_harga'], 0, ',', '.') ?>
                            </td>
                            <td class="px-6 py-4 font-semibold uppercase hidden lg:block <?= ($data2['status_pemesanan'] == 'proses') ? 'text-yellow-500' : ($data2['status_pemesanan'] == 'selesai' ? 'text-green-500' : ($data2['status_pemesanan'] == 'batal' ? 'text-red-500' : '')); ?>">
                                <?= $data2['status_pemesanan'] ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- home -->
    <section class="fixed z-50 p-3 bg-yellow-400 home w-fit rounded-2xl bottom-5 right-5 opacity-30 hover:opacity-100">
        <a href="../../index.php" title="home">
            <svg role="img" viewBox="0 0 24 24" width="30px" height="20px" class="m-auto" xmlns="http://www.w3.org/2000/svg">
                <title>home</title>
                <path d="M12 0a1.44 1.44 0 0 0-.947.399L.547 10.762a1.26 1.26 0 0 0-.342.808v11.138c0 .768.53 1.292 1.311 1.292h20.968c.78 0 1.311-.522 1.311-1.292V11.57a1.25 1.25 0 0 0-.34-.804L15.68 3.097h-.001L12.947.4A1.454 1.454 0 0 0 12 0Zm0 6.727 6.552 6.456v5.65H5.446v-5.65z" />
            </svg>
            <p class="text-xs font-semibold text-center">home</p>
        </a>
    </section>
    <!-- home -->
</body>

</html>