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
        <p>Data alat Sewa</p>
        <a href="<?= base_url('penyewa/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
        </a> 
    </nav>
    <!-- Akhir top bar -->

     <!-- Info kesalahan -->
     <?php echo $this->session->flashdata('msg');?>
    <!-- Akhir Info kesalahan -->


    <!-- Bagian data alat berat -->
    <div class="container">
        <div class="row justify-content-center">
        <?php foreach ($data_list as $key) : ?>
            <div class="col-sm-5 col-5 data_alat">
            <?php if ($key->status == 5 ) : ?>
                <img src="<?= base_url('assets/img/alat_berat/') ?><?= $key->gambar ?>" alt="Daftar alat berat">
                <h6 class="mt-2"><?= $key->nm_kendaraan.'  ' . $key->jns_kendaraan ?></h6>
                <p>Rp.<?= $key->biaya_sewa ?></p>

                <table class="table">
                    <tr>
                        <td>Operator</td>
                        <td>Status</td>
                    </tr>
                    <tr>
                        <td>
                            <span class="badge badge-warning"><?= $key->operator ?></span>
                        </td>
                        <td>  
                            <span class="badge badge-danger">Sewa</span>   
                        </td>
                    </tr>
                </table>
            <?php endif; ?>
            </div>
        <?php endforeach; ?>      
        </div>
    </div>
    <!-- Akhir Bagian data alat berat -->
    <br><br>

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