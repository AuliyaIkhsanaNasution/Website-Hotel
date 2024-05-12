<?php

require 'function/koneksi.php';

if (!isset($_POST['checkin']) && !isset($_POST['checkout']) && !isset($_POST['jmlh'])) {
    header('location: ../index.php?error=true');
}


$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$jmlh = $_POST['jmlh'];


// pengecekan checkin dan checkout
if ($checkin > $checkout) {
    header('location: ../index.php?error=true');
}

// ambil data type dan nomor kamar
$typeKamar = mysqli_query($conn, "SELECT * FROM tipeKamar");


?>


<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemesanan Kamar Nuansa Nusantara</title>

    <!-- tailwind -->
    <link href="../src/output.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- mycss -->
    <link rel="stylesheet" href="../src/style.css" />

    <!-- icons -->
    <script src="https://kit.fontawesome.com/22f19496c5.js" crossorigin="anonymous"></script>
</head>

<body class="w-screen overflow-x-hidden bg-slate-100">

    <?php
    if (isset($_GET['success'])) {
        echo '
        <script>
        alert("Data pemesanan berhasil ditambahkan");
        </script>
        ';
    }
    ?>

    <!-- navbar -->
    <section>
        <nav class="w-screen bg-blue-800 border-gray-200">
            <div class="flex flex-wrap items-center justify-between max-w-screen-xl p-4 mx-auto">
                <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-lg font-bold text-yellow-400 lg:text-2xl whitespace-nowrap">Nuansa Nusantara</span>
                </a>
                <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 " aria-controls="navbar-default" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                    </svg>
                </button>
                <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                    <ul class="flex flex-col p-4 mt-4 font-medium border md:p-0 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 ">
                        <li>
                            <div class="flex space-x-3 lg:order-2 lg:space-x-0 rtl:space-x-reverse">


                                <a href="keranjang.php" class="px-4 py-1 text-sm font-medium text-center text-white bg-yellow-400 rounded-lg hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300">
                                    <i class="px-4 text-lg text-white rounded-full fa-solid fa-basket-shopping" id="cart"> 0 </i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </section>
    <!-- end navbar -->

    <!-- data -->
    <section>
        <div class="container p-4 px-8 mx-auto md:px-28">
            <div class="flex-row items-center md:flex">
                <div class="flex-1">
                    <label class="text-sm font-semibold lg:text-base" for="checkin">checkin</label> <br />
                    <input type="checkin" class="w-[90%] text-sm lg:text-base border border-gray-400 p-2 rounded-lg mr-4" value="<?= date("l, d-m-Y", strtotime($checkin)) ?>">
                </div>
                <div class="flex-1">
                    <label class="text-sm font-semibold lg:text-base" for="checkout">checkout</label> <br />
                    <input type="checkout" class="w-[90%] text-sm lg:text-base border border-gray-400 p-2 rounded-lg mr-4" value="<?= date("l, d-m-Y", strtotime($checkout)) ?>">
                </div>
                <div class="flex-1">
                    <label class="text-sm font-semibold lg:text-base" for="jumlah tamu">Jumlah Tamu</label> <br />
                    <input type="number" class="w-[90%] text-sm lg:text-base border border-gray-400 p-2 rounded-lg mr-4" value="<?= $jmlh ?>">
                </div>
            </div>
        </div>
    </section>

    <!-- Room -->
    <?php while ($rowType = mysqli_fetch_assoc($typeKamar)) : ?>
        <section>
            <div class="container px-8 py-10 mx-auto md:py-0 md:px-28">
                <h1 class="mb-2 text-xl font-bold lg:text-2xl"><?= $rowType['nama_tipe'] ?></h1>
                <hr class="mb-2">
                <div class="flex-row md:flex ">
                    <div class="basis-1/4 ">
                        <div class="pb-10 mb-5 bg-white border border-gray-300 rounded-lg shadow md:pb-28 max-w-60 ">
                            <a href="#">
                                <img class="w-full rounded-t-lg" style="max-width: 500px;" src="../assets/images/<?= $rowType['image'] ?>.jpeg" alt="" />
                            </a>
                            <div class="p-4">
                                <i class="text-base text-gray-800 fa-solid fa-user lg:text-lg"></i><span class="text-sm lg:text-base"> Untuk <?= $rowType['jmlh_tamu'] ?> Orang</span> <br>
                                <i class="text-base text-gray-800 fa-solid fa-door-open lg:text-lg"></i><span class="text-sm lg:text-base"> <?= $rowType['ukuran'] ?> sqm</span> <br>
                                <button data-modal-target="<?= $rowType['slug'] ?>" data-modal-toggle="<?= $rowType['slug'] ?>" class="font-medium text-blue-600 hover:underline">Read more &raquo;</button>
                            </div>
                        </div>
                    </div>

                    <!-- modal -->
                    <?php include "modal/detail.php"; ?>

                    <div class="flex-1 ">
                        <div class="flex flex-col justify-between max-w-full p-6 mb-5 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow">
                            <div class="flex items-center justify-between">
                                <div class="w-1/2">
                                    <a href="#">
                                        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 ">Room</h5>
                                    </a>
                                    <i class="text-sm text-gray-800 fa-solid fa-check lg:text-lg"></i><span class="text-sm lg:text-base"> Tidak Dapat Dikembalikan</span>
                                    <i class="text-sm text-gray-800 fa-solid fa-check lg:text-lg"></i><span class="text-sm lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
                                    <i class="text-sm text-gray-800 fa-solid fa-check lg:text-lg"></i><span class="text-sm text-yellow-500 lg:text-base"> Termasuk Sarapan (jika memilih fasilitas tambahan sarapan)</span> <br><br>

                                    <span class="text-lg font-bold lg:text-xl">Pembayaran</span><br>
                                    <i class="text-sm text-gray-800 fa-solid fa-check lg:text-lg"></i><span class="text-sm lg:text-base"> Bayar Sekarang</span>
                                    <i class="text-sm text-gray-800 fa-solid fa-check lg:text-lg"></i><span class="text-sm lg:text-base"> Bayar Nanti</span> <br>
                                </div>
                                <div class="text-right">
                                    <span class="text-xs lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                                    <span class="text-xl font-semibold lg:text-2xl"> RP <?= number_format($rowType['harga'], 0, ',', '.') ?></span> <br>
                                    <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>

                                    <button data-modal-target="<?= "konfirmasi-" . $rowType['slug'] ?>" data-modal-toggle="<?= "konfirmasi-" . $rowType['slug'] ?>" class="inline-flex items-center px-3 py-2 mt-10 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        Pilih Kamar
                                    </button>

                                </div>

                                <?php include "modal/konfirmasiPesanan.php"; ?>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    <?php endwhile; ?>
    <!-- akhir Room -->


    <!-- home -->
    <section class="fixed z-50 p-3 bg-yellow-400 home w-fit rounded-2xl bottom-5 right-5 opacity-30 hover:opacity-100">
        <a href="../index.php">
            <svg role="img" viewBox="0 0 24 24" width="30px" height="20px" class="m-auto" xmlns="http://www.w3.org/2000/svg">
                <title>Google Home</title>
                <path d="M12 0a1.44 1.44 0 0 0-.947.399L.547 10.762a1.26 1.26 0 0 0-.342.808v11.138c0 .768.53 1.292 1.311 1.292h20.968c.78 0 1.311-.522 1.311-1.292V11.57a1.25 1.25 0 0 0-.34-.804L15.68 3.097h-.001L12.947.4A1.454 1.454 0 0 0 12 0Zm0 6.727 6.552 6.456v5.65H5.446v-5.65z" />
            </svg>
            <p class="text-xs font-semibold text-center">Home</p>
        </a>
    </section>

    <!-- home -->

    <!-- footer -->

    <div class="text-center bg-blue-800">
        <span class="text-sm text-white sm:text-center">© 2024 <a href="https://flowbite.com/" class="hover:underline">Kelompok 4</a>. All Rights Reserved. </span>
    </div>
    <!-- end footer -->






    <!-- flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- js -->
    <script type="text/javascript" src="../src/js/pushLocal.js"></script>
    <script src="../src/js/script.js"></script>
    <script src="../src/js/harga.js"></script>
    <script src="../src/js/roomAvailableLocal.js"></script>
    <script src="../src/js/countItem.js"></script>


</body>

</html>