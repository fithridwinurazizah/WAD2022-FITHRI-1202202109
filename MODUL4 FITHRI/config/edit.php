<?php
if(isset($_POST['profile'])){
    $email = $_POST['email'];
    $user = mysqli_query($koneksi, "SELECT * FROM users WHERE email = '$email'");
    $row = mysqli_fetch_assoc($user);
    if($_POST['nama'] != ''){
        $new_nama = $_POST['nama'];
    }else{
        $new_nama = $row['nama'];
    }
    if($_POST['no'] != ''){
        $new_no = $_POST['no'];
    } else{
        $new_no = $row['no_hp'];
    }
    $query = "UPDATE users SET nama = '$new_nama', no_hp = '$new_no' WHERE email = '$email'";
    $resutl = mysqli_query($koneksi, $query);

    

}
if(isset($_POST['car'])){
    require "./connector.php";
    $id=$_POST['id'];
    $query="SELECT * FROM tabel_mobil WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    $row = mysqli_fetch_assoc($result);
    print_r($row);


    $foto = $_FILES['foto']['name'];
    if($_POST['nama_mobil'] != ''){
        $new_nama = $_POST['nama_mobil'];
    }else{
        $new_nama = $row['nama_mobil'];
    }
    if($_POST['nama_pemilik'] != ''){
        $new_pemilik = $_POST['nama_pemilik'];
    }else{
        $new_pemilik = $row['pemilik_mobil'];
    }
    if($_POST['merk'] != ''){
        $new_merk = $_POST['merk'];
    }else{
        $new_merk = $row['merk_mobil'];
    }
    if($_POST['tanggal'] != ''){
        $new_tanggal = $_POST['tanggal'];
    }else{
        $new_tanggal = $row['tanggal_beli'];
    }
    if($_POST['deskripsi'] != ''){
        $new_deskripsi = $_POST['deskripsi'];
    }else{
        $new_deskripsi = $row['deskripsi'];
    }
    if(isset($_POST['status'])){
    if($_POST['status'][0] != $row['status_pembayaran']){
        $new_status = $_POST['status'][0];
    }else{
        $new_status = $row['status_pembayaran'];
    }
    }else{
    $new_status = $row['status_pembayaran'];
    }
    if($foto != ""){
        $new_foto = $foto;
        unlink($path."/images/".$row['foto_mobil']);
        move_uploaded_file($tmp, $path."/images/".$new_foto);
    }else{
        $new_foto = $row['foto_mobil'];
    }

    $query = "UPDATE tabel_mobil SET nama_mobil='$new_nama', pemilik_mobil='$new_pemilik', merk_mobil='$new_merk', tanggal_beli='$new_tanggal', deskripsi='$new_deskripsi', status_pembayaran='$new_status', foto_mobil='$new_foto' WHERE id=$id";
    mysqli_query($koneksi, $query);
    header("Location: ../pages/ListCar-Fithri.php");
}
?>