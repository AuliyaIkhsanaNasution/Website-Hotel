<?php
require "koneksi.php";

// memanggil apabila tombol submit di klik
if (isset($_POST["submit"])) {
    $user_id = rand(1, 999999);
    $nik = htmlspecialchars($_POST["nik"]);
    $email = htmlspecialchars($_POST["email"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $no_telepon = htmlspecialchars($_POST["no_telepon"]);


    // pengecekan username apakah ada di database
    $result = mysqli_query($conn, "SELECT user_id FROM user WHERE user_id='$user_id'");

    if (mysqli_fetch_assoc($result)) {
        header("location: ?gagal=true");
        exit;
    }

    $query = "INSERT INTO user VALUES ($user_id, '$nik', '$email', '$nama', '$alamat', '$no_telepon')";

    if ($conn->query($query) === TRUE) {
        header("location: ../datacustomer.php?tambah=true");
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="../../assets/img/logo.png" />
    <title>Form Tambah Data Customer</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="p-6 bg-blue-200">
    <div class="max-w-xl p-8 mx-auto bg-yellow-100 rounded shadow-md outline outline-2 outline-offset-2 outline-yellow-500">
        <h2 class="mb-3 text-2xl font-bold text-center text-slate-600 ">Tambah Data Customer</h2>
        <h6 class="mb-5 text-sm text-slate-500 ">*harap isi data Customer sesuai data yang ada</h6>
        <form action="" method="post" class="space-y-4 ">
            <div>
                <label for="nik" class="block text-sm font-medium text-gray-600">NIK Customer</label>
                <input type="text" id="nik" name="nik" placeholder="876564325689754" class="w-full p-2 mt-1 border rounded-md " required>
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email Customer</label>
                <input type="email" id="email" name="email" placeholder="example@gmail.com" class="w-full p-2 mt-1 border rounded-md" required>
            </div>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama Customer</label>
                <input type="text" id="nama" name="nama" placeholder="Andini Lubisr" class="w-full p-2 mt-1 border rounded-md" required>
            </div>
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat Customer</label>
                <textarea id="alamat_customer" name="alamat" placeholder="JL.Setia Budi" class="w-full p-2 mt-1 border rounded-md" required></textarea>
            </div>
            <div>
                <label for="no_telepon" class="block text-sm font-medium text-gray-600">No Telephone</label>
                <input type="text" id="no_teleponr" name="no_telepon" placeholder="085159968152" class="w-full p-2 mt-1 border rounded-md">
            </div>
            <div>
                <button type="submit" name="submit" class="w-full p-2 text-white bg-blue-700 rounded-md hover:bg-blue-300">Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-center text-gray-600">Tidak ingin menambahkan data? <a href="../datacustomer.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

</html>