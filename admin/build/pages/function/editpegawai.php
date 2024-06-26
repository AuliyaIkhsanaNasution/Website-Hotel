<?php
require "koneksi.php";

$pegawai_id = $_GET["id"];

// query data pegawai berdasarka id
$sql = "SELECT * FROM pegawai, posisi WHERE pegawai.pegawai_id = '$pegawai_id' AND pegawai.posisi_id = posisi.posisi_id";
$hasil = $conn->query($sql);

$error = '';

// memanggil apabila tombol submit di klik
if (isset($_POST["submit"])) {
    $email = htmlspecialchars($_POST['email']);
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $no_telepon = htmlspecialchars($_POST['no_telepon']);
    $posisi_id = htmlspecialchars($_POST['posisi_id']);
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);
    $password2 = htmlspecialchars($_POST['password2']);

    // check username di database, kecuali untuk username pegawai yang sedang diedit
    $check = mysqli_query($conn, "SELECT username FROM pegawai WHERE username='$username' AND pegawai_id != '$pegawai_id'");
    if (mysqli_fetch_assoc($check)) {
        $error = 'Username already exists.';
    } elseif ($password !== $password2) {
        $error = 'Passwords do not match.';
    } else {
        // Update data pegawai dalam database
        $query = "UPDATE pegawai SET email='$email', nama='$nama', alamat='$alamat', no_telepon='$no_telepon', posisi_id='$posisi_id', username='$username', password='$password' WHERE pegawai_id='$pegawai_id'";
        if ($conn->query($query) === TRUE) {
            header("location: ../datapegawai.php?edit=true");
            exit;
        } else {
            $error = "Error: " . $query . "<br>" . $conn->error;
        }
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
    <title>Form Edit Data Pegawai</title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script>
        // Function to display alert if there is an error
        function showAlert(message) {
            if (message) {
                alert(message);
            }
        }
    </script>
</head>

<body class="p-6 bg-blue-200" onload="showAlert('<?php echo $error; ?>')">


<?php while ($pgw = $hasil->fetch_assoc()) { ?> 

    <div class="max-w-xl p-8 mx-auto bg-yellow-100 rounded shadow-md outline outline-2 outline-offset-2 outline-yellow-500">
        <h2 class="mb-3 text-2xl font-bold text-center text-slate-600 ">Edit Data Pegawai</h2>
        <h6 class="mb-5 text-sm text-slate-500 ">*harap isi data Pegawai sesuai data yang ada</h6>
        <form action="" method="post" class="space-y-4 ">

            <div>
                <label for="email" class="block text-sm font-medium text-gray-600">Email Pegawai</label>
                <input type="text" id="email" name="email" placeholder="example@gmail.com" class="w-full p-2 mt-1 border rounded-md" required value="<?php echo $pgw['email']; ?>"></input>
            </div>
            <div>
                <label for="nama" class="block text-sm font-medium text-gray-600">Nama Pegawai</label>
                <input type="text" id="nama" name="nama" placeholder="Andini Lubisr" class="w-full p-2 mt-1 border rounded-md" required value="<?php echo $pgw['nama']; ?>">
            </div>
            <div>
                <label for="alamat" class="block text-sm font-medium text-gray-600">Alamat Pegawai</label>
                <input type="text" id="alamat_pegawai" name="alamat" placeholder="JL.Setia Budi" class="w-full p-2 mt-1 border rounded-md" required value="<?php echo $pgw['alamat']; ?>"></input >
            </div>
            <div>
                <label for="no_telepon" class="block text-sm font-medium text-gray-600">No Telephone</label>
                <input type="text" id="no_teleponr" name="no_telepon" placeholder="085159968152" class="w-full p-2 mt-1 border rounded-md" value="<?php echo $pgw['no_telepon']; ?>">
            </div>

            <div>

                <label for="posisi" class="block text-sm font-medium text-gray-600">Posisi Pegawai</label>
                <select class="w-full p-2 mt-1 border rounded-md" name="posisi_id">
                    <option selected value="<?php echo $pgw['posisi_id']; ?>"><?= $pgw['posisi'] ?></option>
                    <?php

                    $querypos = "SELECT * FROM posisi";
                    $resultPos = $conn->query($querypos);
                    while ($posisi = $resultPos->fetch_assoc()) :
                    ?>
                        <option value="<?= $posisi['posisi_id'] ?>"><?= $posisi['posisi'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div>
                <label for="username" class="block text-sm font-medium text-gray-600">Username Pegawai</label>
                <input type="text" id="username" name="username" placeholder="Andixxx" class="w-full p-2 mt-1 border rounded-md" required value="<?php echo $pgw['username']; ?>">
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-600">Password Pegawai</label>
                <input type="password" id="password" name="password" placeholder="xxxxxx" class="w-full p-2 mt-1 border rounded-md" required value="<?php echo $pgw['password']; ?>">
            </div>
            <div>
                <label for="password2" class="block text-sm font-medium text-gray-600">Konfirmasi Password Pegawai</label>
                <input type="password" id="password2" name="password2" placeholder="xxxxxx" class="w-full p-2 mt-1 border rounded-md" required value="<?php echo $pgw['password']; ?>">
            </div>
            <div>
                <button type="submit" name="ubah" class="w-full p-2 text-white bg-blue-700 rounded-md hover:bg-blue-300" >Simpan</button>
            </div>
        </form>
    </div>

    <p class="mt-4 text-lg text-center text-gray-600">Tidak ingin menambahkan data? <a href="../datapegawai.php" class="text-blue-700 no-underline hover:underline">Klik kembali</a></p>

    <?php
    }
?>
</body>

</html>