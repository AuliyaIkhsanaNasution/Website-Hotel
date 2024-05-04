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
        <form action="prosestambahcustomer.php" method="post" class="space-y-4 ">
            <div>
                <label for="id" class="block text-sm font-medium text-gray-600">ID Customer</label>
                <input type="text" id="id_customer" name="id" placeholder="masukkan id customer"
                    class="mt-1 p-2 w-full border rounded-md " required>
            </div>            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">email Customer</label>
                <textarea id="email_customer" name="email" placeholder="masukkan email customer"
                    class="mt-1 p-2 w-full border rounded-md" required></textarea>
            </div>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama Customer</label>
                <input type="text" id="nama_customer" name="nama" placeholder="masukkan nama customer"
                    class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat Customer</label>
                <textarea id="alamat_customer" name="alamat" placeholder="masukkan alamat customer"
                    class="mt-1 p-2 w-full border rounded-md" required></textarea>
            </div>
            <div>
                <label for="telepon" class="block text-sm font-medium text-gray-600">No Telephone</label>
                <input type="text" id="telepon_customer" name="telepon" placeholder="masukkan telepon customer"
                    class="mt-1 p-2 w-full border rounded-md" >
            </div>
            <div>
                <button type="submit"
                    class="w-full bg-blue-700 text-white p-2 rounded-md hover:bg-blue-300">Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../datacustomer.php"
                class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

</html>
