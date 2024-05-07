<?php 
require "koneksi.php";

// memanggil apabila tombol submit di klik
if (isset($_POST["submit"])) {
    $id_user = htmlspecialchars($_POST["id_user"]);
    $nama = htmlspecialchars($_POST["nama"]);
    $email = htmlspecialchars($_POST["email"]);
    $alamat = htmlspecialchars($_POST["alamat"]);
    $no_telepon = htmlspecialchars($_POST["no_telepon"]);


    // pengecekan username apakah ada di database
    $result = mysqli_query($conn, "SELECT user_id FROM user WHERE user_id='$id_user'");

    if (mysqli_fetch_assoc($result)) {
        header("location: ?gagal=true");
        exit;
    }

    $query = "INSERT INTO user VALUES ('$id_user', '$nama', '$email', '$alamat', '$no_telepon')";

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
    <link rel="icon" type="image/png" href="../../assets/img/logo.jpeg" />
    <title>Form Tambah Data Customer</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="bg-blue-100  p-6">
    <div class="max-w-xl mx-auto  rounded p-8 shadow-md outline outline-2  outline-offset-2 outline-yellow-500 bg-yellow-100">
        <h2 class="text-2xl font-bold mb-3 text-slate-600 text-center ">Tambah Data Customer</h2>
        <h6 class="text-sm  mb-5 text-slate-500 ">*harap isi data Customer sesuai data yang ada</h6>
        <form action="" method="post" class="space-y-4 ">
            <div>
                <label for="id_user" class="block text-sm font-medium text-gray-600">ID Customer</label>
                <input type="text" id="id_user" name="id_user" placeholder="masukkan id_user customer"
                    class="mt-1 p-2 w-full border rounded-md " required>
            </div>            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">email Customer</label>
                <textarea id="email" name="email" placeholder="masukkan email customer"
                    class="mt-1 p-2 w-full border rounded-md" required></textarea>
            </div>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama Customer</label>
                <input type="text" id="nama" name="nama" placeholder="masukkan nama customer"
                    class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat Customer</label>
                <textarea id="alamat_customer" name="alamat" placeholder="masukkan alamat customer"
                    class="mt-1 p-2 w-full border rounded-md" required></textarea>
            </div>
            <div>
                <label for="no_telepon" class="block text-sm font-medium text-gray-600">No Telephone</label>
                <input type="text" id="no_teleponr" name="no_telepon" placeholder="masukkan telepon customer"
                    class="mt-1 p-2 w-full border rounded-md" >
            </div>
            <div>
                <button type="submit" name="submit"
                    class="w-full bg-blue-700 text-white p-2 rounded-md hover:bg-blue-300">Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../datacustomer.php"
                class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

</html>
