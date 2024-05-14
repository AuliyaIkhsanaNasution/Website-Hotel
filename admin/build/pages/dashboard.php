<?php 
require "function/koneksi.php";
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/logo.png" />
  <title>Dashboard Nuansa Nusantara</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Popper -->
  <script src="https://unpkg.com/@popperjs/core@2"></script>
  <!-- Main Styling -->
  <link href="../assets/css/argon-dashboard-tailwind.css?v=1.0.1" rel="stylesheet" />
  <!-- tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-100 text-slate-500">
  <div class="absolute w-full bg-blue-700 min-h-75 "></div>
  <!-- sidenav  -->
  <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl  max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="h-19">
      <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
      <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="dashboard.php" target="_blank">
        <img src="../assets/img/logo.png" class="inline h-full max-w-full transition-all duration-200  ease-nav-brand max-h-8 rounded-full" alt="main_logo" />
        <img src="" class="hidden h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8 " alt="main_logo" />
        <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Nuansa Nusantara</span>
      </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent " />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
      <ul class="flex flex-col pl-0 mb-0">
        <li class="mt-0.5 w-full">
          <a class="py-2.7 bg-blue-500/13  text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="dashboard.php">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="  py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="datacustomer.php">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Customer</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="  py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="datapegawai.php">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Pegawai</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="  py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="datakamar.php">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Kamar</span>
          </a>
        </li>

        <li class="mt-0.5 w-full">
          <a class="  py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="datatipekamar.php">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center fill-current stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-emerald-500 ni ni-credit-card"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Tipe Kamar</span>
          </a>
        </li>


        <li class="mt-0.5 w-full">
          <a class="  py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="datapemesanan.php">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Transaksi Pemesanan</span>
          </a>
        </li>


      </ul>
    </div>

    <div class="mx-4 ">
      <!-- load phantom colors for card after: -->
      <!-- <p class="invisible hidden text-gray-800 text-red-500 text-red-600 text-blue-500 blue-700 after:to-cyan-500 after:from-orange-500 after:to-yellow-500 after:from-green-600 after:to-lime-400 after:from-red-600 after:to-orange-600 after:from-slate-600 after:to-slate-300 text-emerald-500 text-cyan-500 text-slate-400"></p> -->
      <div class="relative flex flex-col min-w-0 break-words bg-transparent border-0 shadow-none rounded-2xl bg-clip-border" sidenav-card>
        <img class="w-1/3 mx-auto rounded-10" src="../assets/img/logo.png" alt="sidebar illustrations" />
        <div class="flex-auto w-full p-4 pt-0 text-center">
          <div class="transition-all duration-200 ease-nav-brand">
            <h6 class="mb-0 text-slate-700">Nuansa Nusantara</h6>
            <p class="mb-0 text-xs font-semibold leading-tight ">Kamar nyaman Kualitas Tinggi</p>
          </div>
        </div>
      </div>

      <!-- pro btn  -->
      <a class="inline-block w-full px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px" href="logout.php">LOG OUT</a>
    </div>
  </aside>

  <!-- end sidenav -->

  <main class="relative h-full max-h-screen transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
    <!-- Navbar -->
    <nav class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all ease-in shadow-none duration-250 rounded-2xl lg:flex-nowrap lg:justify-start" navbar-main navbar-scroll="false">
      <div class="flex items-center justify-between w-full px-4 py-1 mx-auto flex-wrap-inherit">
        <nav>
          <!-- breadcrumb -->
          <ol class="flex flex-wrap pt-1 mr-12 bg-transparent rounded-lg sm:mr-16">
            <li class="text-sm leading-normal">
              <a class="text-white opacity-50" href="javascript:;">Pages</a>
            </li>
            <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Dashboard</li>
          </ol>
          <h6 class="mb-0 font-bold text-white capitalize">Dashboard</h6>
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
          <div class="flex items-center md:ml-auto md:pr-4">
          </div>
          <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
          <li class="flex items-center">
              <a href="profile.php" class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                <i class="fa fa-user sm:mr-1"></i>
                <span class="hidden sm:inline">Profil</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- end Navbar -->

    <!-- cards -->
    <div class="w-full px-6 py-6 mx-auto">
      <!-- row 1 -->
      <div class="flex flex-wrap -mx-3">
        <!-- card1 -->
          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl  rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                    <?php
                    $jumlahkamar = "SELECT COUNT(*) AS jumlah_kamar FROM kamar";
                    $kamar = $conn->query($jumlahkamar);
                    while ($kmr = $kamar->fetch_assoc()) :
                    ?>
                      <p class="mb-0 font-sans  text-lg font-semibold leading-normal uppercase ">Kamar Hotel</p>
                      <h5 class="mb-2 ">*total kamar</h5>
                      <p class="mb-0 ">
                        <span class=" text-lg font-bold leading-normal text-blue-500 "><?= $kmr['jumlah_kamar'] ?> kamar</span>
                        
                      </p>
                      <?php endwhile; ?>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-blue-500 to-violet-500">
                      <i class="ni leading-none ni-building text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <!-- card2 -->

          <div class="w-full max-w-full px-3 mb-6 sm:w-1/2 sm:flex-none xl:mb-0 xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl  rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                    <?php
                    $jumlahcustomer = "SELECT COUNT(*) AS jumlah_customer FROM user";
                    $customer = $conn->query($jumlahcustomer);
                    while ($use = $customer->fetch_assoc()) :
                    ?>
                      <p class=" font-sans text-lg font-semibold leading-normal uppercase ">Customer</p>
                      <h5 class=" ">*total Customer Memesan Kamar</h5>
                      <p class="mb-0 ">
                        <span class="mt-3 inline-block text-lg font-bold leading-normal text-red-600"><?= $use['jumlah_customer'] ?> Orang</span>
                        
                      </p>
                      <?php endwhile; ?>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-red-600 to-orange-600">
                      <i class="ni leading-none ni-circle-08 text-2xl relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <!-- card3 -->
          <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl  rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                    <?php
                    $jumlahuang = "SELECT SUM(total_harga) AS total_jumlah_harga FROM pemesanan";
                    $uang = $conn->query($jumlahuang);
                    while ($u = $uang->fetch_assoc()) :
                    ?>
                      <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase ">Total Uang Masuk</p>
                      <h5 class="">*total Uang Pemesanan Hotel</h5>
                      <p class="mb-0 ">
                        <span class=" inline-block text-lg font-bold leading-normal text-teal-500">Rp. <?= number_format($u['total_jumlah_harga'], 0, ',', '.'); ?></span>
                      </p>
                      <?php endwhile; ?>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-teal-500 to-teal-500">
                      <i class="ni leading-none ni-money-coins text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <!-- card4 -->
          <div class="w-full max-w-full px-3 sm:w-1/2 sm:flex-none xl:w-1/4">
            <div class="relative flex flex-col min-w-0 break-words bg-white shadow-xl  rounded-2xl bg-clip-border">
              <div class="flex-auto p-4">
                <div class="flex flex-row -mx-3">
                  <div class="flex-none w-2/3 max-w-full px-3">
                    <div>
                    <?php
                    $jumlahpegawai = "SELECT COUNT(*) AS jumlah_pegawai FROM pegawai";
                    $pegawai = $conn->query($jumlahpegawai);
                    while ($peg = $pegawai->fetch_assoc()) :
                    ?>
                      <p class="mb-0 font-sans text-sm font-semibold leading-normal uppercase ">Total Pegawai</p>
                      <h5 class="">*total Pegawai Hotel</h5>
                      <p class="mb-0 ">
                        <span class="mt-5 inline-block text-lg font-bold leading-normal text-yellow-500"><?= $peg['jumlah_pegawai'] ?> orang</span>
                      </p>
                      <?php endwhile; ?>
                    </div>
                  </div>
                  <div class="px-3 text-right basis-1/3">
                    <div class="inline-block w-12 h-12 text-center rounded-circle bg-gradient-to-tl from-orange-500 to-yellow-500">
                      <i class="ni leading-none ni-active-40 text-lg relative top-3.5 text-white"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>


    <!-- cards row 2 -->
    <div class="flex flex-wrap mt-6 -mx-3">
      <div class="w-full max-w-full px-3 mt-0 lg:w-7/12 lg:flex-none">
        <div class="border-black/12.5  shadow-xl relative z-20 flex min-w-0 flex-col break-words rounded-2xl border-0 border-solid bg-white bg-clip-border">
          <div class="border-black/12.5 mb-0 rounded-t-2xl border-b-0 border-solid p-6 pt-4 pb-0">
            <h6 class="capitalize font-semibold ">Nuansa Nusantara</h6>
            "Kamar Ternyaman ada di kami"
          </div>
          <div class="flex-auto p-4">
            <div>
              <img src="../assets/img/kamar1.jpeg" alt="Logo" class="m-auto w-100 rounded-xl overflow-hidden">
            </div>
          </div>
        </div>
      </div>

      <div class="w-full max-w-full px-3 lg:w-5/12 lg:flex-none">
        <div slider class="relative w-full h-full overflow-hidden rounded-2xl">

          <!-- slide 1 -->
          <div slide class="absolute w-full h-full transition-all duration-500">
            <img class="object-cover w-full" src="../assets/img/kamar2.jpeg" alt="carousel image" />
            <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
              <div class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                <i class="top-0.75 text-xxs relative text-slate-700 ni ni-camera-compact"></i>
              </div>
              <h5 class="mb-1 text-white">Nuansa Nusantara</h5>
              <p class="">Nuansa Nusantara adalah sebuah hotel yang bertemakan nusantara, bertujuan untuk memberikan pelayanan kamar yang terjangkau, berkualitas, dan terpercaya kepada masyarakat.</p>
            </div>
          </div>

          <!-- slide 2 -->
          <div slide class="absolute w-full h-full transition-all duration-500">
            <img class="object-cover h-full" src="../assets/img/kamar3.jpeg" alt="carousel image" />
            <div class="block text-start ml-12 left-0 bottom-0 absolute right-[15%] pt-5 pb-5 text-white">
              <div class="inline-block w-8 h-8 mb-4 text-center text-black bg-white bg-center rounded-lg fill-current stroke-none">
                <i class="top-0.75 text-xxs relative text-slate-700 ni ni-bulb-61"></i>
              </div>
              <h5 class="mb-1 text-white">Komitmen Nuansa Nusantara</h5>
              <p class="">melayani customer dengan sepenuh hati juga diwujudkan dalam 5 Jaminan Pasti yang selalu dipegang teguh oleh Nuansa Nusantara</p>
            </div>
          </div>


          <!-- Control buttons -->
          <button btn-next class="absolute z-10 w-10 h-10 p-2 text-lg text-white border-none opacity-50 cursor-pointer hover:opacity-100 far fa-chevron-right active:scale-110 top-6 right-4"></button>
          <button btn-prev class="absolute z-10 w-10 h-10 p-2 text-lg text-white border-none opacity-50 cursor-pointer hover:opacity-100 far fa-chevron-left active:scale-110 top-6 right-16"></button>
        </div>
      </div>
    </div>



    <footer class="pt-4">
      <div class="w-full px-6 mx-auto">
        <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
          <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
            <div class="text-sm leading-normal text-center text-slate-500 lg:text-left">
              ©
              <script>
                document.write(new Date().getFullYear() + ",");
              </script>
              made with <i class="fa fa-heart"></i> by
              <span class="font-semibold text-slate-700 ">Auliya Ikhsana Nasution</span>

            </div>
          </div>
        </div>
      </div>
    </footer>
    </div>

</body>
<!-- plugin for charts  -->
<script src="./assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="./assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="./assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>