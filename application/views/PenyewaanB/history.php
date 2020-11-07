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


    <title><?= $title ?></title>
</head>
<body>

     <!-- Awal Top bar  -->
     <nav class="navbar navbar-light bg-primary">
        <a href="<?= base_url('penyewa/profile') ?>">
            <i class="fas fa-long-arrow-alt-left"></i>
        </a>
        <p>History Sewa</p> 
        <a href="<?= base_url('penyewa/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </nav>
    <!-- Akhir top bar -->


    <div class="container mt-5">
        <div class="row justify-content-center">
            <?php foreach ($history as $dt) :?>
                <div class="col-sm-10 col-10 panel-history mb-5">
                    <div class="icon">
                        <p><?php echo $no++ ?></p>
                    </div>
                    <a href="<?= base_url('Penyewa/detail_his/') ?><?php echo $dt->id ?>">
                        <div class="title">
                            <h4><?= $dt->nm_kendaraan.' '.$dt->jns_kendaraan; ?></h4>
                            <span class="badge badge-info"><?= $dt->tgl_awal_sewa ?></span>
                            <span class="badge badge-success"><?= $dt->renc_pemakaian ?></span>
                        </div>
                    </a>
                </div> 
            <?php endforeach; ?>
        </div>
    </div>



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
                    <div class="icon-active">
                        <a href="<?= base_url('penyewa/data_users') ?>">
                            <i class="fas fa-users"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</body>
</html>