<?php
require "../build/pages/function/koneksi.php";


if (isset($_POST('submit'))) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $user =  "SELECT * FROM pegawai WHERE username = $username AND password = $password LIMIT 1";
    $result = mysqli_query($conn, $user)[0];

    if ($result != null) {
        $_SESSION['user'] = $username;
        $_SESSION['level'] = $user['posisi_id'];
        $_SESSION['login'] = true;
        header("Location: ../build/pages/dashboard.php");
    } else {
    }
}
