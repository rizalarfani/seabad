<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- font awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">

    <title><?= $title; ?></title>
</head>
<body>

    <!-- Awal Top bar  -->
    <nav class="navbar navbar-light bg-primary">
        <a href="<?= base_url('index.php/utama') ?>">
            <i class="fas fa-long-arrow-alt-left"></i>
        </a>
        <p>Data alat berat</p>
        <a href="<?= base_url('penyewa/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
        </a> 
    </nav>
    <!-- Akhir top bar -->

    <br>
    <?php if ($this->session->userdata('user')) : ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div class="alert alert-primary" role="alert">
                        Silahkan anda bisa sewa
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div class="alert alert-danger" role="alert">
                        Maaf anda harus login dahulu untuk bisa melakuka Sewa!!
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- Bagian data alat berat -->
    <div class="container">
        <?php if ($cek <= 0) : ?>
            <h3>Maaf kendaraan yang anda cari tidak ada</h3>
        <?php else : ?>
            <?php foreach ($jns_kendaraan as $key) : ?>
            <div class="row justify-content-center">
                <div class="col-sm-5 col-5 data_alat">
                    <a href="<?= base_url('Penyewa/request_sewa/') ?><?= $key['id'] ?>">
                        <img src="<?= base_url('assets/img/download.jpg') ?>?" alt="Daftar alat berat">
                        <h4><?= $key['nm_kendaraan'] ?></h4>
                        <p>Rp.<?= $key['biaya_sewa'] ?></p>
                        <span class="badge badge-primary">Available</span>
                    </a>
                </div>  
            </div>
            <?php endforeach; ?>
        <?php endif; ?> 
    </div>
    <!-- Akhir Bagian data alat berat -->


    <!-- NAvigation Bar -->
    <div class="navigation">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-3 col-3">
                    <div class="icon">
                        <a href="<?= base_url("penyewa/home") ?>">
                            <i class="fas fa-home"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-3 col-3">
                    <div class="icon-active">
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