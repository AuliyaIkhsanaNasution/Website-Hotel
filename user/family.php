<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>kamar Family</title>

     <!-- tailwind -->
     <link href="./src/output.css" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- flowbite -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- mycss -->
    <link rel="stylesheet" href="src/style.css" />
</head>
<body class="overflow-x-hidden bg-slate-100">    
<!-- hero -->
<div id="gallery" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-screen overflow-hidden rounded-lg md:h-screen">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="../assets/images/f1.jpeg" class="w-screen absolute inset-0 object-cover object-center" alt="">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
            <img src="../assets/images/f2.jpeg" class="w-screen absolute inset-0 object-cover object-center" alt="">
        </div>
        <!-- Item 3 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="../assets/images/f3.jpeg" class="w-screen absolute inset-0 object-cover object-center" alt="">
        </div>
        <!-- Item 4 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="../assets/images/f4.jpeg" class="w-screen absolute inset-0 object-cover object-center" alt="">
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
    <!-- akhir hero -->

    <!-- detai kamar -->
    <section>
    <h3 class=" text-slate-800 text-3xl font-semibold pt-10 pb-5 ms-5 text-center lg:text-5xl lg:font-semibold" data-aos="fade-right" style="font-family: 'Great Vibes';">Family</h3>
    <p class="text-justify text-lg lg:text-base mx-28 px-11 mb-11" data-aos="fade-left">Ruang Keluarga Nuansa Nusantara secara sederhana dapat didefinisikan sebagai pengalaman Kamar Nuansa Nusantara yang definitif, di mana Anda dapat mengharapkan perhatian terhadap detail di setiap sudut ruangan. Dirancang dengan cermat untuk pengalaman menginap terbaik di Hotel Nuansa Nusantara, Family room diperuntukkan bagi mereka yang ingin meremajakan dan melepaskan diri dari hari-hari sibuk sehari-hari.</p>
    </section>
    <!-- akhir detail kamar -->

    <!-- fasilitas kamar -->
    <section class="mb-16">
    <h3 class="text-slate-800 mb-5 text-3xl font-semibold pt-10 pb-5 ms-5 text-center lg:text-5xl lg:font-extrabold" data-aos="fade-right" style="font-family: 'Great Vibes';">Fasilitas dalam kamar</h3>
    <div class="flex flex-row ">
  
    <div class="basis-1/3 ml-16">
<ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
    <li>
    TV LED 42” dengan lebih dari 60 saluran
    </li>
    <li>
    Akses internet WiFi gratis
    </li>
    <li>
    Sistem AC individu
    </li>
    <li>
    Hairdryer
    </li>
</ul>

  </div>
  <div class="basis-1/3 ">
<ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
    <li>
    Meja tulis dengan stopkontak universal
    </li>
    <li>
    Fasilitas Pembuatan Kopi dan Teh
    </li>
    <li>
    Tempat tidur berkualitas tinggi
    </li>
</ul>
  </div>
  <div class="basis-1/3">
<ul class="max-w-md space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
    <li>
    Minibar
    </li>
    <li>
    Seprai dan selimut berkualitas tinggi
    </li>
    <li>
    Kamar terhubung tersedia berdasarkan permintaan
    </li>
    <li>
    perlengkapan mandi, Mandi air panas & dingin dengan pancuran berdiri besar
    </li>
</ul>
  </div>
</div>
    </section>
    <!-- akhir fasilitas kamar -->

    
        <!-- home -->
        <section class="z-[999] home bg-yellow-400 w-fit p-3 rounded-2xl fixed bottom-5 right-5 opacity-30 hover:opacity-100">
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

    <footer>
    <div class="text-center bg-blue-800">
        <span class="text-sm text-white sm:text-center">© 2024 <a href="https://flowbite.com/" class="hover:underline">Kelompok 4</a>. All Rights Reserved. </span>
      </div>
    </footer>


    <!-- flowbite -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <!-- js -->
    <script src="src/js/script.js"></script>
</body>
</html>