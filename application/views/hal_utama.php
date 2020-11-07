<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">

    <title><?= $title ?></title>
  </head>
  <body>
    
  <div style="background-image: url('<?= base_url('assets/banner_fix.jpeg') ?>');" class="jumbotron jumbotron-fluid">    
  </div>


  <div class="container">
    <a href="<?= base_url("penyewa/home") ?>">
      <div class="row info-panel">
        <div class="col-sm-4 col-4">
          <img src="<?= base_url('assets/img/icon_sewa.png') ?>" alt="Penyewaan">
        </div>
        <div class="col-sm-8 col-8">
          <h1>Penyewaan</h1>
          <p>Mudah nya menyewa alat berat dengan aplikasi ini</p>
        </div>
      </div>
    </a>
    <br><br>
    <a href="<?= base_url('pengaduan') ?>">
      <div class="row info-panel">
        <div class="col-sm-4 col-4">
          <img src="<?= base_url('assets/img/icon_pengaduan.png') ?>" alt="Penyewaan">
        </div>
        <div class="col-sm-8 col-8">
          <h1>Pengaduan</h1>
          <p>Melaporkan infrastuktur yang rusak dan kurang layak</p>
        </div>
      </div>
    </a>
  </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>