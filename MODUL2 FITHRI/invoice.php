<?php
$duration = $_POST['duration' ];
$checkoutDate = strtotime("+ $duration day", strtotime($_POST['']));
$total = 0;

if($_POST['car-type'] == 'jazz'){
  $total = 175000 * $duration;
}elseif($_POST['car-type'] == 'ertiga'){
  $total = 165000 * $duration;
}elseif($_POST['car-type'] == 'yaris'){
  $total = 180000 * $duration;
}
if(isset($_POST['service'])){ 
  foreach($_POST['service'] as $val){
    if($val == 'driver'){
      $total += 100000;
    }elseif($val == 'full'){
      $total += 250000;
  }elseif($val == 'health'){
      $total += 25000;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Invoice Book</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    />
  </head>
  <body>
    <header>
      <nav class="navbar bg-dark navbar-dark">
        <div
          class="container-fluid flex justify-content-center align-items-center"
        >
          <a class="navbar-brand" href="/index.html">Home</a>
          <a class="navbar-brand" href="/book.php?mobil=jazz">Booking</a>
        </div>
      </nav>
    </header>
    <div class="container text-center">
      <h4>Thank you for booking with us. Your invoice is below.</h4>
      <p>sadajhjdasdh</p>

      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Booking Number</th>
            <th scope="col">Name</th>
            <th scope="col">Check-In</th>
            <th scope="col">Check-Out</th>
            <th scope="col">Car Type</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Services</th>
            <th scope="col">Total Price</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row"><?= rand(0,10000) ?></th>
            <td><?= $_POST['name'] ?></td>
            <td><?= $_POST['date'] ?> <?= $_POST['start-time'] ?></td>
            <td><?= $checkoutDate ?> <?= $_POST['start-time'] ?></td>
            <td><?= $_POST['car-type'] ?></td>
            <td><?= $_POST['phone'] ?></td>
            <td>
              <?php
                if (isset($_POST[''])) {
                  foreach ($_POST['service'] as $service) {
                    ?>
                    <ul>
                      <li style="text-transform: capitalize;"><?= $service ?></li>
                    </ul>
              <?php
                  }
                }
                ?>
            </td>
            <td><?= $total ?></td>
          </tr>
        </tbody>
      </table>
    </div>

    <footer class="position-absolute mt-5 bottom-0" style="width: 100vw">
      <nav class="navbar bg-secondary text-white">
        <div
          class="container-fluid flex justify-content-center align-items-center"
        >
          <p>Created by FITHRI_1202202109</p>
        </div>
      </nav>
    </footer>
  </body>
</html>
