<?php 
require "koneksi.php";

// memanggil apabila tombol submit di klik
if (isset($_POST["submit"])) {
    $pegawai_id = htmlspecialchars($_POST['pegawai_id']);
    $email = htmlspecialchars($_POST['email']);
    $nama = htmlspecialchars ($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_telepon = htmlspecialchars($_POST['no_telepon']);
    $posisi_id = htmlspecialchars($_POST['posisi_id']);


    // pengecekan username apakah ada di database
    $result = mysqli_query($conn, "SELECT pegawai_id FROM pegawai WHERE pegawai_id='$pegawai_id'");

    if (mysqli_fetch_assoc($result)) {
        header("location: ?gagal=true");
        exit;
    }

    $query = "INSERT INTO pegawai VALUES ($pegawai_id, '$email', '$nama', '$alamat', '$no_telepon', '$posisi_id')";

    if ($conn->query($query) === TRUE) {
        header("location: ../datapegawai.php?tambah=true");
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

<body class="bg-blue-200  p-6">
    <div class="max-w-xl mx-auto  rounded p-8 shadow-md outline outline-2  outline-offset-2 outline-yellow-500 bg-yellow-100">
        <h2 class="text-2xl font-bold mb-3 text-slate-600 text-center ">Tambah Data Pegawai</h2>
        <h6 class="text-sm  mb-5 text-slate-500 ">*harap isi data Pegawai sesuai data yang ada</h6>
        <form action="" method="post" class="space-y-4 ">
            <div>
                <label for="pegawai_id" class="block text-sm font-medium text-gray-600">ID Pegawai</label>
                <input type="text" id="pegawai_id" name="pegawai_id" placeholder="876564325689754"
                    class="mt-1 p-2 w-full border rounded-md " required>
            </div>            
            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email Pegawai</label>
                <textarea id="email" name="email" placeholder="example@gmail.com"
                    class="mt-1 p-2 w-full border rounded-md" required></textarea>
            </div>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama Pegawai</label>
                <input type="text" id="nama" name="nama" placeholder="Andini Lubisr"
                    class="mt-1 p-2 w-full border rounded-md" required>
            </div>
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat Pegawai</label>
                <textarea id="alamat_pegawai" name="alamat" placeholder="JL.Setia Budi"
                    class="mt-1 p-2 w-full border rounded-md" required></textarea>
            </div>
            <div>
                <label for="no_telepon" class="block text-sm font-medium text-gray-600">No Telephone</label>
                <input type="text" id="no_teleponr" name="no_telepon" placeholder="085159968152"
                    class="mt-1 p-2 w-full border rounded-md" >
            </div>

            <div>
                <label for="posisi" class="block text-sm font-medium text-gray-600">Posisi Pegawai</label>
                <select class="mt-1 p-2 w-full border rounded-md" name="posisi_id">
                <option selected>--Pilih Posisi--</option>
            <?php
            include "koneksi.php";

                            $querypos = "SELECT * FROM posisi";
                            $result = $conn->query($querypos);
                            while ($posisi = $result->fetch_assoc()) :
                            ?>
                                <option value="<?= $posisi['posisi_id'] ?>"><?= $posisi['posisi'] ?></option>
                            <?php endwhile; ?></select>
            </div>
            <div>
                <button type="submit" name="submit"
                    class="w-full bg-blue-700 text-white p-2 rounded-md hover:bg-blue-300">Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-gray-600 text-center">Tidak ingin menambahkan data? <a href="../datapegawai.php"
                class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>
</body>

</html>
