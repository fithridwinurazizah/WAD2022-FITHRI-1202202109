<?php
require './connector.php';
// delete data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tabel_mobil WHERE id = '$id'";
    $result = mysqli_query($koneksi, $query);
    if ($result) {
        header('Location: ../pages/ListCar-Fithri.php');
    } else {
        echo "Gagal menghapus data";
    }
}

?>