
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="build/assets/img/logo.png" />
  <title>Login</title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- sweetalert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="hidden-x-overflow bg-blue-50">
  <div class="logo absolute top-0 left-0">
    <img src="build/assets/img/logo.png" alt="logo" class="w-20 bg-blue-500 rounded-br-xl shadow-sm" />
  </div>

  <section class="flex flex-wrap justify-evenly content-center lg:pb-5 lg:pt-14">

    <form action="build/pages/dashboard.php" method="post" class="w-2/3 mt-20 shadow-2xl p-5 rounded-lg lg:w-[40%] lg:m-10">


      <h1 class="text-xl font-bold mb-5 lg:text-5xl lg:font-extrabold lg:mb-14 text-gray-800">Selamat Datang Kembali 👋</h1>

      <label for="username" class="lg:text-xl font-bold">Username :</label><br />
      <input type="text" class="mt-1 block w-full lg:p-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-blue-800 invalid:text-yellow-500 focus:invalid:border-blue-500 focus:invalid:ring-blue-500" /><br />

      <label for="password" class="lg:text-xl font-bold">Password :</label><br />
      <input type="password" class="mt-1 block w-full lg:p-2 bg-white border border-slate-300 rounded-md text-sm shadow-sm placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-blue-800 invalid:text-yellow-500 focus:invalid:border-blue-500 focus:invalid:ring-blue-500" /><br />




      <button type="submit" value="login" class="block m-auto p-2 border-blue-500 border-2 rounded-full px-4 py-2 bg-yellow-300 font-semibold hover:bg-yellow-500 hover:text-blue-900 hover:scale-110 lg:font-bold lg:text-lg lg:px-6 lg:py-3 lg:mt-5">
        Login
      </button>

    </form>

    <div class="w-full mb-10 lg:w-1/2 lg:m-5">
      <img src="build/assets/img/hotel.png" alt="mock" class="w-[80%] m-auto " />
      <h3 class="text-gray-800 text-2xl font-bold ms-3 lg:text-4xl lg:font-extrabold">Hotel Nuansa Nusantara ✔</h3>
      <p class="text-base text-yellow-600 font-semibold ms-3 italic tracking-tight lg:text-xl">"Hotel Indah, Dijamin Aman Dan Berkualitas"</p>
    </div>
  </section>

</body>

</html>