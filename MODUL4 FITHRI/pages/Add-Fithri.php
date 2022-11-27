<?php
session_start();
if($_SESSION['login'] != 1){
  header('Location: ../index.php');
}

if(isset($_SESSION['email'])){
  require '../config/connector.php';
  $email = $_SESSION['email'];
  $query = "SELECT * FROM users WHERE email = '$email'";
  $result = mysqli_query($koneksi, $query);
  $row = mysqli_fetch_assoc($result);
}

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
    <title>Add Data Mobil</title>
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
              <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="./ListCar-Fithri.php">My Cars</a>
            </li>
          </ul>
        </div>
        <?php
        if(isset($row)){ ?>
        <div class="dropdown ms-3">
          <button class="btn btn-light dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $row['nama'] ?>
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
      <div class="container mt-5">
        <h1>Tambah Mobil</h1>
        <p>Tambah Mobil Baru Anda Ke List Show Room</p>
        <form action="../config/insert.php" method="post" class="mt-5" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="nama_mobil" class="form-label">Nama Mobil</label>
            <input type="text" id="nama_mobil" class="form-control" name="nama_mobil"/>
          </div>
          <div class="mb-3">
            <label for="nama_pemilik" class="form-label">Nama Pemilik</label>
            <input type="text" id="nama_pemilik" class="form-control" name="nama_pemilik"/>
          </div>
          <div class="mb-3">
            <label for="merk" class="form-label">Merk</label>
            <input type="text" id="merk" class="form-control" name="merk"/>
          </div>
          <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Beli</label>
            <input type="date" id="tanggal" class="form-control" name="tanggal"/>
          </div>
          <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea
              name="deskripsi"
              id="deskripsi"
              class="form-control"
            ></textarea>
            <div class="mb-3 mt-3">
              <label for="foto" class="form-label">Foto</label>
              <input type="file" name="foto" id="foto" class="form-control" />
            </div>
            <label class="mt-3 mb-3" for="status">Status Pembayaran</label>
            <div class="mb-3">
                <input class="form-check-input" type="radio" name="status[]" id="status" value="lunas">
                <label class="form-check-label" for="status">
                    Lunas
                </label>
                <input class="form-check-input" type="radio" name="status[]" id="status2" value="belum lunas">
                <label class="form-check-label" for="status2">
                 Belum Lunas
                </label>
              </div>
            <button type="submit" class="btn btn-primary">Selesai</button>
        </form>
      </div>
    </main>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
