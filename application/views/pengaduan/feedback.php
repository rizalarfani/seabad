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

    <nav class="navbar navbar-light bg-primary">
        <a href="<?= base_url('utama') ?>">
            <i class="fas fa-long-arrow-alt-left"></i>
        </a>
        <p>Feedback</p>
        <div class="dropdown">
            <button class="btn btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-sign-out-alt"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="<?= base_url("pengaduan/user") ?>">User</a>
                <a class="dropdown-item" href="<?= base_url('pengaduan/logout') ?>">logout</a>
            </div>
        </div>
    </nav>


<br><br>

    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-sm-5 col-5 cat-feedback mr-3">
                <a href="<?= base_url('pengaduan/feedback?cat=jalan') ?>">
                    <img src="<?= base_url('assets/img/icon_jalan.png') ?>" alt="Pengadua">
                    <h5>Jalan</h5>
                </a>
            </div>
            <div class="col-sm-5 col-5 cat-feedback mr-3">
                <a href="<?= base_url('pengaduan/feedback?cat=fasilitas_umum') ?>">
                    <img src="<?= base_url('assets/img/icon_pengaduan.png') ?>" alt="Pengadua">
                    <h5>Fasilitas umum</h5>
                </a>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-sm-5 col-5 cat-feedback mr-3">
                <a href="<?= base_url('pengaduan/feedback?cat=gedung') ?>">
                    <img src="<?= base_url('assets/img/icon_pengaduan.png') ?>" alt="Pengadua">
                    <h5>Gedung</h5>
                </a>
            </div>
            <div class="col-sm-5 col-5 cat-feedback mr-3">
                <a href="<?= base_url('pengaduan/feedback?cat=selokan_air') ?>">
                    <img src="<?= base_url('assets/img/icon_pengaduan.png') ?>" alt="Pengadua">
                    <h5>Selokan Air</h5>
                </a>
            </div>
        </div>
        <div class="row justify-content-center mb-3">
            <div class="col-sm-5 col-5 cat-feedback mr-3">
                <a href="<?= base_url('pengaduan/feedback?cat=jembatan') ?>">
                    <img src="<?= base_url('assets/img/icon_pengaduan.png') ?>" alt="Pengadua">
                    <h5>Jembatan</h5>
                </a>
            </div>
            <div class="col-sm-5 col-5 cat-feedback mr-3">
                <a href="<?= base_url('pengaduan/feedback?cat=kantor_pemerintahan') ?>">
                    <img src="<?= base_url('assets/img/icon_pengaduan.png') ?>" alt="Pengadua">
                    <h5>Kantor pemerintah</h5>
                </a>
            </div>
        </div>
    </div>


    <div class="navigationP">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-3 col-3">
                    <a href="<?= base_url("pengaduan") ?>">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </div>
                <div class="col-sm-3 col-3">
                    <a href="<?= base_url("pengaduan/cat_feedback") ?>" class="active">
                        <i class="fas fa-comment-dots"></i>
                        <p>Feedback</p>
                    </a>
                </div>
                <div class="col-sm-3 col-3">
                    <a href="<?= base_url("pengaduan/lapor_pengaduan") ?>">
                        <img src="<?= base_url('assets/img/icon_pengaduan.png') ?>" alt="Icon Penyewaan">
                        <p>Pengaduan</p>
                    </a>
                </div>
                <div class="col-sm-3 col-3">
                    <a href="<?= base_url("pengaduan/login") ?>">
                        <i class="fas fa-sign-in-alt"></i>
                        <p>Login/regis</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    
</body>
</html>