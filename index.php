<?php 

?>


<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Nuansa Nusantara Hotel</title>

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
  <body class="overflow-x-hidden">


  <?php 
if(isset($_GET['error'])) {
?>

<script>
  Swal.fire({
  icon: "error",
  title: "Oops...",
  text: "Ada Kesalahan!",
  footer: 'Coba Ulangi Kembali'
});
</script>
<?php } ?>

    <!-- navbar -->
    <nav class="bg-blue-800 fixed w-full z-20 top-0 start-0 shadow-sm">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="https://flowbite.com/" class="flex items-center space-x-3 rtl:space-x-reverse">
                  <img src="assets/images/logo.png" class="h-8 rounded-lg" alt="Flowbite Logo" />
          <span class="self-center text-2xl text-yellow-400 font-bold whitespace-nowrap">Nuansa Nusantara</span>
        </a>
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
        <div class="items-center justify-between hidden w-full lg:flex lg:w-auto lg:order-1" id="navbar-sticky">
          <ul id="nav" class="flex flex-col p-4 lg:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 lg:space-x-8 rtl:space-x-reverse lg:flex-row lg:mt-0 lg:border-0 lg:bg-transparent font-semibold lg:text-xl">
            <li>
              <a href="#" class="nav-item block py-2 px-3 text-gray-900 lg:text-yellow-400 bg-yellow-500 rounded-sm lg:bg-transparent lg:text-ambeer-700 lg:p-0 font-medium lg:underline underline-offset-8" aria-current="page">Home</a>
            </li>
            <li>
              <a href="#about" class="nav-item block py-2 px-3 text-gray-900 lg:text-white rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-amber-700 lg:p-0 font-medium">Tentang Kami</a>
            </li>
            <li>
              <a href="#best" class="nav-item block py-2 px-3 text-gray-900 lg:text-white rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-amber-700 lg:p-0 font-medium"> Kamar Terbaik</a>
            </li>
            <li>
              <a href="#facilities" class="nav-item block py-2 px-3 text-gray-900 lg:text-white rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-amber-700 lg:p-0 font-medium">Fasilitas</a>
            </li>
            <li>
              <a href="#services" class="nav-item block py-2 px-3 text-gray-900 lg:text-white rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-amber-700 lg:p-0 font-medium">layanan</a>
            </li>
            <li>
              <a href="#gallery" class="nav-item block py-2 px-3 text-gray-900 lg:text-white rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-amber-700 lg:p-0 font-medium">Gallery</a>
            </li>
            <li>
              <a href="#contact" class="nav-item block py-2 px-3 text-gray-900 lg:text-white rounded hover:bg-gray-100 lg:hover:bg-transparent lg:hover:text-amber-700 lg:p-0 font-medium">Kontak</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- end navbar -->

    <!-- jumbotron -->
    <section
      id="jumbo" class="relative bg-center bg-cover bg-no-repeat bg-[url('assets/images/hero.jpeg')] bg-gray-700 bg-blend-multiply h-fit md:h-screen flex items-center"
      style="background-image: url('assets/images/hero.jpeg')"
    >
      <div class="px-4 mx-auto max-w-screen-xl text-center py-24 lg:py-56">
        <h1 class="mb-4 text-3xl font-extrabold tracking-tight leading-none text-white md:text-4xl lg:text-5xl">Pesan Kamar Anda Di Hotel Kami <span class="text-amber-500">Sekarang!</span></h1>
        <p class=" text-base max-w-5xl m-auto font-normal text-gray-300 lg:text-lg sm:px-16 lg:px-48">
          Jadikan Liburan Anda Lebih Indah Bersama Nuansa Nusantara Hotel.</p>
        <p class="mb-8 text-base max-w-6xl m-auto font-normal text-gray-300 lg:text-lg sm:px-16 lg:px-48">
          Nikmati Berbagai Fasilitas Untuk Moment Yang Tak Terlupakan Bersama Keluarga Anda.</p>

        <form action="user/pemesanan.php" method="POST" class="bg-white lg:w-fit p-5 m-auto rounded-md shadow-lg flex flex-col items-center gap-3 lg:gap-8 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 lg:p-8">
          <div class="w-full lg:w-fit">
            <label for="checkin" class="text-left block -mb-5 text-base font-medium ms-2">Check In</label> <br />
            <input type="date" name="checkin" id="checkin" class="bg-gray-50 border border-gray-300 text-amber-500 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-8ring-blue-800 block w-full p-2.5" required/>
          </div>
          <div class="w-full lg:w-fit">
            <label for="checkout" class="text-left block -mb-5 text-base font-medium ms-2">Check Out</label> <br />
            <input type="date" name="checkout" id="checkout" class="bg-gray-50 border border-gray-300 text-amber-500 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-8ring-blue-800 block w-full p-2.5" required/>
          </div>
          <div class="w-full lg:w-fit">
          <label for="jmlh" class="text-left block -mb-5 text-base font-medium ms-2">Jumlah Tamu
            <span class="inline-block text-xs font-medium text-[#ef4444]">*diatas 10 thn</span></label><br />
            <input type="number" min="1" placeholder="1" name="jmlh" id="jmlh" class="bg-gray-50 border border-gray-300 text-amber-500 text-sm rounded-lg focus:ring-blue-800 focus:border-blue-8ring-blue-800 block w-full p-2.5" required />
          </div>
          <div class="w-full lg:w-fit">
            <label for="" class="hidden lg:block"> </label> <br />
            <button type="submit" class="w-full lg:w-fit text-white bg-amber-500 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Book Now</button>
          </div>
        </form>

      </div>
    </section>
    <!-- end jumbotron -->

    <!-- about us -->
    <section id="about" class="bg-slate-200 py-20 px-10 md:py-24 flex flex-wrap flex-col-reverse lg:flex-row justify-around items-center">
      <div class="w-full lg:w-1/3 relative">
        <img src="assets/images/family3.jpeg" alt="image not found" loading="lazy" class="w-full rounded-md shadow-lg brightness-75" />

        <div class="absolute bottom-10 left-14 hidden xl:flex items-center justify-around gap-5">
          <img src="assets/images/superior2.jpeg" alt="image not found" loading="lazy" class="h-24 rounded-lg border-2 border-amber-500 hover:scale-110 cursor-pointer transition-all" />
          <img src="assets/images/deluxe2.jpeg" alt="image not found" loading="lazy" class="h-24 rounded-lg border-2 border-amber-500 hover:scale-110 cursor-pointer transition-all" />
          <img src="assets/images/family2.png" alt="image not found" loading="lazy" class="h-24 rounded-lg border-2 border-amber-500 hover:scale-110 cursor-pointer transition-all" />
        </div>
      </div>

      <div class="w-full lg:w-1/3 py-10">
        <h1 class="text-3xl font-bold mb-5 lg:text-4xl">Tentang Kami <span class="text-amber-500">Nuansa Nusantara</span></h1>
        <p class="text-sm font-light text-justify">
        Hotel Nuansa Nusantara adalah destinasi sempurna bagi siapa saja yang ingin merasakan kekayaan budaya dan keindahan alam Indonesia dalam satu lokasi yang nyaman dan mewah. Terletak di jantung kota yang strategis, hotel ini menawarkan akses mudah ke berbagai situs bersejarah, pusat perbelanjaan, dan atraksi lokal, menjadikannya pilihan ideal baik untuk wisatawan bisnis maupun liburan.

        esain hotel ini terinspirasi oleh keanekaragaman budaya dan alam Indonesia, dari interior hingga arsitektur, mencerminkan tradisi dan modernitas. Setiap kamar di Hotel Nuansa Nusantara dilengkapi dengan fasilitas modern yang dirancang untuk kenyamanan dan kemudahan tamu, sambil tetap menonjolkan elemen-elemen estetik lokal yang unik.
        </p>

        <div class="flex gap-5 mt-10">
          <a href="#jumbo" class="text-white bg-amber-500 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center">Book Now</a>
        </div>
      </div>
    </section>
    <!-- end about us -->

    <!-- best rooms -->
    <section id="best" class="py-20 px-10 md:py-24 md:px-20">
      <div class="py-10 text-center">
        <h1 class="text-3xl font-bold mb-5 lg:text-4xl">Kamar Terbaik Kami <span class="text-amber-500">Untuk Kamu</span></h1>
        <p class="text-sm font-light max-w-2xl mx-auto">
        kami menyediakan kamar hotel terbaik untuk menciptakan sebuah lingkungan penginapan yang memadukan kualitas tinggi, kenyamanan, dan keindahan estetika lokal yang tak tertandingi di Hotel Nuansa Nusantara.
        </p>
      </div>

      <div class="flex flex-wrap justify-around gap-5 lg:justify-center">
        <!-- Kamar satu -->
        <div class="img-container relative overflow-hidden cursor-pointer w-full lg:w-1/3">
          <img src="assets/images/superior2.jpeg" alt="image not found" loading="lazy" class="w-full rounded-md shadow-lg brightness-75" />
          <div class="absolute left-0 w-full h-full bg-slate-600 bg-opacity-50 rounded-lg flex flex-col items-center justify-center p-3 lg:p-5" id="ket-1">
            <h1 class="text-2xl font-bold mb-3 text-white">Superior Room</h1>
            <p class="text-xs font-light text-white">Kamar Superior kami memberikan kenyamanan dan fasilitas yang memadai untuk mengakomodasi Anda dengan harga yang terjangkau.</p>
            <a href="user/superior.php" class="text-white bg-amber-500 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center mt-5">See Room</a>
          </div>
        </div>
        <!-- Kamar dua -->
        <div class="img-container relative overflow-hidden cursor-pointer w-full lg:w-1/3">
          <img src="assets/images/deluxe2.jpeg" alt="image not found" loading="lazy" class="w-full rounded-md shadow-lg brightness-75" />
          <div class="absolute left-0 w-full h-full bg-slate-600 bg-opacity-50 rounded-lg flex flex-col items-center justify-center p-3 lg:p-5" id="ket-1">
            <h1 class="text-2xl font-bold mb-3 text-white">Deluxe Room</h1>
            <p class="text-xs font-light text-white">Kamar dengan ukuran yang sedikit lebih besar, dilengkapi dengan fasilitas tambahan seperti area duduk tambahan atau pemandangan yang lebih baik.</p>
            <a href="user/deluxe.php" class="text-white bg-amber-500 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center mt-5">See Room</a>
          </div>
        </div>
        <!-- Kamar tiga -->
        <div class="img-container relative overflow-hidden cursor-pointer w-full lg:w-1/3">
          <img src="assets/images/family2.jpeg" alt="image not found" loading="lazy" class="w-full rounded-md shadow-lg brightness-75" />
          <div class="absolute left-0 w-full h-full bg-slate-600 bg-opacity-50 rounded-lg flex flex-col items-center justify-center p-3 lg:p-5" id="ket-1">
            <h1 class="text-2xl font-bold mb-3 text-white">Family Room</h1>
            <p class="text-xs font-light text-white">Kamar yang dirancang khusus untuk tamu yang bepergian bersama keluarga, dengan ruang yang lebih luas dan fasilitas yang sesuai untuk kenyamanan bersama.</p>
            <a href="user/family.php" class="text-white bg-amber-500 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center mt-5">See Room</a>
          </div>
        </div>
        <!-- kamar empat-->
        <div class="img-container relative overflow-hidden cursor-pointer w-full lg:w-1/3">
          <img src="assets/images/deluxe5.jpeg" alt="image not found" loading="lazy" class="w-full rounded-md shadow-lg brightness-75" />
          <div class="absolute left-0 w-full h-full bg-slate-600 bg-opacity-50 rounded-lg flex flex-col items-center justify-center p-3 lg:p-5" id="ket-1">
            <h1 class="text-2xl font-bold mb-3 text-white">Tematik Room</h1>
            <p class="text-xs font-light text-white"> Kamar yang dirancang dengan tema tertentu, seperti budaya lokal atau alam, untuk memberikan pengalaman menginap yang unik dan berbeda.</p>
            <a href="user/tematik.php" class="text-white bg-amber-500 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm w-full sm:w-fit px-5 py-2.5 text-center mt-5">See Room</a>
          </div>
        </div>
       
      </div>
    </section>
    <!-- end best rooms -->

    <!-- facilities -->
    <section id="facilities" class="py-14 px-10 md:py-16 md:px-20 flex flex-wrap justify-around items-center">
      <div class="w-full lg:w-1/3">
        <h1 class="text-3xl font-bold mb-5 lg:text-4xl">Fasilitas<span class="text-amber-500"> Hotel</span></h1>
        <p class="text-sm font-light max-w-2xl mx-auto">Nikmati pengalaman menginap yang tak terlupakan dengan fasilitas kami yang menawarkan kamar-kamar yang dirancang dengan indah, kolam renang yang menenangkan dengan pemandangan alam Nusantara yang memesona, restoran yang menyajikan hidangan-hidangan autentik Nusantara, serta area tanpa merokok untuk kesehatan dan kenyamanan Anda.

</p>

        <ul class="mt-5">
          <li>
            <div class="flex items-center gap-2 my-2">
              <i class="fa-solid fa-check text-sm bg-yellow-400 rounded-full px-1 text-white"></i>
              <p class="text-base font-bold">Individual Room</p>
            </div>
          </li>
          <li>
            <div class="flex items-center gap-2 my-2">
              <i class="fa-solid fa-check text-sm bg-yellow-400 rounded-full px-1 text-white"></i>
              <p class="text-base font-bold">Pool</p>
            </div>
          </li>
          <li>
            <div class="flex items-center gap-2 my-2">
              <i class="fa-solid fa-check text-sm bg-yellow-400 rounded-full px-1 text-white"></i>
              <p class="text-base font-bold">Restaurant</p>
            </div>
          </li>
          <li>
            <div class="flex items-center gap-2 my-2">
              <i class="fa-solid fa-check text-sm bg-yellow-400 rounded-full px-1 text-white"></i>
              <p class="text-base font-bold">No Smoking Area</p>
            </div>
          </li>
        </ul>
      </div>

      <div class="w-full lg:w-1/3 relative">
        <img src="assets/images/pool.jpeg" alt="image not found" loading="lazy" class="hidden lg:block w-full rounded-md shadow-lg brightness-75" />

        <img src="assets/images/rest1.jpeg" alt="image not found" loading="lazy" class="hidden lg:block w-1/2 absolute top-20 -left-24 rounded-md border-2 border-amber-500" />

        <img src="assets/images/rest2.jpeg" alt="image not found" loading="lazy" class="hidden lg:block w-1/2 absolute top-[60%] left-0 rounded-md border-2 border-amber-500 z-10" />

        <div id="custom-controls-gallery" class="relative w-full mt-5 lg:hidden" data-carousel="slide">
          <!-- Carousel wrapper -->
          <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="assets/images/pool.jpeg" loading="eager" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="" />
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
              <img src="assets/images/rest1.jpeg" loading="eager" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="" />
            </div>
            <!-- Item 3 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
              <img src="assets/images/rest2.jpeg" loading="eager" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="" />
            </div>
          </div>
          <div class="flex justify-center items-center pt-4">
            <button type="button" class="flex justify-center items-center me-4 h-full cursor-pointer group focus:outline-none" data-carousel-prev>
              <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4" />
                </svg>
                <span class="sr-only">Previous</span>
              </span>
            </button>
            <button type="button" class="flex justify-center items-center h-full cursor-pointer group focus:outline-none" data-carousel-next>
              <span class="text-gray-400 hover:text-gray-900 dark:hover:text-white group-focus:text-gray-900 dark:group-focus:text-white">
                <svg class="rtl:rotate-180 w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
                <span class="sr-only">Next</span>
              </span>
            </button>
          </div>
        </div>
      </div>
    </section>
    <!-- end facilities -->

    <!-- BREAK -->
    <section class="my-14 relative h-32 lg:h-48 w-full bg-[url('assets/images/hero.jpeg')] bg-cover bg-center bg-fixed bg-slate-400 bg-blend-multiply" style="background-image: url('assets/images/hero.jpeg')">
      <div class="text-center text-white absolute top-0 left-0 w-full h-full flex flex-col items-center justify-center">
        <h1 class="text-xl lg:text-3xl font-bold">Enjoy Your Stay With Us</h1>
        <p class="text-sm font-light max-w-xl lg:text-base mt-3">Kamu bisa langsung contact kami untuk info lebih lanjut.</p>

        <a href="#contact" class="text-white bg-amber-500 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg lg:text-base w-fit p-2 py-1 lg:p-3 lg:py-2 text-center text-xs mt-2 lg:mt-4">Contact Us</a>
      </div>
    </section>
    <!-- BREAK -->

    <!-- services -->
    <section id="services" class="py-14 px-10 md:py-16 md:px-20">
      <div class="py-10 text-center">
        <h1 class="text-3xl font-bold mb-5 lg:text-4xl">Layanan <span class="text-amber-500">Terbaik kami</span></h1>
        <p class="text-sm font-light max-w-2xl mx-auto">Kami bangga menyajikan layanan yang nyaman dan luar biasa bagi setiap tamu, dengan staf yang ramah dan berdedikasi siap membantu setiap kebutuhan Anda selama menginap di hotel kami. </p>
      </div>

      <div class="flex flex-wrap justify-center gap-3 lg:gap-5 text-center">
        <div class="w-1/3 md:w-1/4 lg:w-1/5 text-center rounded-lg shadow-xl p-5 flex flex-col justify-between">
          <i class="fa-solid fa-hotel text-amber-400 text-2xl lg:text-3xl"></i>
          <p class="text-sm font-semibold mt-3 lg:text-base lg:font-medium">Luxury Guest Rooms</p>
        </div>
        <div class="w-1/3 md:w-1/4 lg:w-1/5 text-center rounded-lg shadow-xl p-5 flex flex-col justify-between">
          <i class="fa-solid fa-utensils text-amber-400 text-2xl lg:text-3xl"></i>
          <p class="text-sm font-semibold mt-3 lg:text-base lg:font-medium">Restaurant</p>
        </div>
        <div class="w-1/3 md:w-1/4 lg:w-1/5 text-center rounded-lg shadow-xl p-5 flex flex-col justify-between">
          <i class="fa-solid fa-water-ladder text-amber-400 text-2xl lg:text-3xl"></i>
          <p class="text-sm font-semibold mt-3 lg:text-base lg:font-medium">pool</p>
        </div>
        <div class="w-1/3 md:w-1/4 lg:w-1/5 text-center rounded-lg shadow-xl p-5 flex flex-col justify-between">
          <i class="fa-solid fa-wifi text-amber-400 text-2xl lg:text-3xl"></i>
          <p class="text-sm font-semibold mt-3 lg:text-base lg:font-medium">Free Wi-Fi</p>
        </div>
        <div class="w-1/3 md:w-1/4 lg:w-1/5 text-center rounded-lg shadow-xl p-5 flex flex-col justify-between">
          <i class="fa-solid fa-square-parking text-amber-400 text-2xl lg:text-3xl"></i>
          <p class="text-sm font-semibold mt-3 lg:text-base lg:font-medium">Free Parking Space</p>
        </div>
        <div class="w-1/3 md:w-1/4 lg:w-1/5 text-center rounded-lg shadow-xl p-5 flex flex-col justify-between">
          <i class="fa-solid fa-clock text-amber-400 text-2xl lg:text-3xl"></i>
          <p class="text-sm font-semibold mt-3 lg:text-base lg:font-medium">24 Hours Services</p>
        </div>
      </div>
    </section>
    <!-- end services -->

    <!-- gallery -->
    <section id="gallery" class="py-20 px-10 md:py-24 md:px-20">
      <h1 class="text-3xl font-bold lg:text-4xl mb-5 lg:mb-8"><span class="text-amber-500">Gallery and Hotels</span></h1>

      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="grid gap-4">
          <div>
            <img class="h-auto max-w-full rounded-lg brightness-50 hover:brightness-100 transition-all cursor-pointer" src="assets/images/pool2.jpeg" alt="" loading="eager" />
          </div>
          <div>
            <img class="h-auto max-w-full rounded-lg brightness-50 hover:brightness-100 transition-all cursor-pointer" src="assets/images/galeri1.jpeg" alt="" loading="eager" />
          </div>
          <div>
            <img class="h-auto max-w-full rounded-lg brightness-50 hover:brightness-100 transition-all cursor-pointer" src="assets/images/deluxe3.jpeg" alt="" loading="eager" />
          </div>
        </div>
        <div class="grid gap-4">
          <div>
            <img class="h-auto max-w-full rounded-lg brightness-50 hover:brightness-100 transition-all cursor-pointer" src="assets/images/family4.jpeg" alt="" loading="eager" />
          </div>
          <div>
            <img class="h-auto max-w-full rounded-lg brightness-50 hover:brightness-100 transition-all cursor-pointer" src="assets/images/rest2.jpeg" alt="" loading="eager" />
          </div>
          <div>
            <img class="h-auto max-w-full rounded-lg brightness-50 hover:brightness-100 transition-all cursor-pointer" src="assets/images/leri2.jpeg" alt="" loading="eager" />
          </div>
        </div>
        <div class="grid gap-4">
          <div>
            <img class="h-auto max-w-full rounded-lg brightness-50 hover:brightness-100 transition-all cursor-pointer" src="assets/images/galeri3.jpeg" alt="" loading="eager" />
          </div>
          <div>
            <img class="h-auto max-w-full rounded-lg brightness-50 hover:brightness-100 transition-all cursor-pointer" src="assets/images/deluxe2.jpeg" alt="" loading="eager" />
          </div>
          <div>
            <img class="h-auto max-w-full rounded-lg brightness-50 hover:brightness-100 transition-all cursor-pointer" src="assets/images/galeri4.jpeg" alt="" loading="eager" />
          </div>
        </div>
        <div class="grid gap-4">
          <div>
            <img class="h-auto max-w-full rounded-lg brightness-50 hover:brightness-100 transition-all cursor-pointer" src="assets/images/family6.jpeg" alt="" loading="eager" />
          </div>
          <div>
            <img class="h-auto max-w-full rounded-lg brightness-50 hover:brightness-100 transition-all cursor-pointer" src="assets/images/galeri5.jpeg" alt="" loading="eager" />
          </div>
          <div>
            <img class="h-auto max-w-full rounded-lg brightness-50 hover:brightness-100 transition-all cursor-pointer" src="assets/images/deluxe5.jpeg" alt="" loading="eager" />
          </div>
        </div>
      </div>
    </section>
    <!-- end gallery -->

    <!-- contact us -->
    <section id="contact" class="py-20 px-10 md:py-24 md:px-20 flex flex-wrap justify-center items-center gap-4 lg:gap-6">
      <div class="w-full lg:w-1/4">
        <h1 class="text-3xl font-bold lg:text-4xl mb-5 lg:mb-8">Contact <span class="text-amber-500">Us</span></h1>

        <div class="my-5 lg:my-8">
          <p class="text-base font-semibold">Alamat</p>
          <hr />
          <div class="flex items-center gap-2 my-2">
            <i class="fa-solid fa-map text-sm bg-slate-200 rounded-full p-2 px-3 text-amber-400"></i>
            <a href="" class="text-sm font-light">Jalan Pertahanan</a>
          </div>
        </div>
        <div class="my-5 lg:my-8">
          <p class="text-base font-semibold">Nomor Telepon</p>
          <hr />
          <div class="flex items-center gap-2 my-2">
            <i class="fa-solid fa-phone text-sm bg-slate-200 rounded-full p-2 px-3 text-amber-400"></i>
            <a href="" class="text-sm font-light">+6285159968152</a>
          </div>
        </div>
        <div class="my-5 lg:my-8">
          <p class="text-base font-semibold">Email</p>
          <hr />
          <div class="flex items-center gap-2 my-2">
            <i class="fa-solid fa-phone text-sm bg-slate-200 rounded-full p-2 px-3 text-amber-400"></i>
            <a href="" class="text-sm font-light">example@example.com</a>
          </div>
        </div>

        <a href="" class="text-white bg-amber-500 hover:bg-amber-800 focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mt-5">Say Hello</a>
      </div>

      <div class="w-full lg:w-2/3">
        <iframe
          class="w-full rounded-lg shadow-lg"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3348.603789985024!2d98.6586985362932!3d3.545121426036639!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312ffe714892ad%3A0x8331391d7c3f9501!2sTHE%20K%20HOTEL!5e0!3m2!1sid!2sid!4v1713792831858!5m2!1sid!2sid"
          width="600"
          height="450"
          style="border: 0"
          allowfullscreen=""
          loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"
        ></iframe>
      </div>
    </section>
    <!-- end contact us -->

    <!-- footer -->
    <footer class="bg-slate-100 pt-10">
      <div class="mx-auto w-full max-w-screen-xl p-4">
        <div class="md:flex md:justify-between">
          <div class="mb-6 md:mb-0">
            <a href="https://flowbite.com/" class="flex items-center">
              <img src="assets/images/logo.png" class="h-8 me-3" alt="FlowBite Logo" />
              <span class="self-center text-2xl font-semibold whitespace-nowrap">Nuansa Nusantara Hotel</span>
            </a>
          </div>
          <div class="grid grid-cols-2 gap-8 sm:gap-6 sm:grid-cols-3">
            <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Resources</h2>
              <ul class="text-gray-500 dark:text-gray-400 font-medium">
                <li class="mb-4">
                  <a href="admin/index.php" class="hover:underline">Admin</a>
                </li>
                <li>
                  <a href="https://tailwindcss.com/" class="hover:underline">Tailwind CSS</a>
                </li>
              </ul>
            </div>
            <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Follow us</h2>
              <ul class="text-gray-500 font-medium">
                <li class="mb-4">
                  <a href="https://github.com/themesberg/flowbite" class="hover:underline">Github</a>
                </li>
                <li>
                  <a href="https://discord.gg/4eeurUVvTy" class="hover:underline">Discord</a>
                </li>
              </ul>
            </div>
            <div>
              <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase">Legal</h2>
              <ul class="text-gray-500 font-medium">
                <li class="mb-4">
                  <a href="#" class="hover:underline">Privacy Policy</a>
                </li>
                <li>
                  <a href="#" class="hover:underline">Terms &amp; Conditions</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center bg-blue-800">
        <span class="text-sm text-white sm:text-center">© 2024 <a href="https://flowbite.com/" class="hover:underline">Kelompok 4</a>. All Rights Reserved. </span>
      </div>
    </footer>
    <!-- end footer -->

    <!-- flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- js -->
    <script src="src/js/script.js"></script>
  </body>
</html>
