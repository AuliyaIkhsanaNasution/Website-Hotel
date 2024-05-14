<?php
require "koneksi.php";

// memanggil apabila tombol submit di klik
if (isset($_POST["submit"])) {
    $kamar_id = htmlspecialchars($_POST['kamar_id']);
    $nomor_kamar = htmlspecialchars($_POST['nomor_kamar']);
    $nama_tipe = htmlspecialchars($_POST['nama_tipe']);
    $booking_date = '[]';

    // pengecekan username apakah ada di database
    $result = mysqli_query($conn, "SELECT kamar_id FROM kamar WHERE kamar_id='$kamar_id'");

    if (mysqli_fetch_assoc($result)) {
        header("location: ?gagal=true");
        exit;
    }

    $query = "INSERT INTO kamar VALUES ('$kamar_id', '$nomor_kamar', '$nama_tipe', '$booking_date')";

    if ($conn->query($query) === TRUE) {
        header("location: ../datakamar.php?tambah=true");
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
    <title>Form Tambah Data Kamar</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="p-6 bg-blue-200">
    <div class="max-w-xl p-8 mx-auto bg-yellow-100 rounded shadow-md outline outline-2 outline-offset-2 outline-yellow-500">
        <h2 class="mb-3 text-2xl font-bold text-center text-slate-600 ">Tambah Data Kamar</h2>
        <h6 class="mb-5 text-sm text-slate-500 ">*harap isi data Pegawai sesuai data yang ada</h6>
        <form action="" method="post" class="space-y-4 ">
            <div>
                <label for="kamar_id" class="block text-sm font-medium text-gray-600">ID Kamar</label>
                <input type="text" id="kamar_id" name="kamar_id" placeholder="KMR-1" class="w-full p-2 mt-1 border rounded-md " required>
            </div>
            <div>
                <label for="nomor_kamar" class="block text-sm font-medium text-gray-600">Nomor Kamar</label>
                <input type="text" id="nomor_kamar" name="nomor_kamar" placeholder="2" class="w-full p-2 mt-1 border rounded-md " required>
            </div>
            <div>
                <label for="nama_tipe" class="block text-sm font-medium text-gray-600">Tipe Kamar</label>
                <select class="w-full p-2 mt-1 border rounded-md" name="nama_tipe">
                    <option selected>--Pilih Tipe Kamar--</option>
                    <?php

                    $querytipe = "SELECT * FROM tipekamar";
                    $resulttipe = $conn->query($querytipe);
                    while ($tipe = $resulttipe->fetch_assoc()) :
                    ?>
                        <option value="<?= $tipe['tipe_kamar_id'] ?>"><?= $tipe['nama_tipe'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>

            <div>
                <button type="submit" name="submit" class="w-full p-2 text-white bg-blue-700 rounded-md hover:bg-blue-300">Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-center text-gray-600">Tidak ingin menambahkan data? <a href="../datakamar.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

</html>