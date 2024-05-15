<?php 
session_start();
if(isset($_SESSION['login'])) {
  header("Location: build/pages/dashboard.php");
}
?>

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

<?php 
if(isset($_GET['login'])  == "false") {
  echo "<script>
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Username atau Password yang anda masukkan salah!'
    })
  </script>";
}
?>

<body class="hidden-x-overflow bg-blue-50">
  <div class="absolute top-0 left-0 logo">
    <img src="build/assets/img/logo.png" alt="logo" class="w-20 bg-blue-500 shadow-md rounded-br-xl" />
  </div>

  <section class="flex flex-wrap content-center justify-evenly lg:pb-5 lg:pt-14">

    <form action="auth/login.php" method="post" class="w-2/3 mt-20 shadow-2xl p-5 rounded-lg lg:w-[40%] lg:m-10">


      <h1 class="mb-5 text-xl font-bold text-gray-800 lg:text-5xl lg:font-extrabold lg:mb-14">Selamat Datang Kembali 👋</h1>

      <label for="username" class="font-bold lg:text-xl">Username :</label><br />
      <input type="text" name="username" id="username" required class="block w-full mt-1 text-sm bg-white border rounded-md shadow-sm lg:p-2 border-slate-300 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-blue-800 invalid:text-yellow-500 focus:invalid:border-blue-500 focus:invalid:ring-blue-500" /><br />

      <label for="password" class="font-bold lg:text-xl">Password :</label><br />
      <input type="password" name="password" id="password" class="block w-full mt-1 text-sm bg-white border rounded-md shadow-sm lg:p-2 border-slate-300 placeholder-slate-400 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 disabled:bg-slate-50 disabled:text-slate-500 disabled:border-slate-200 disabled:shadow-none invalid:border-blue-800 invalid:text-yellow-500 focus:invalid:border-blue-500 focus:invalid:ring-blue-500" /><br />


      <button type="submit" name="submit" value="login" class="block p-2 px-4 py-2 m-auto font-semibold bg-yellow-300 border-2 border-blue-500 rounded-full hover:bg-yellow-500 hover:text-blue-900 hover:scale-110 lg:font-bold lg:text-lg lg:px-6 lg:py-3 lg:mt-5">
        Login
      </button>

      <p class="mt-6 text-lg text-gray-600">Bukan Pegawai? <a href="../index.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>

    </form>

    <div class="w-full mb-10 text-center lg:w-1/2 lg:m-5">
      <img src="build/assets/img/hotel.png" alt="mock" class="w-[80%] m-auto " />
      <h3 class="text-2xl font-bold text-gray-800 ms-3 lg:text-4xl lg:font-extrabold">Hotel Nuansa Nusantara ✔</h3>
      <p class="text-base italic font-semibold tracking-tight text-yellow-600 ms-3 lg:text-xl">"Hotel Indah, Dijamin Aman Dan Berkualitas"</p>
    </div>
  </section>

</body>

</html>