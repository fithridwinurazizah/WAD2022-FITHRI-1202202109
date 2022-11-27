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
  $row = mysqli_fetch_assoc($result);
}

$query = "SELECT * FROM tabel_mobil";
$result = mysqli_query($koneksi, $query);

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
    <title>List Car</title>
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
        <a class="btn btn-light" href='Add-Fithri.php'>Add Car</a>
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
      <div class="container">
        <h1>My Show Room</h1>
        <p class="text-secondary">List Show Room Fithri - 1202202109</p>
        <div class="list-card">
          <?php
          while($row = mysqli_fetch_assoc($result)){
          ?>
          <div class="card p-2 border border shadow-lg" style="width: 18rem">
            <img
              src="../asset/images/<?php echo $row['foto_mobil'] ?>"
              alt=""
            />
            <div class="card-body">
              <h5 class="card-title"><?= $row['nama_mobil'] ?></h5>
              <p class="card-text">
                <?= $row['deskripsi'] ?>
              </p>
              <a href=<?= "./Detail-Fithri.php?id=".$row['id'] ?> class="btn btn-primary">Details</a>
              <a  href=<?= "../config/delete.php?id=".$row['id'] ?>  class="btn btn-danger">Delete</a>
            </div>
          </div>
          <?php
          }
          ?>
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
