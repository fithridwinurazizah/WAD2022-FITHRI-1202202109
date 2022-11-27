<?php
$user = "root";
$pass = "";
$host = "localhost";
$db = "showroom_Fithri_table";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>