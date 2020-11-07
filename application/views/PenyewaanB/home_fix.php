<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- font awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">
    <!-- Modernizer Script for old Browsers -->
    <script src="<?php echo base_url('assets/js/modernizr-2.6.2.min.js');?>"></script>

    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">

    <script
    src="https://code.jquery.com/jquery-3.4.1.js"></script>

    <!-- Datapicter -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>

    <title><?= $title ?></title>
  </head>
  <body>
    <nav class="navbar navbar-light bg-primary">
        <a href="<?= base_url('index.php/utama') ?>">
            <i class="fas fa-long-arrow-alt-left"></i>
        </a>
        <p>Home</p>
        <a href="<?= base_url('penyewa/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
        </a> 
    </nav>

    <div class="jumbotron jumbotron-fluid" style="background-image: url('<?= base_url('assets/img/jumbroton.jpg') ?>');">
        <div class="container">
            <p class="mb-3">Selamat datang di penyewaan<br> Alat berat</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5 col-5 panel mr-3">
            <a href="<?= base_url('penyewa/data_alat') ?>">
                <div class="col-sm-1 col-1 float-left">
                    <img src="<?= base_url('assets/img/icon_sewa.png') ?>" alt="Daftar penyewa">
                </div>
                <div class="col-sm-8 col-8 float-right">
                    <p>Data alat berat</p>
                    <h3><?php echo $kendaraan ?></h3>
                </div>
            </a>
            </div>
            <br>
            <div class="col-sm-5 col-5 panel ml-3">
            <a href="<?= base_url('penyewa/data_alatSewa') ?>">
                <div class="col-sm-1 col-1 float-left">
                    <img src="<?= base_url('assets/img/icon_sewa.png') ?>" alt="Daftar penyewa">
                </div>
                <div class="col-sm-8 col-8 float-right">
                    <p>Data sewa alat</p>
                    <h3><?php echo $sewa ?></h3>
                </div>
            </a>
            </div>
        </div>
        <br><br>
        <div class="col-sm-12 col-12">
            <h3>Jenis Alat Berat</h3>
            <hr>
        </div>
        <div class="row jenis_kendaraan">
            <div class="col-sm-3 col-3">
                <a href="<?= base_url('penyewa/jns_kendaraan/BACKHODE_LOADER') ?>">
                    <img src="<?= base_url("assets/img/excavators1.png") ?>" alt="Jenis kendaraan">
                </a>
            </div>
            <div class="col-sm-3 col-3">
                <a href="<?= base_url('penyewa/jns_kendaraan/WALLS') ?>">
                    <img src="<?= base_url("assets/img/brickwall1.png") ?>" alt="Jenis kendaraan">
                </a>
            </div>
            <div class="col-sm-3 col-3">
                <a href="<?= base_url('penyewa/jns_kendaraan/DUMP TRUCK') ?>">
                    <img src="<?= base_url("assets/img/dump-truck1.png") ?>" alt="Jenis kendaraan">
                </a>
            </div>
            <div class="col-sm-3 col-3">
                <a href="<?= base_url('penyewa/jns_kendaraan/JACK HAMMER') ?>">
                    <img src="<?= base_url("assets/img/jackhammer1.png") ?>" alt="Jenis kendaraan">
                </a>
            </div>
        </div>
        <br><br>
    </div>


    <div class="container">
        <form action="<?= base_url('penyewa/cek_ketersedian') ?>" method="post">
            <div class="row">
                <div class="col-sm-8 col-8">  
                    <div class="form-group">
                        <label for="cek">Cek ketersedian</label>
                        <input class="form-control" type="text" name="cek" id="cek" placeholder="Pilih Tanggal" >
                    </div>
                    <script>
                        $( "#cek" ).datepicker();
					</script> 
                </div>
                <div class="col-sm-4 col-4">
                    <button class="btn btn-block btn-primary  mt-4">
                        <i class="fa fa-search mr-2"></i>cari
                    </button>
                </div>
            
            </div>
        </form>
    <br><br><br>
    </div>
    

    <!-- NAvigation Bar -->
    <div class="navigation">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-3 col-3">
                    <div class="icon-active">
                        <a href="<?= base_url("penyewa/home") ?>">
                            <i class="fas fa-home"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-3 col-3">
                    <div class="icon">
                        <a href="<?= base_url('penyewa/data_alat') ?>">
                            <img src="<?= base_url('assets/img/icon_sewa.png') ?>" alt="Icon Penyewaan">
                        </a>
                    </div>
                </div>
                <div class="col-sm-3 col-3">
                    <div class="icon">
                        <a href="<?= base_url('penyewa/login') ?>">
                            <i class="fas fa-sign-in-alt"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-3 col-3">
                    <div class="icon">
                        <a href="<?= base_url('penyewa/profile') ?>">
                            <i class="fas fa-users"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

  </body>
</html>