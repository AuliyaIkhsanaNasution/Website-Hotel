<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="../../assets/img/logo.jpeg" />
    <title>Form Tambah Data Tipe Kamar</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="bg-blue-100  p-6">
    <div class="max-w-xl mx-auto  rounded p-8 shadow-md outline outline-2  outline-offset-2 outline-yellow-500 bg-yellow-100">
        <h2 class="text-2xl font-bold mb-3 text-slate-600 text-center ">Tambah Data Tipe kamar</h2>
        <h6 class="text-sm  mb-5 text-slate-500 ">*harap isi data Tipe kamar sesuai data yang ada</h6>
        <form action="prosestambahtipekamar.php" method="post" class="space-y-4 ">
            <div>
                <label for="id" class="block text-sm font-medium text-gray-600">ID Tipe Kamar</label>
                <input type="text" id="id_tipekamar" name="id" placeholder="masukkan id tipe kamar"
                    class="mt-1 p-2 w-full border rounded-md " required>
            </div>            
            <div>
                <label for="nama_tipe" class="block text-sm font-medium text-gray-600">Nama Tipe</label>
                <textarea id="nama_tipe_kamar" name="nama_tipe" placeholder="masukkan nama_tipe kamar"
                    class="mt-1 p-2 w-full border rounded-md" required></textarea>
            </div>
            <div>
                <label for="varian" class="block text-sm font-medium text-gray-600">Varian Kamar</label>
                <select  name="varian" id="varian" placeholder="masukkan varian"
                    class="mt-1 p-2 w-full border rounded-md" required> <option value="deluxe">Sarapan</option>
                    <option value="superior">Tanpa Sarapan</option>
                </select>
            </div>
            <div>
                <label for="deskripsi" class="block text-sm font-medium text-gray-600">Deskripsi</label>
                <textarea id="deskripsi_kamar" name="deskripsi" placeholder="masukkan deskripsi kamar"
                    class="mt-1 p-2 w-full border rounded-md" required></textarea>
            </div>
            <div>
                <label for="harga_kamar" class="block text-sm font-medium text-gray-600">Harga Kamar/Malam</label>
                <select  name="harga_kamar" id="harga_kamar" placeholder="masukkan harga_kamar"
                    class="mt-1 p-2 w-full border rounded-md" required> 
                    <option value="tersedia">1.000.000</option>
                    <option value="dipesan">600.000</option>
                    <option value="ditempati">800.000</option>
                </select>
            </div>

        </form>
    </div>

    <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../datatipekamar.php"
                class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

</html>
