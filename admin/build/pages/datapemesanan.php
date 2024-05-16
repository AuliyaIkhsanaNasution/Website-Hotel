<?php
require "function/koneksi.php";
session_start();

if (!isset($_SESSION['login']) && !isset($_SESSION['user'])) {
  header("Location: ../../index.php");
}

// read
$query = "SELECT pemesanan.pemesanan_id, user.nama,  pemesanan.tanggal_checkin,  pemesanan.jumlah_tamu,  pemesanan.status_pemesanan 
FROM pemesanan  
INNER JOIN user  ON pemesanan.user_id = user.user_id ORDER BY tanggal_pesan DESC";
$hasil = $conn->query($query);
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../assets/img/logo.png" />
  <title>Data Pemesanan Nuansa Nusantara Hotel</title>
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
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>

<body class="m-0 font-sans text-base antialiased font-normal leading-default bg-gray-50 text-slate-500">
  <div class="absolute w-full bg-blue-700 min-h-75"></div>

  <!-- sidenav  -->
  <aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0" aria-expanded="false">
    <div class="h-19">
      <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times text-slate-400 xl:hidden" sidenav-close></i>
      <a class="block px-8 py-6 m-0 text-sm whitespace-nowrap text-slate-700" href="dashboard.php" target="_blank">
        <img src="../assets/img/logo.png" class="inline h-full max-w-full transition-all duration-200 rounded-full ease-nav-brand max-h-8" alt="main_logo" />
        <img src="" class="hidden h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8 " alt="main_logo" />
        <span class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">Nuansa Nusantara</span>
      </a>
    </div>

    <hr class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent " />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
      <ul class="flex flex-col pl-0 mb-0">
        <li class="mt-0.5 w-full">
          <a class="py-2.7   text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors" href="dashboard.php">
            <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
              <i class="relative top-0 text-sm leading-normal text-blue-500 ni ni-tv-2"></i>
            </div>
            <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Dashboard</span>
          </a>
        </li>

        <?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2) : ?>
          <li class="mt-0.5 w-full">
            <a class="  py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="datacustomer.php">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Customer</span>
            </a>
          </li>
        <?php endif; ?>

        <?php if ($_SESSION['level'] == 1) : ?>
          <li class="mt-0.5 w-full">
            <a class="  py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="datapegawai.php">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-orange-500 ni ni-calendar-grid-58"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Data Pegawai</span>
            </a>
          </li>
        <?php endif; ?>

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


        <?php if ($_SESSION['level'] == 1 || $_SESSION['level'] == 2) : ?>
          <li class="mt-0.5 w-full">
            <a class="bg-blue-500/13  py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors" href="datapemesanan.php">
              <div class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                <i class="relative top-0 text-sm leading-normal text-cyan-500 ni ni-app"></i>
              </div>
              <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Transaksi Pemesanan</span>
            </a>
          </li>
        <?php endif; ?>

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
      <a class="inline-block w-full px-8 py-2 text-xs font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-red-500 border-0 rounded-lg shadow-md select-none bg-150 bg-x-25 hover:shadow-xs hover:-translate-y-px" href="../../auth/logout.php">LOG OUT</a>
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
            <li class="text-sm pl-2 capitalize leading-normal text-white before:float-left before:pr-2 before:text-white before:content-['/']" aria-current="page">Data Pemesanan</li>
          </ol>
          <h6 class="mb-0 text-2xl font-bold text-white capitalize">Data Pemesanan</h6>
        </nav>

        <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
          <div class="flex items-center md:ml-auto md:pr-4">
          </div>
          <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
            <!-- online builder btn  -->
            <!-- <li class="flex items-center">
                <a class="inline-block px-8 py-2 mb-0 mr-4 text-xs font-bold text-center text-blue-500 uppercase align-middle transition-all ease-in bg-transparent border border-blue-500 border-solid rounded-lg shadow-none cursor-pointer leading-pro hover:-translate-y-px active:shadow-xs hover:border-blue-500 active:bg-blue-500 active:hover:text-blue-500 hover:text-blue-500 tracking-tight-rem hover:bg-transparent hover:opacity-75 hover:shadow-none active:text-white active:hover:bg-transparent" target="_blank" href="https://www.creative-tim.com/builder/soft-ui?ref=navbar-dashboard&amp;_ga=2.76518741.1192788655.1647724933-1242940210.1644448053">Online Builder</a>
              </li> -->
            <li class="flex items-center">
              <a href="cetak/cetakpemesanan.php" class="block px-4 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                <i class="fa fa-floppy-o sm:mr-1"></i>
                <span class="hidden sm:inline">Print</span>
              </a>
              <a href="profile.php" class="block px-0 py-2 text-sm font-semibold text-white transition-all ease-nav-brand">
                <i class="fa fa-user sm:mr-1"></i>
                <span class="hidden sm:inline">Profil</span>
              </a>
            </li>

            </a>
            </li>


          </ul>
          </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- end Navbar -->

    <!-- table -->
    <div class="mt-5 mb-10 w-fit">
      <a href="function/tambahpemesanan.php" class="block px-6 py-3 mt-3 font-bold text-gray-800 bg-yellow-400 rounded-lg ms-8 hover:bg-slate-200 hover:scale-110 ">Tambah Data Pemesanan</a>
    </div>


    <!-- alert -->
    <?php
    if (isset($_GET['tambah'])) : ?>
      <script>
        Swal.fire("Data Pemesanan Berhasil Ditambahkan");
      </script>
    <?php endif; ?>

    <?php
    if (isset($_GET['ubah'])) : ?>
      <script>
        Swal.fire("Data Pemesanan Berhasil Diupdate");
      </script>
    <?php endif; ?>

    <?php
    if (isset($_GET['hapus'])) : ?>
      <script>
        Swal.fire("Data Pemesanan Berhasil Dihapus");
      </script>
    <?php endif; ?>
    <!-- akhir alert -->


    <!-- table 1 -->

    <div class="flex flex-wrap mt-4 -mx-3 ms-5 me-4">
      <div class="flex-none w-full max-w-full px-3">
        <div class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl rounded-2xl bg-clip-border">
          <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
            <h6 class="text-lg font-semibold ">Data Pemesanan</h6>
          </div>
          <div class="flex-auto px-0 pt-0 pb-2 ">
            <div class="p-0 overflow-x-auto">
              <table class="items-center w-full mb-0 align-top border-collapse text-slate-500">
                <thead class="align-bottom">
                  <tr>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b  #FFFFFFborder-collapse shadow-none   text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70 w-[5%]">Pemesanan ID</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">Nama Customer</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">Tanggal Check-In</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">Jumlah Tamu</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">Status Pemesanan</th>
                    <th class="px-6 py-3 font-bold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none text-xxs border-b-solid tracking-none whitespace-nowrap text-slate-900 opacity-70">Control</th>
                  </tr>
                </thead>
                <tbody class="align-center ">
                  <?php


                  while ($pesan = $hasil->fetch_assoc()) {
                  ?>

                    <center>
                      <tr>
                        <td class="p-2 align-middle bg-transparent border-b  whitespace-nowrap shadow-transparent text-center w-[5%] "><?= $pesan['pemesanan_id'] ?>
                        </td>
                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><?= $pesan['nama'] ?>
                        </td>
                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><?= date('d-m-Y', strtotime($pesan['tanggal_checkin'])) ?>
                        </td>
                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><?= $pesan['jumlah_tamu'] ?>
                        <td class="p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent"><?= $pesan['status_pemesanan'] ?>
                        </td>
                        <td class="inline-block p-2 text-center align-middle bg-transparent border-b whitespace-nowrap shadow-transparent">

                          <a class="items-center block px-4 py-2 text-sm font-medium text-white bg-blue-500 rounded  button hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="function/detailpemesanan.php?id=<?= htmlspecialchars($pesan['pemesanan_id']) ?>">Detail</a>

                          <?php if ($pesan['status_pemesanan'] == 'proses') { ?>
                            <a class="items-center block px-4 py-2 text-sm font-medium text-white bg-green-500 rounded button hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500" href="function/update_status.php?id=<?= $pesan['pemesanan_id'] ?>&status=dikonfirmasi">Checkin</a>
                            <a class="items-center block px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded button hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" href="function/update_status.php?id=<?= $pesan['pemesanan_id'] ?>&status=batal">Batal</a>
                          <?php } elseif ($pesan['status_pemesanan'] == 'dikonfirmasi') { ?>
                            <a class="items-center block px-4 py-2 text-sm font-medium text-white bg-yellow-500 rounded button hover:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-500" href="function/update_status.php?id=<?= $pesan['pemesanan_id'] ?>&status=selesai">Checkout</a>
                          <?php } ?>

                          <a class="items-center block px-4 py-2 text-sm font-medium text-white bg-red-500 rounded  button hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500" href="function/hapuspemesanan.php?id=<?= htmlspecialchars($pesan['pemesanan_id']) ?>" onclick=" return confirm ('Apakah Anda Yakin Ingin Menghapus data Ini ?');">Hapus</a>

                      </tr>
                    </center>

                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- akhir table -->


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

    </div>
    </div>
    </div>

</body>
<!-- plugin for charts  -->
<script src="./assets/js/plugins/chartjs.min.js" async></script>
<!-- plugin for scrollbar  -->
<script src="./assets/js/plugins/perfect-scrollbar.min.js" async></script>
<!-- main script file  -->
<script src="./assets/js/argon-dashboard-tailwind.js?v=1.0.1" async></script>

</html>