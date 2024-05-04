<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="../../assets/img/logo.jpeg" />
    <title>Form Tambah Data Kamar</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="bg-blue-100  p-6">
    <div class="max-w-xl mx-auto  rounded p-8 shadow-md outline outline-2  outline-offset-2 outline-yellow-500 bg-yellow-100">
        <h2 class="text-2xl font-bold mb-3 text-slate-600 text-center ">Tambah Data kamar</h2>
        <h6 class="text-sm  mb-5 text-slate-500 ">*harap isi data kamar sesuai data yang ada</h6>
        <form action="prosestambahkamar.php" method="post" class="space-y-4 ">
            <div>
                <label for="id" class="block text-sm font-medium text-gray-600">ID Kamar</label>
                <input type="text" id="id_kamar" name="id" placeholder="masukkan id kamar"
                    class="mt-1 p-2 w-full border rounded-md " required>
            </div>            
            <div>
                <label for="nomor" class="block text-sm font-medium text-gray-600">Nomor Kamar</label>
                <textarea id="nomor_kamar" name="nomor" placeholder="masukkan nomor kamar"
                    class="mt-1 p-2 w-full border rounded-md" required></textarea>
            </div>
            <div>
                <label for="tipe_kamar" class="block text-sm font-medium text-gray-600">Tipe Kamar</label>
                <select  name="tipe_kamar" id="tipe_kamar" placeholder="masukkan tipe_kamar"
                    class="mt-1 p-2 w-full border rounded-md" required> <option value="deluxe">deluxe-Twin Bed</option>
                    <option value="superior">Superior Twin Bed</option>
                </select>
            </div>
            <div>
                <label for="status_kamar" class="block text-sm font-medium text-gray-600">Status Kamar</label>
                <select  name="status_kamar" id="status_kamar" placeholder="masukkan status_kamar"
                    class="mt-1 p-2 w-full border rounded-md" required> 
                    <option value="tersedia">Tersedia</option>
                    <option value="dipesan">Dipesan</option>
                    <option value="ditempati">Ditempati</option>
                </select>
            </div>

        </form>
    </div>

    <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../datakamar.php"
                class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

</html>
