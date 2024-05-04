<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/png" href="../../assets/img/logo.jpeg" />
    <title>Form Tambah Transaksi Pemesanan</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="bg-blue-100  p-6">
    <div class="max-w-xl mx-auto  rounded p-8 shadow-md outline outline-2  outline-offset-2 outline-yellow-500 bg-yellow-100">
        <h2 class="text-2xl font-bold mb-3 text-slate-600 text-center ">Tambah Transaksi Pemesanan</h2>
        <h6 class="text-sm  mb-5 text-slate-500 ">*harap isi Transaksi Pemesanan sesuai data yang ada</h6>
        <form action="prosestambahpemesananr.php" method="post" class="space-y-4 ">
            <div>
                <label for="id_pemesanan" class="block text-sm font-medium text-gray-600">ID Pemesanan</label>
                <input type="text" id="id_pemesanan" name="id_pemesanan" placeholder="masukkan id pemesanan"
                    class="mt-1 p-2 w-full border rounded-md " required>
            </div>            
            <div>
                <label for="id_customer" class="block text-sm font-medium text-gray-600">ID Customer</label>
                <input type="text" id="id_customer" name="id_customer" placeholder="masukkan id customer"
                    class="mt-1 p-2 w-full border rounded-md " required>
            </div> 
            <div>
                <label for="tanggal_booking" class="block text-sm font-medium text-gray-600">Tanggal Booking</label>
                <input type="date" id="tanggal_booking" name="booking" placeholder="tanggal_booking"
                    class="mt-1 p-2 w-full border rounded-md " required>
            </div>
            <div>
                <label for="tanggal_check_in" class="block text-sm font-medium text-gray-600">Tanggal check_in</label>
                <input type="date" id="tanggal_check_in" name="checkin" placeholder="tanggal_check_in"
                    class="mt-1 p-2 w-full border rounded-md " required>
            </div>
            <div>
                <label for="tanggal_check_out" class="block text-sm font-medium text-gray-600">Tanggal check_out</label>
                <input type="date" id="tanggal_check_out" name="checkout" placeholder="tanggal_check_out"
                    class="mt-1 p-2 w-full border rounded-md " required>
            </div>
            <div>
                <label for="jumlah_tamu" class="block text-sm font-medium text-gray-600">Jumlah Tamu</label>
                <input type="number" id="jumlah_tamu" name="jumlah_tamu" placeholder="masukkan id customer"
                    class="mt-1 p-2 w-full border rounded-md " required>
            </div> 
            <div>
                <label for="total_harga" class="block text-sm font-medium text-gray-600">Total Harga</label>
                <select  name="total_harga" id="total_harga" placeholder="masukkan total_harga"
                    class="mt-1 p-2 w-full border rounded-md" required> 
                    <option value="tersedia">1.000.000</option>
                    <option value="dipesan">600.000</option>
                    <option value="ditempati">800.000</option>
                </select>
            </div>
            <div>
                <label for="status_pemesanan" class="block text-sm font-medium text-gray-600">Status pemesanan</label>
                <select  name="status_pemesanan" id="status_pemesanan" placeholder="masukkan status_pemesanan"
                    class="mt-1 p-2 w-full border rounded-md" required> 
                    <option value="dikonfirmasi">Dikonfirmasi</option>
                    <option value="batal">Batal</option>
                    <option value="selesai">Selesai</option>
                </select>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../datapemesanan.php"
                class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

</html>
