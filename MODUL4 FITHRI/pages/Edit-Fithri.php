<?php
require '../config/connector.php';
session_start();
if($_SESSION['login'] != 1){
  header('Location: ../index.php');
}

if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($koneksi, $query);
  $data = mysqli_fetch_assoc($result);
}

$query = "SELECT * FROM tabel_mobil where id = '$_GET[id]'";
$result = mysqli_query($koneksi, $query);
$row = mysqli_fetch_assoc($result);

if(!isset($_COOKIE['navbar'])){
  $navbar = 'bg-primary';
}else{
  $navbar = $_COOKIE['navbar'];
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../asset/style/styles.css" />
    <title>Edit Mobil</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg <?= $navbar ?> navbar-dark">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="../index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./ListCar-Fithri.php">My Cars</a>
            </li>
          </ul>
        </div>
        <?php
        if(isset($data)){ ?>
        <div class="dropdown ms-3">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $data['nama'] ?>
          </button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="./Profile-Fithri.php">Profile</a></li>
            <li><a class="dropdown-item" href="../config/logout.php">Log Out</a></li>
          </ul>
        </div>
        <?php
        }?>
      </div>
    </nav>
    <main>
      <div class="container">
        <h1><?= $row['nama_mobil'] ?></h1>
        <p>Detail Mobil <?= $row['nama_mobil'] ?></p>
        <div class="row">
          <div class="col">
            <div
              class="container d-flex justify-content-center align-items-center flex-column"
            >
            <img  src="../asset/images/<?php echo $row['foto_mobil'] ?>" alt="" class="img-fluid">
            </div>
          </div>
          <div class="col">
            <form action="../config/edit.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $row['id']?>"/>
          <div class="mb-3">
            <label for="nama_mobil" class="form-label">Nama Mobil</label>
            <input type="text" id="nama_mobil" class="form-control" name="nama_mobil" placeholder="<?= $row['nama_mobil'] ?>"/>
          </div>
          <div class="mb-3">
            <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
            <input type="text" id="nama_pemilik" class="form-control" name="nama_pemilik" placeholder="<?= $row['pemilik_mobil'] ?>"/>
          </div>
          <div class="mb-3">
            <label for="merk" class="form-label">Merk</label>
            <input type="text" id="merk" class="form-control" name="merk" placeholder="<?= $row['merk_mobil'] ?> "/>
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Beli</label>
            <input type="date" id="tanggal" class="form-control" name="tanggal" value="<?= $row['tanggal_beli'] ?>"/>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label> 
            <textarea
              name="deskripsi"
              id="deskripsi"
              class="form-control"
              placeholder="<?= $row['deskripsi'] ?>"
            ></textarea>
            <div class="mb-3 mt-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" name="foto" id="foto" class="form-control" />
            </div>
            <label class="mt-3 mb-3" for="status">Status Pembayaran</label>
            <div class="mb-3">
                <input class="form-check-input" type="radio" name="status[]" id="status" value="lunas" <?php if($row['status_pembayaran'] == 'lunas'){echo 'checked';} ?>>
                <label class="form-check-label" for="status">
                    Lunas
                </label>
                <input class="form-check-input" type="radio" name="status[]" id="status2" value="belum lunas"  <?php if($row['status_pembayaran'] == 'belum lunas'){echo 'checked';}?> >
                <label class="form-check-label" for="status2">
                 Belum Lunas
                </label>
              </div>
            <button name="car" type="submit" class="btn btn-primary">Update</button>
            </form>
          </div>
        </div>
      </div>
    </main>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
