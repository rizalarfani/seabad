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
        <a href="<?= base_url('index.php/utama') ?>">
            <i class="fas fa-long-arrow-alt-left"></i>
        </a>
        <p>Profile user</p> 
        <a href="<?= base_url('penyewa/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </nav>
    <!-- Akhir top bar -->


    <div class="row">
        <div class="col-sm-12 col-12">
            <div class="jumbotron profile" style="background-image: url(<?= base_url('assets/img/jumbroton.jpg') ?>);">
            <?php if($this->session->userdata('user')) : ?>
                <h3><?= $profile->username; ?></h3>
                <p><?= $profile->nik ?></p>
            <?php else : ?>
                <h3>Maaf anda belum login</h3>
            <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="col-sm-10 col-10">
        <?php echo $this->session->flashdata('msg') ?>
    </div>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5 col-5 panel-profile">
                <a href="<?= base_url('penyewa/data_users') ?>">
                    <i class="fas fa-user-edit"></i>
                    <p>Update Profile</p>
                </a>
            </div>
            <div class="col-sm-5 col-5 panel-profile ml-3">
                <a href="<?= base_url('penyewa/history') ?>">
                    <i class="fas fa-history"></i>
                    <p>History Sewa</p>
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-sm-10 col-10 panel-profile mt-3">
                <a href="<?= base_url('penyewa/upload_documentasi') ?>">
                    <i class="fas fa-upload"></i>
                    <p>Upload Documentasi Pengerjaan</p>
                </a>
            </div>
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