<?php
require "koneksi.php";

$kamar_id = $_GET["id"];

// query data pegawai berdasarka id
$sql = "SELECT * FROM kamar, tipekamar WHERE kamar.kamar_id = '$kamar_id' AND kamar.tipe_kamar_id = tipekamar.tipe_kamar_id ";
$hasil = $conn->query($sql);

// memanggil apabila tombol ubah di klik
if (isset($_POST["ubah"])) {
    $kamar_id = htmlspecialchars($_POST['kamar_id']);
    $nomor_kamar = htmlspecialchars($_POST['nomor_kamar']);
    $nama_tipe = htmlspecialchars($_POST['nama_tipe']);
    $booking_date = '[]';

    $query = "UPDATE kamar SET
    nomor_kamar = '$nomor_kamar',
    tipe_kamar_id = '$nama_tipe',
    booking_date = '$booking_date'
WHERE kamar_id = '$kamar_id'";

if (mysqli_query($conn, $query) === TRUE) {
    header("location: ../datakamar.php?ubah=true");
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
    <title>Form Edit Data Kamar</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
</head>

<body class="p-6 bg-blue-200">

<?php while ($kmr = $hasil->fetch_assoc()) { ?> 

    <div class="max-w-xl p-8 mx-auto bg-yellow-100 rounded shadow-md outline outline-2 outline-offset-2 outline-yellow-500">
        <h2 class="mb-3 text-2xl font-bold text-center text-slate-600 ">Edit Data Kamar</h2>
        <h6 class="mb-5 text-sm text-slate-500 ">*harap isi Data Kamar sesuai data yang ada</h6>

        <form action="" method="post" class="space-y-4 ">
            <div>
                <label for="kamar_id" class="block text-sm font-medium text-gray-600">ID Kamar</label>
                <input type="text" id="kamar_id" name="kamar_id" placeholder="KMR-1" class="w-full p-2 mt-1 border rounded-md " readonly value="<?php echo $kmr['kamar_id']; ?>">
            </div>
            <div>
                <label for="nomor_kamar" class="block text-sm font-medium text-gray-600">Nomor Kamar</label>
                <input type="text" id="nomor_kamar" name="nomor_kamar" placeholder="2" class="w-full p-2 mt-1 border rounded-md " required value="<?php echo $kmr['nomor_kamar']; ?>">
            </div>
            <div>
                <label for="nama_tipe" class="block text-sm font-medium text-gray-600">Tipe Kamar</label>
                <select class="w-full p-2 mt-1 border rounded-md" name="nama_tipe">
                    <option selected value="<?php echo $kmr['tipe_kamar_id']; ?>"><?= $kmr['nama_tipe'] ?></option>
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
                <button type="submit" name="ubah" class="w-full p-2 text-white bg-blue-700 rounded-md hover:bg-blue-300">Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-center text-gray-600">Tidak ingin menambahkan data? <a href="../datakamar.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>

    <?php
    }
?>
</body>

</html>