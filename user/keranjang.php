<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Keranjang</title>


  <!-- tailwind -->
  <link href="../src/output.css" rel="stylesheet" />
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

  <!-- keranjang pemesanan -->
  <section>
    <div class="container p-4 px-10 mx-auto lg:px-28">
      <h1 class="mb-2 text-2xl font-bold lg:text-2xl">Ringkasan Pemesanan Dan Data Diri</h1>
      <hr class="mb-2">
      <center>
        <div id="bookingContainer">
        </div>
        <button id="ResetCart" class="p-2 text-white bg-red-800 border border-red-200 rounded-xl hover:opacity-85" onclick="ResetCart()">Reset Cart</button>
        <div id="totalAmount" class="total-amount"></div>
      </center>
    </div>

  </section>

  <!-- akhir -->

  <!-- data diri -->
  <section>
    <div class="container p-4 px-10 mx-auto lg:px-28">
      <hr class="mb-2">
      <center>
        <div class="max-w-4xl p-3 mb-5 bg-white border-l-2 border-r-2 border-gray-200 rounded-lg shadow ">
          <form action="function/pemesanan.php" method="POST">
            <h4 class="text-2xl font-bold lg:text-xl">Data Diri</h4>
            <span class="block mb-3 text-sm lg:text-sm">Isi data diri terlebih dahulu dan lakukan pembayaran pemesanan</span><br>
            <div class="grid gap-6 mb-6 md:grid-cols-2">

              <input type="hidden" id="hiddenInput" name="localData">

              <div>
                <label for="nama" class="block mb-2 text-sm font-medium text-left text-gray-900 ">Nama Lengkap</label>
                <div class="flex">
                  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-gray-300 rounded-e-0 border-e-0 rounded-s-md ">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                  </span>
                  <input type="text" id="nama" name="nama" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  " placeholder="Jhon Doe" required>
                </div>
              </div>

              <div>
                <label for="email" class="block mb-2 text-sm font-medium text-left text-gray-900 ">Email</label>
                <div class="flex">
                  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-gray-300 rounded-e-0 border-e-0 rounded-s-md ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                    </svg>
                  </span>
                  <input type="email" id="email" name="email" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  " placeholder="nana@gmail.com" required>
                </div>
              </div>

              <div>
                <label for="alamat" class="block mb-2 text-sm font-medium text-left text-gray-900 ">Alamat</label>
                <div class="flex">
                  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-gray-300 rounded-e-0 border-e-0 rounded-s-md ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                    </svg>
                  </span>
                  <input type="text" id="alamat" name="alamat" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  " placeholder="jl. XXX" required>
                </div>
              </div>

              <div>
                <label for="kontak" class="block mb-2 text-sm font-medium text-left text-gray-900 dark:text-white">Nomor Telephon/Whatsapp</label>
                <div class="flex">
                  <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 border border-gray-300 rounded-e-0 border-e-0 rounded-s-md ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                    </svg>
                  </span>
                  <input type="text" id="kontak" name="kontak" class="rounded-none rounded-e-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  " placeholder="08xxxxxxxx" required>
                </div>
              </div>

            </div>

            <div class="flex items-start mb-6">
              <div class="flex items-center h-5">
                <input id="remember" type="checkbox" value="" class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800" required />
              </div>
              <label for="remember" class="text-sm font-medium text-gray-900 ms-2 ">I agree with the <a href="#" class="text-blue-600 hover:underline">terms and conditions</a>.</label>
            </div>
            <button type="submit" name="submit" class="text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 ">Submit</button>
          </form>
        </div>
      </center>
    </div>
  </section>
  <!-- akhir data diri -->

  <!-- Riwayat -->
  <button data-modal-target="riwayat" data-modal-toggle="riwayat" class="fixed z-50 p-3 bg-yellow-400 Riwayat w-fit rounded-2xl bottom-24 right-5 opacity-30 hover:opacity-100">
    <a href="">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-auto m-auto text-center w-7">
        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
      </svg>
      <p class="text-xs font-semibold text-center">Riwayat</p>
    </a>
  </button>
  <!-- Riwayat -->


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

  <!-- modal -->
  <!-- Main modal -->
  <div id="riwayat" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-2xl max-h-full p-4">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
          <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
            Static modal
          </h3>
          <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="riwayat">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <div class="p-4 space-y-4 md:p-5">
          <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
            With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
          </p>
          <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
          </p>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center p-4 text-left border-t border-gray-200 rounded-b md:p-5 dark:border-gray-600">
          <button data-modal-hide="riwayat" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
        </div>
      </div>
    </div>
  </div>
  <!-- akhir modal -->


  <!-- flowbite -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

  <!-- js -->
  <script src="../src/js/script.js"></script>
  <script src="../src/js/cart.js"></script>
  <script src="../src/js/resetCart.js"></script>
  <script src="../src/js/countItem.js"></script>


  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const formData = localStorage.getItem('keranjang_');
      if (formData) {
        document.getElementById('hiddenInput').value = formData;
      }
    });
  </script>
</body>

</html>