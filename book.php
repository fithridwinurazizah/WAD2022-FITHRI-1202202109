<?php
$mobil = $_GET['mobil'];
if($mobil == 'jazz'){
  $img ="https://carnetwork.s3.ap-southeast-1.amazonaws.com/file/61c667cd61d243e58a94cfd12f22f193.jpg";
} elseif($mobil == 'ertiga'){
  $img ="https://d2fgf7u961ce77.cloudfront.net/assets/static/img/variant/Brave-Khaki.png";
} elseif ($mobil == 'yaris'){
  $img ="https://www.toyota.astra.co.id/sites/default/files/2022-08/3-super-white.png";
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Mobil</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
    />
    <style>
      *{
        padding: 0;
        margin: 0;
        max-width: 100%;
      }
    </style>
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
    <div class="container text-center mb-3">
      <h4>Rent Your Car Now!</h4>
      <div class="row">
        <div class="col">
          <img
            src="<?= $img ?>" 
            alt=""
            class="img-fluid"
          />
        </div>
        <div class="col text-start">
          <div class="container">
            <form action="invoice.php" method="POST">
              <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="name"
                  readonly
                  name="name"
                  value="FITHRI_1202202109"
                />
              </div>
              <div class="mb-3">
                <label for="date" class="form-label">Book Date</label>
                <input type="date" class="form-control" id="date" name="date" />
              </div>
              <div class="mb-3">
                <label for="start-time" class="form-label">Start Time</label>
                <input
                  type="time"
                  class="form-control"
                  id="start-time"
                  name="start-time"
                />
              </div>
              <div class="mb-3">
                <label for="duration" class="form-label">Duration (Days)</label>
                <input
                  type="number"
                  class="form-control"
                  id="duration"
                  placeholder=""
                  name="duration"
                />
              </div>
              <div class="mb-3">
                <label for="car-type" class="form-label">Car Type</label>
                <select class="form-select" id="car-type" name="car-type">
                  <option selected>Select Your Car</option>
                  <option value="jazz">Jazz</option>
                  <option value="ertiga">Ertiga</option>
                  <option value="yaris">Yaris</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input
                  type="number"
                  class="form-control"
                  id="phone"
                  placeholder=""
                  name="phone"
                />
              </div>
              <label class="form-label">Add Service(s)</label>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="health"
                  id="health"
                  name="service[]"
                />
                <label class="form-check-label" for="health">
                  Health Protocol /Rp. 25.000
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="driver"
                  id="driver"
                  name="service[]"
                />
                <label class="form-check-label" for="driver">
                  Driver / Rp. 100.000
                </label>
              </div>
              <div class="form-check">
                <input
                  class="form-check-input"
                  type="checkbox"
                  value="full"
                  id="full"
                  name="service[]"
                />
                <label class="form-check-label" for="full">
                  Full Filled / Rp. 250.000
                </label>
              </div>
              <div class="d-grid gap-2">
                <button class="btn btn-success" type="submit">Book</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <footer class="mt-5 bottom-0" style="width: 100vw">
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
