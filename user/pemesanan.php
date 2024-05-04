<?php

require 'function/koneksi.php';

if(!isset($_POST['checkin']) && !isset($_POST['checkout']) && !isset($_POST['jmlh'])){
    header('location: ../index.php?error=true');
}


    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $jmlh = $_POST['jmlh'];

    
    // pengecekan checkin dan checkout
    if($checkin > $checkout){
        header('location: ../index.php?error=true');
    }


?>


<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pemesanan Kamar Nuansa Nusantara</title>

    <!-- tailwind -->
    <link href="./src/output.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- mycss -->
    <link rel="stylesheet" href="src/style.css" />

    <!-- icons -->
    <script src="https://kit.fontawesome.com/22f19496c5.js" crossorigin="anonymous"></script>
  </head>
  <body class="overflow-x-hidden bg-slate-100">
   
  <!-- navbar --> 
<section>
<nav class="bg-blue-800 border-gray-200 dark:bg-gray-900">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
    <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
        <span class="self-center text-2xl font-bold whitespace-nowrap text-yellow-400">Nuansa Nusantara</span>
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
      <li>
      <div class="flex lg:order-2 space-x-3 lg:space-x-0 rtl:space-x-reverse">
    

    <a type="submit" class="text-white bg-yellow-400 hover:bg-yellow-600 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-4 py-1 text-center">
        <i class="fa-solid fa-basket-shopping text-lg rounded-full px-4 text-white "></i>
    </a>



          <button


            data-collapse-toggle="navbar-sticky"
            type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-200 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-sticky"
            aria-expanded="false"
          >

            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
        </div>
      </li>
      <li>
      <div class="flex lg:order-2 space-x-3 lg:space-x-0 rtl:space-x-reverse">
          <button
            data-collapse-toggle="navbar-sticky"
            type="button"
            class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-200 rounded-lg lg:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200"
            aria-controls="navbar-sticky"
            aria-expanded="false"
          >
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
            </svg>
          </button>
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
<div class="container mx-auto px-28 p-4">
    <div class="flex flex-row items-center">
        <div class="flex-1">
            <label class="font-semibold text-base lg:text-base"  for="checkin">checkin</label> <br />
            <input type="checkin" class="w-[90%] border border-gray-400 p-2 rounded-lg mr-4" value="<?= date("l, d-m-Y", strtotime($checkin)) ?>">
        </div>
        <div class="flex-1">
            <label class="font-semibold text-base lg:text-base" for="checkout">checkout</label> <br />
            <input type="checkout" class="w-[90%] border border-gray-400 p-2 rounded-lg mr-4" value="<?= date("l, d-m-Y", strtotime($checkout))?>">
        </div>
        <div class="flex-1">
        <label class="font-semibold text-base lg:text-base" for="jumlah tamu">Jumlah Tamu</label> <br />
        <input type="number" class="w-[90%] border border-gray-400 p-2 rounded-lg mr-4" value="<?= $jmlh ?>">
        </div>
    </div>
</div>
</section>

<!-- Superior double room -->
<section>
<div class="container mx-auto px-28">
<h1 class="text-2xl font-bold mb-2 lg:text-2xl">Superior Double Bed</h1><hr class="mb-2">
    <div class="flex flex-row ">
        <div class="basis-1/4">
            <div class=" pb-52 mb-5 max-w-60 bg-white border border-gray-300 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg w-full" style="max-width: 500px;" src="../assets/images/sdb1.jpeg" alt="" />
                </a>
                <div class="p-4">
                <i class="fa-solid fa-user text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Untuk 2 Orang</span> <br>
                <i class="fa-solid fa-door-open text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> 27sqm</span> <br>
                <a data-modal-target="Superior" data-modal-toggle="Superior" href="#" class="font-medium text-blue-600 dark:text-blue-800 hover:underline">Read more</a>
                </div>
            </div>
        </div>

      <div class="flex-1 ">

        <div class="mb-5 max-w-full p-6 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
          <div class="flex justify-between items-center">
             <div>
              <a href="#">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Room Only</h5>
              </a>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dikembalikan</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tanpa Sarapan</span> <br><br>

              <span class="text-xl lg:text-xl font-medium">Pembayaran</span><br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Sekarang</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Nanti</span> <br>
        </div>
            <div class="text-right"> 
                <span class="text-sm lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                <span class="text-2xl lg:text-2xl font-semibold"> RP.520.000</span> <br>
                <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>
                
                <button data-modal-target="superior1" data-modal-toggle="superior1" class="mt-10 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Pilih Kamar
                </button>
            </div>    

            <?php include "modal/superior1.php"; ?>
            
         </div>
     </div>

            <div class="mb-5 max-w-full p-6 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
                    <div class="flex justify-between items-center">
                        <div>
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Room Breakfast</h5>
                        </a>
                        <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dikembalikan</span> 
                        <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
                        <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Termasuk Sarapan</span> <br><br>

                        <span class="text-xl lg:text-xl font-medium">Pembayaran</span><br>
                        <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Sekarang</span> 
                        <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Nanti</span> <br>
                    </div>
                        <div class="text-right"> 
                            <span class="text-sm lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                            <span class="text-2xl lg:text-2xl font-semibold"> RP.670.000</span> <br>
                            <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>
                            
                            <button data-modal-target="superior2" data-modal-toggle="superior2" class="mt-10 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Pilih Kamar
                            </button>

                        </div>

                        <?php include "modal/superior2.php"; ?>
                </div>
            </div>

        </div>
    </div>
</div>

</section>
<!-- akhir Superior double -->

<!-- Superior Twin room -->
<section>
<div class="container mx-auto px-28">
<h1 class="text-2xl font-bold mb-2 lg:text-2xl">Superior Twin Bed</h1><hr class="mb-2">
    <div class="flex flex-row ">
        <div class="basis-1/4">
            <div class=" pb-52 mb-5 max-w-60 bg-white border border-gray-300 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg w-full" style="max-width: 500px;" src="../assets/images/stb1.jpeg" alt="" />
                </a>
                <div class="p-4">
                <i class="fa-solid fa-user text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Untuk 2 Orang</span> <br>
                <i class="fa-solid fa-door-open text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> 27sqm</span> <br>
                <a data-modal-target="superiortwin" data-modal-toggle="superiortwin" href="#" class="font-medium text-blue-600 dark:text-blue-800 hover:underline">Read more</a>
                </div>
            </div>
        </div>

      <div class="flex-1 ">

        <div class="mb-5 max-w-full p-6 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
          <div class="flex justify-between items-center">
             <div>
              <a href="#">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Room Only</h5>
              </a>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dikembalikan</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tanpa Sarapan</span> <br><br>

              <span class="text-xl lg:text-xl font-medium">Pembayaran</span><br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Sekarang</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Nanti</span> <br>
        </div>
            <div class="text-right"> 
                <span class="text-sm lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                <span class="text-2xl lg:text-2xl font-semibold"> RP.520.000</span> <br>
                <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>
                
                <button data-modal-target="superior3" data-modal-toggle="superior3" class="mt-10 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Pilih Kamar
                </button>
            </div>

            <?php include "modal/superior3.php"; ?>
    </div>
</div>

<div class="mb-5 max-w-full p-6 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
          <div class="flex justify-between items-center">
             <div>
              <a href="#">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Room Breakfast</h5>
              </a>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dikembalikan</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Termasuk Sarapan</span> <br><br>

              <span class="text-xl lg:text-xl font-medium">Pembayaran</span><br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Sekarang</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Nanti</span> <br>
        </div>
            <div class="text-right"> 
                <span class="text-sm lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                <span class="text-2xl lg:text-2xl font-semibold"> RP.670.000</span> <br>
                <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>
                
                <button data-modal-target="superior4" data-modal-toggle="superior4" class="mt-10 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Pilih Kamar
                </button>
            </div>

            <?php include "modal/superior4.php"; ?>
    </div>
</div>
        </div>
    </div>
</div>

</section>
<!-- akhir Superior Twin -->

<!-- deluxe double room -->
<section>
<div class="container mx-auto px-28">
<h1 class="text-2xl font-bold mb-2 lg:text-2xl">Deluxe Double Bed</h1><hr class="mb-2">
    <div class="flex flex-row ">
        <div class="basis-1/4">
            <div class=" pb-52 mb-5 max-w-60 bg-white border border-gray-300 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg w-full" style="max-width: 500px;" src="../assets/images/ddb1.jpeg" alt="" />
                </a>
                <div class="p-4">
                <i class="fa-solid fa-user text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Untuk 2 Orang</span> <br>
                <i class="fa-solid fa-door-open text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> 30sqm</span> <br>
                <a data-modal-target="deluxe" data-modal-toggle="deluxe" href="#" class="font-medium text-blue-600 dark:text-blue-800 hover:underline">Read more</a>
                </div>
            </div>
        </div>

      <div class="flex-1 ">

        <div class="mb-5 max-w-full p-6 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
          <div class="flex justify-between items-center">
             <div>
              <a href="#">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Room Only</h5>
              </a>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dikembalikan</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tanpa Sarapan</span> <br><br>

              <span class="text-xl lg:text-xl font-medium">Pembayaran</span><br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Sekarang</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Nanti</span> <br>
        </div>
            <div class="text-right"> 
                <span class="text-sm lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                <span class="text-2xl lg:text-2xl font-semibold"> RP.650.000</span> <br>
                <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>
                
                <button data-modal-target="deluxe1" data-modal-toggle="deluxe1" class="mt-10 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Pilih Kamar
                </button>
            </div>

            <?php include "modal/deluxe1.php"; ?>
    </div>
</div>

<div class="mb-5 max-w-full p-6 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
          <div class="flex justify-between items-center">
             <div>
              <a href="#">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Room Breakfast</h5>
              </a>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dikembalikan</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Termasuk Sarapan</span> <br><br>

              <span class="text-xl lg:text-xl font-medium">Pembayaran</span><br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Sekarang</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Nanti</span> <br>
        </div>
            <div class="text-right"> 
                <span class="text-sm lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                <span class="text-2xl lg:text-2xl font-semibold"> RP.800.000</span> <br>
                <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>
                
                <button data-modal-target="deluxe2" data-modal-toggle="deluxe2" class="mt-10 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Pilih Kamar
                </button>
            </div>

            <?php include "modal/deluxe2.php"; ?>
    </div>
</div>

        </div>
    </div>
</div>

</section>
<!-- akhir double deluxe -->

<!-- deluxe Twin room -->
<section>
<div class="container mx-auto px-28">
<h1 class="text-2xl font-bold mb-2 lg:text-2xl">Deluxe Twin Bed</h1><hr class="mb-2">
    <div class="flex flex-row ">
        <div class="basis-1/4">
            <div class=" pb-52 mb-5 max-w-60 bg-white border border-gray-300 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg w-full" style="max-width: 500px;" src="../assets/images/dtb2.jpeg" alt="" />
                </a>
                <div class="p-4">
                <i class="fa-solid fa-user text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Untuk 2 Orang</span> <br>
                <i class="fa-solid fa-door-open text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> 30sqm</span> <br>
                <a data-modal-target="deluxetwin" data-modal-toggle="deluxetwin" href="#" class="font-medium text-blue-600 dark:text-blue-800 hover:underline">Read more</a>
                </div>
            </div>
        </div>

      <div class="flex-1 ">

        <div class="mb-5 max-w-full p-6 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
          <div class="flex justify-between items-center">
             <div>
              <a href="#">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Room Only</h5>
              </a>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dikembalikan</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tanpa Sarapan</span> <br><br>

              <span class="text-xl lg:text-xl font-medium">Pembayaran</span><br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Sekarang</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Nanti</span> <br>
        </div>
            <div class="text-right"> 
                <span class="text-sm lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                <span class="text-2xl lg:text-2xl font-semibold"> RP.650.000</span> <br>
                <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>
                
                <button data-modal-target="deluxe3" data-modal-toggle="deluxe3" class="mt-10 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Pilih Kamar
                </button>
            </div>

            <?php include "modal/deluxe3.php"; ?>
    </div>
</div>

<div class="mb-5 max-w-full p-6 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
          <div class="flex justify-between items-center">
             <div>
              <a href="#">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Room Breakfast</h5>
              </a>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dikembalikan</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Termasuk Sarapan</span> <br><br>

              <span class="text-xl lg:text-xl font-medium">Pembayaran</span><br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Sekarang</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Nanti</span> <br>
        </div>
            <div class="text-right"> 
                <span class="text-sm lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                <span class="text-2xl lg:text-2xl font-semibold"> RP.800.000</span> <br>
                <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>
                
                <button data-modal-target="deluxe4" data-modal-toggle="deluxe4" class="mt-10 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Pilih Kamar
                </button>
            </div>

            <?php include "modal/deluxe4.php"; ?>
    </div>
</div>

        </div>
    </div>
</div>

</section>
<!-- akhir Twin deluxe -->

<!-- family -->
<section>
<div class="container mx-auto px-28">
<h1 class="text-2xl font-bold mb-2 lg:text-2xl">Family Room</h1><hr class="mb-2">
    <div class="flex flex-row ">
        <div class="basis-1/4">
            <div class=" pb-52 mb-5 max-w-60 bg-white border border-gray-300 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg w-full" style="max-width: 500px;" src="../assets/images/family2.png" alt="" />
                </a>
                <div class="p-4">
                <i class="fa-solid fa-user text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Untuk 3 Orang</span> <br>
                <i class="fa-solid fa-door-open text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> 34sqm</span> <br>
                <a data-modal-target="family" data-modal-toggle="family" href="#" class="font-medium text-blue-600 dark:text-blue-800 hover:underline">Read more</a>
                </div>
            </div>
        </div>

      <div class="flex-1 ">

        <div class="mb-5 max-w-full p-6 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
          <div class="flex justify-between items-center">
             <div>
              <a href="#">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Room Only</h5>
              </a>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dikembalikan</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tanpa Sarapan</span> <br><br>

              <span class="text-xl lg:text-xl font-medium">Pembayaran</span><br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Sekarang</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Nanti</span> <br>
        </div>
            <div class="text-right"> 
                <span class="text-sm lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                <span class="text-2xl lg:text-2xl font-semibold"> RP.1.000.000</span> <br>
                <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>
                
                <button data-modal-target="family1" data-modal-toggle="family1" class="mt-10 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Pilih Kamar
                </button>
            </div>

            <?php include "modal/family1.php"; ?>
    </div>
</div>

<div class="mb-5 max-w-full p-6 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
          <div class="flex justify-between items-center">
             <div>
              <a href="#">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Room Breakfast</h5>
              </a>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dikembalikan</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Termasuk Sarapan</span> <br><br>

              <span class="text-xl lg:text-xl font-medium">Pembayaran</span><br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Sekarang</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Nanti</span> <br>
        </div>
            <div class="text-right"> 
                <span class="text-sm lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                <span class="text-2xl lg:text-2xl font-semibold"> RP.1.150.000</span> <br>
                <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>
                
                <button data-modal-target="family2" data-modal-toggle="family2" class="mt-10 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Pilih Kamar
                </button>
            </div>

            <?php include "modal/family2.php"; ?>
    </div>
</div>
        </div>
    </div>
</div>

</section>
<!-- akhir family -->

<!-- tematik -->
<section>
<div class="container mx-auto px-28 mb-4">
<h1 class="text-2xl font-bold mb-2 lg:text-2xl">Tematik Room</h1><hr class="mb-2">
    <div class="flex flex-row ">
        <div class="basis-1/4">
            <div class=" pb-52 mb-2 max-w-60 bg-white border border-gray-300 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                <a href="#">
                    <img class="rounded-t-lg w-full" style="max-width: 500px;" src="../assets/images/tematik1.jpg" alt="" />
                </a>
                <div class="p-4">
                <i class="fa-solid fa-user text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Untuk 2 Orang</span> <br>
                <i class="fa-solid fa-door-open text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> 34sqm</span> <br>
                <a data-modal-target="tematik" data-modal-toggle="tematik" href="#" class="font-medium text-blue-600 dark:text-blue-800 hover:underline">Read more</a>
                </div>
            </div>
        </div>

      <div class="flex-1 ">

        <div class="mb-5 max-w-full p-6 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
          <div class="flex justify-between items-center">
             <div>
              <a href="#">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Room Only</h5>
              </a>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dikembalikan</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tanpa Sarapan</span> <br><br>

              <span class="text-xl lg:text-xl font-medium">Pembayaran</span><br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Sekarang</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Nanti</span> <br>
        </div>
            <div class="text-right"> 
                <span class="text-sm lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                <span class="text-2xl lg:text-2xl font-semibold"> RP.1.000.000</span> <br>
                <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>
                
                <button data-modal-target="tematik1" data-modal-toggle="tematik1" class="mt-10 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Pilih Kamar
                </button>
            </div>

            <?php include "modal/tematik1.php"; ?>
    </div>
</div>

<div class="mb-2 max-w-full p-6 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col justify-between">
          <div class="flex justify-between items-center">
             <div>
              <a href="#">
                  <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Room Breakfast</h5>
              </a>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dikembalikan</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Tidak Dapat Dijadwal Ulang</span> <br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Termasuk Sarapan</span> <br><br>

              <span class="text-xl lg:text-xl font-medium">Pembayaran</span><br>
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Sekarang</span> 
              <i class="fa-solid fa-check text-gray-800 text-lg lg:text-lg"></i><span class="text-base lg:text-base"> Bayar Nanti</span> <br>
        </div>
            <div class="text-right"> 
                <span class="text-sm lg:text-sm"> *Harga Untuk Satu Malam</span> <br>
                <span class="text-2xl lg:text-2xl font-semibold"> RP.1.150.000</span> <br>
                <span class="text-xs lg:text-xs"> sudah termasuk pajak</span><br>
                
                <button data-modal-target="tematik2" data-modal-toggle="tematik2" class="mt-10 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  Pilih Kamar
                </button>
            </div>

            <?php include "modal/tematik2.php"; ?>
    </div>
</div>
        </div>
    </div>
</div>

</section>
<!-- akhir tematik -->

     <!-- home -->
<section class="home bg-yellow-400 w-fit p-3 rounded-2xl fixed bottom-5 right-5 opacity-30 hover:opacity-100 z-50">
  <a href="../index.php">
    <svg role="img" viewBox="0 0 24 24" width="30px" height="20px" class="m-auto" xmlns="http://www.w3.org/2000/svg">
      <title>Google Home</title>
      <path
        d="M12 0a1.44 1.44 0 0 0-.947.399L.547 10.762a1.26 1.26 0 0 0-.342.808v11.138c0 .768.53 1.292 1.311 1.292h20.968c.78 0 1.311-.522 1.311-1.292V11.57a1.25 1.25 0 0 0-.34-.804L15.68 3.097h-.001L12.947.4A1.454 1.454 0 0 0 12 0Zm0 6.727 6.552 6.456v5.65H5.446v-5.65z"
      />
    </svg>
    <p class="text-center text-xs font-semibold">Home</p>
  </a>
</section>

    <!-- home -->

    <!-- footer -->

      <div class="text-center bg-blue-800">
        <span class="text-sm text-white sm:text-center">© 2024 <a href="https://flowbite.com/" class="hover:underline">Kelompok 4</a>. All Rights Reserved. </span>
      </div>
    <!-- end footer -->



<!-- modal deluxe doubel -->
<div id="deluxe" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-2 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-2 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Deluxe Double Bed
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="deluxe">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <!-- Modal body -->
            <div class=" pb-4 relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-hidden flex md:flex-row flex-col">
                <img class="p-2 pl-5 object-cover w-full md:w-96 h-96 md:h-auto rounded-full md:rounded-lg md:rounded-l-lg" src="../assets/images/deluxe2.jpeg" alt="">
                <div class="flex flex-col justify-between md:w-1/2">
                    <h6 class="text-medium font-semibold tracking-tight text-gray-900 dark:text-white">Deskripsi Ruangan</h6>
                    <p class="text-lg lg:text-base">Kamar Deluxe menyeimbangkan keterjangkauan dengan kenyamanan dan gaya, menjadikannya pilihan terbaik. Nikmati tempat tidur ganda yang nyaman atau nyalakan televisi layar datar 32 inci untuk hiburan. Fasilitas lainnya termasuk meja kerja, akses Internet gratis, kursi santai, mini bar, dan masih banyak lagi. Ruangan ini juga dilengkapi dengan lantai berkarpet.</p>
                    <h6 class="mt-2 text-medium font-semibold tracking-tight text-gray-900 dark:text-white">Fasilitas Kamar</h6>
        
                    <div class="flex flex-row">
                        <div class="basis-1/2">
                            <i class="fa-solid fa-wind text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Air Conditioning</span><br>
                            <i class="fa-solid fa-soap text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Body Soap</span><br>
                            <i class="fa-solid fa-hotjar text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Hot & Cold Shower</span><br>
                            <i class="fa-solid fa-tv text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-base lg:text-base">LCD Flat Panel TV</span><br>
                            <i class="fa-solid fa-jug-detergent text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Shampoo</span><br>
                            <i class="fa-solid fa-shoe-prints text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-base lg:text-base">Slippers</span><br>
                            <i class="fa-solid fa-vault text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Socket for Shaver</span><br>
                        </div>
                        <div class="basis-1/2">
                            <i class="fa-solid fa-mattress-pillow text-gray-800 text-xs lg:text-sm"></i><span class="ml-2 text-base lg:text-base">Bath Towel</span><br>
                            <i class="fa-solid fa-plug text-gray-800 text-xl lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Cable TV</span><br>
                            <i class="fa-solid fa-phone text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">IDD Telephone</span><br>
                            <i class="fa-solid fa-ban-smoking text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Non-Smoking</span><br>
                            <i class="fa-solid fa-shower text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Shower</span><br>
                            <i class="fa-solid fa-pump-soap text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Soap</span><br>
                            <i class="fa-solid fa-tooth text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Toothbrush and/or Toot...</span><br>
                        </div>
                    </div>
        
                </div>
            </div>

        </div>
    </div>
</div>

<!-- akhir modal deluxe double -->

<!-- modal deluxe twin -->
<div id="deluxetwin" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-2 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Deluxe Twin Bed
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="deluxetwin">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
             <!-- Modal body -->
             <div class=" pb-4 relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-hidden flex md:flex-row flex-col">
                <img class="p-2 pl-5 object-cover w-full md:w-96 h-96 md:h-auto rounded-full md:rounded-lg md:rounded-l-lg" src="../assets/images/dtb3.jpeg" alt="">
                <div class="flex flex-col justify-between md:w-1/2">
                    <h6 class="text-medium font-semibold tracking-tight text-gray-900 dark:text-white">Deskripsi Ruangan</h6>
                    <p class="text-lg lg:text-base">Kamar Deluxe menyeimbangkan keterjangkauan dengan kenyamanan dan gaya, menjadikannya pilihan terbaik. Nikmati tempat tidur ganda yang nyaman atau nyalakan televisi layar datar 32 inci untuk hiburan. Fasilitas lainnya termasuk meja kerja, akses Internet gratis, kursi santai, mini bar, dan masih banyak lagi. Ruangan ini juga dilengkapi dengan lantai berkarpet.</p>
                    <h6 class="mt-2 text-medium font-semibold tracking-tight text-gray-900 dark:text-white">Fasilitas Kamar</h6>
        
                    <div class="flex flex-row">
                        <div class="basis-1/2">
                            <i class="fa-solid fa-wind text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Air Conditioning</span><br>
                            <i class="fa-solid fa-soap text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Body Soap</span><br>
                            <i class="fa-solid fa-hotjar text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Hot & Cold Shower</span><br>
                            <i class="fa-solid fa-tv text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-base lg:text-base">LCD Flat Panel TV</span><br>
                            <i class="fa-solid fa-jug-detergent text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Shampoo</span><br>
                            <i class="fa-solid fa-shoe-prints text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-base lg:text-base">Slippers</span><br>
                            <i class="fa-solid fa-vault text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Socket for Shaver</span><br>
                        </div>
                        <div class="basis-1/2">
                            <i class="fa-solid fa-mattress-pillow text-gray-800 text-xs lg:text-sm"></i><span class="ml-2 text-base lg:text-base">Bath Towel</span><br>
                            <i class="fa-solid fa-plug text-gray-800 text-xl lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Cable TV</span><br>
                            <i class="fa-solid fa-phone text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">IDD Telephone</span><br>
                            <i class="fa-solid fa-ban-smoking text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Non-Smoking</span><br>
                            <i class="fa-solid fa-shower text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Shower</span><br>
                            <i class="fa-solid fa-pump-soap text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Soap</span><br>
                            <i class="fa-solid fa-tooth text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Toothbrush and/or Toot...</span><br>
                        </div>
                    </div>
        
                </div>
            </div>

        </div>
    </div>
</div>
<!-- akhir modal deluxe twin -->

<!-- modal Superior double -->
<div id="Superior" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-2 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Superior Double Bed
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="Superior">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class=" pb-4 relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-hidden flex md:flex-row flex-col">
                <img class="p-2 pl-5 object-cover w-full md:w-96 h-96 md:h-auto rounded-full md:rounded-lg md:rounded-l-lg" src="../assets/images/sdb1.jpeg" alt="">
                <div class="flex flex-col justify-between md:w-1/2">
                    <h6 class="text-medium font-semibold tracking-tight text-gray-900 dark:text-white">Deskripsi Ruangan</h6>
                    <p class="text-lg lg:text-base">Kamar Superior menyeimbangkan keterjangkauan dengan kenyamanan dan gaya, menjadikannya pilihan terbaik. Nikmati tempat tidur ganda yang nyaman atau nyalakan televisi layar datar 32 inci untuk hiburan. Fasilitas lainnya termasuk meja kerja, akses Internet gratis, kursi santai, mini bar, dan masih banyak lagi.</p>
                    <h6 class="mt-2 text-medium font-semibold tracking-tight text-gray-900 dark:text-white">Fasilitas Kamar</h6>
        
                    <div class="flex flex-row">
                        <div class="basis-1/2">
                            <i class="fa-solid fa-wind text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Air Conditioning</span><br>
                            <i class="fa-solid fa-soap text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Body Soap</span><br>
                            <i class="fa-solid fa-hotjar text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Hot & Cold Shower</span><br>
                            <i class="fa-solid fa-tv text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-base lg:text-base">LCD Flat Panel TV</span><br>
                            <i class="fa-solid fa-jug-detergent text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Shampoo</span><br>
                            <i class="fa-solid fa-shoe-prints text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-base lg:text-base">Slippers</span><br>
                            <i class="fa-solid fa-mug-saucer text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">coffe maker</span><br>
                        </div>
                        <div class="basis-1/2">
                            <i class="fa-solid fa-mattress-pillow text-gray-800 text-xs lg:text-sm"></i><span class="ml-2 text-base lg:text-base">Bath Towel</span><br>
                            <i class="fa-solid fa-plug text-gray-800 text-xl lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Cable TV</span><br>
                            <i class="fa-solid fa-phone text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">IDD Telephone</span><br>
                            <i class="fa-solid fa-ban-smoking text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Non-Smoking</span><br>
                            <i class="fa-solid fa-shower text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Shower</span><br>
                            <i class="fa-solid fa-pump-soap text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Soap</span><br>
                            <i class="fa-solid fa-tooth text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Toothbrush and/or Toot...</span><br>
                        </div>
                    </div>
        
                </div>
            </div>

        </div>
    </div>
</div>
<!-- akhir modal superior double-->

<!-- modal Superior twin -->
<div id="superiortwin" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-2 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Superior Twin Bed
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="superiortwin">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class=" pb-4 relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-hidden flex md:flex-row flex-col">
                <img class="p-2 pl-5 object-cover w-full md:w-96 h-96 md:h-auto rounded-full md:rounded-lg md:rounded-l-lg" src="../assets/images/stb2.jpeg" alt="">
                <div class="flex flex-col justify-between md:w-1/2">
                    <h6 class="text-medium font-semibold tracking-tight text-gray-900 dark:text-white">Deskripsi Ruangan</h6>
                    <p class="text-lg lg:text-base">Kamar Superior menyeimbangkan keterjangkauan dengan kenyamanan dan gaya, menjadikannya pilihan terbaik. Nikmati tempat tidur ganda yang nyaman atau nyalakan televisi layar datar 32 inci untuk hiburan. Fasilitas lainnya termasuk meja kerja, akses Internet gratis, kursi santai, mini bar, dan masih banyak lagi.</p>
                    <h6 class="mt-2 text-medium font-semibold tracking-tight text-gray-900 dark:text-white">Fasilitas Kamar</h6>
        
                    <div class="flex flex-row">
                        <div class="basis-1/2">
                            <i class="fa-solid fa-wind text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Air Conditioning</span><br>
                            <i class="fa-solid fa-soap text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Body Soap</span><br>
                            <i class="fa-solid fa-hotjar text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Hot & Cold Shower</span><br>
                            <i class="fa-solid fa-tv text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-base lg:text-base">LCD Flat Panel TV</span><br>
                            <i class="fa-solid fa-jug-detergent text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Shampoo</span><br>
                            <i class="fa-solid fa-shoe-prints text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-base lg:text-base">Slippers</span><br>
                            <i class="fa-solid fa-mug-saucer text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">coffe maker</span><br>
                        </div>
                        <div class="basis-1/2">
                            <i class="fa-solid fa-mattress-pillow text-gray-800 text-xs lg:text-sm"></i><span class="ml-2 text-base lg:text-base">Bath Towel</span><br>
                            <i class="fa-solid fa-plug text-gray-800 text-xl lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Cable TV</span><br>
                            <i class="fa-solid fa-phone text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">IDD Telephone</span><br>
                            <i class="fa-solid fa-ban-smoking text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Non-Smoking</span><br>
                            <i class="fa-solid fa-shower text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Shower</span><br>
                            <i class="fa-solid fa-pump-soap text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Soap</span><br>
                            <i class="fa-solid fa-tooth text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Toothbrush and/or Toot...</span><br>
                        </div>
                    </div>
        
                </div>
            </div>

        </div>
    </div>
</div>
<!-- akhir modal superior twin-->

<!-- modal family-->
<div id="family" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-2 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Family Room
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="family">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class=" pb-4 relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-hidden flex md:flex-row flex-col">
                <img class="p-2 pl-5 object-cover w-full md:w-96 h-96 md:h-auto rounded-full md:rounded-lg md:rounded-l-lg" src="../assets/images/family3.jpeg" alt="">
                <div class="flex flex-col justify-between md:w-1/2">
                    <h6 class="text-medium font-semibold tracking-tight text-gray-900 dark:text-white">Deskripsi Ruangan</h6>
                    <p class="text-lg lg:text-base">Kamar Deluxe menyeimbangkan keterjangkauan dengan kenyamanan dan gaya, menjadikannya pilihan terbaik. Nikmati tempat tidur ganda yang nyaman atau nyalakan televisi layar datar 32 inci untuk hiburan. Fasilitas lainnya termasuk meja kerja, akses Internet gratis, kursi santai, mini bar, dan masih banyak lagi. Ruangan ini juga dilengkapi dengan lantai berkarpet.</p>
                    <h6 class="mt-2 text-medium font-semibold tracking-tight text-gray-900 dark:text-white">Fasilitas Kamar</h6>
        
                    <div class="flex flex-row">
                        <div class="basis-1/2">
                            <i class="fa-solid fa-wind text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Air Conditioning</span><br>
                            <i class="fa-solid fa-soap text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Body Soap</span><br>
                            <i class="fa-solid fa-hotjar text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Hot & Cold Shower</span><br>
                            <i class="fa-solid fa-mug-hot text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Coffee Maker</span><br>
                            <i class="fa-solid fa-cotton-bureau text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Cotton Swab</span><br>
                            <i class="fa-solid fa-tv text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-base lg:text-base">LCD Flat Panel TV</span><br>
                            <i class="fa-solid fa-vault text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Safe Deposit Box</span><br>
                            <i class="fa-solid fa-jug-detergent text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Shampoo</span><br>
                            <i class="fa-solid fa-shoe-prints text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-base lg:text-base">Slippers</span><br>

                        </div>
                        <div class="basis-1/2">
                            <i class="fa-solid fa-mattress-pillow text-gray-800 text-xs lg:text-sm"></i><span class="ml-2 text-base lg:text-base">Bath Towel</span><br>
                            <i class="fa-solid fa-plug text-gray-800 text-xl lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Cable TV</span><br>
                            <i class="fa-solid fa-phone text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">IDD Telephone</span><br>
                            <i class="fa-solid fa-ban-smoking text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Non-Smoking</span><br>
                            <i class="fa-solid fa-shower text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Shower</span><br>
                            <i class="fa-solid fa-pump-soap text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Soap</span><br>
                            <i class="fa-solid fa-bottle-water text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Complimentary Bottled</span><br>
                            <i class="fa-solid fa-bars text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Mini Bar</span><br>
                            <i class="fa-solid fa-tooth text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Toothbrush and/or Toot...</span><br>
                        </div>
                    </div>
        
                </div>
            </div>

        </div>
    </div>
</div>
<!-- akhir modal family-->

<!-- modal tematik-->
<div id="tematik" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-4xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-2 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                    Tematik Room
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="tematik">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class=" pb-4 relative bg-white rounded-lg shadow dark:bg-gray-700 overflow-hidden flex md:flex-row flex-col">
                <img class="p-2 pl-5 object-cover w-full md:w-96 h-96 md:h-auto rounded-full md:rounded-lg md:rounded-l-lg" src="../assets/images/family3.jpeg" alt="">
                <div class="flex flex-col justify-between md:w-1/2">
                    <h6 class="text-medium font-semibold tracking-tight text-gray-900 dark:text-white">Deskripsi Ruangan</h6>
                    <p class="text-lg lg:text-base">Kamar Deluxe menyeimbangkan keterjangkauan dengan kenyamanan dan gaya, menjadikannya pilihan terbaik. Nikmati tempat tidur ganda yang nyaman atau nyalakan televisi layar datar 32 inci untuk hiburan. Fasilitas lainnya termasuk meja kerja, akses Internet gratis, kursi santai, mini bar, dan masih banyak lagi. Ruangan ini juga dilengkapi dengan lantai berkarpet.</p>
                    <h6 class="mt-2 text-medium font-semibold tracking-tight text-gray-900 dark:text-white">Fasilitas Kamar</h6>
        
                    <div class="flex flex-row">
                        <div class="basis-1/2">
                            <i class="fa-solid fa-wind text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Air Conditioning</span><br>
                            <i class="fa-solid fa-soap text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Body Soap</span><br>
                            <i class="fa-solid fa-hotjar text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Hot & Cold Shower</span><br>
                            <i class="fa-solid fa-mug-hot text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Coffee Maker</span><br>
                            <i class="fa-solid fa-cotton-bureau text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Cotton Swab</span><br>
                            <i class="fa-solid fa-tv text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-base lg:text-base">LCD Flat Panel TV</span><br>
                            <i class="fa-solid fa-vault text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Safe Deposit Box</span><br>
                            <i class="fa-solid fa-jug-detergent text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Shampoo</span><br>
                            <i class="fa-solid fa-shoe-prints text-gray-800 text-sm lg:text-sm"></i><span class="ml-2 text-base lg:text-base">Slippers</span><br>

                        </div>
                        <div class="basis-1/2">
                            <i class="fa-solid fa-mattress-pillow text-gray-800 text-xs lg:text-sm"></i><span class="ml-2 text-base lg:text-base">Bath Towel</span><br>
                            <i class="fa-solid fa-plug text-gray-800 text-xl lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Cable TV</span><br>
                            <i class="fa-solid fa-phone text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">IDD Telephone</span><br>
                            <i class="fa-solid fa-ban-smoking text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Non-Smoking</span><br>
                            <i class="fa-solid fa-shower text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Shower</span><br>
                            <i class="fa-solid fa-pump-soap text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Soap</span><br>
                            <i class="fa-solid fa-bottle-water text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Complimentary Bottled</span><br>
                            <i class="fa-solid fa-bars text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base"> Mini Bar</span><br>
                            <i class="fa-solid fa-tooth text-gray-800 text-lg lg:text-lg"></i><span class="ml-2 text-base lg:text-base">Toothbrush and/or Toot...</span><br>
                        </div>
                    </div>
        
                </div>
            </div>

        </div>
    </div>
</div>
<!-- akhir modal tematik-->


    <!-- flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- js -->
    <script src="src/js/script.js"></script>

    <script>
    // Saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil semua formulir
        var forms = document.querySelectorAll('form');

        // Loop melalui setiap formulir
        forms.forEach(function(form) {
            // Saat formulir disubmit
            form.addEventListener('submit', function(event) {
                // Ambil data dari formulir
                var formData = new FormData(form);

                // Data yang akan disimpan dalam local storage
                var data = JSON.parse(localStorage.getItem('keranjang_' + form.id)) || [];
                var currentData = {};
                formData.forEach(function(value, key){
                    currentData[key] = value;
                });

                // Tambahkan data formulir saat ini ke dalam array data
                data.push(currentData);

                // Simpan data ke dalam local storage
                localStorage.setItem('keranjang_' + form.id, JSON.stringify(data));

                // Beri tahu pengguna bahwa data telah ditambahkan ke keranjang
                alert('Data berhasil ditambahkan ke keranjang');

                // Berhenti dari mengirimkan formulir
                event.preventDefault();
            });
        });
    });
</script>

  </body>
</html>
