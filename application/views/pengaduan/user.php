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
        <p>Data user</p>
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

    <div class="jumbotron jumbotron-fluid" style="background-image: url('<?= base_url('assets/img/header-pengaduan.png') ?>');">
        <div class="container">
            <?php if ($this->session->userdata('username')) : ?>
                <h3 class="text-center"><?php echo $user->username; ?></h3>
                <h3 class="text-center"><?php echo $user->nik; ?></h3>
            <?php else : ?>
                <p>Maaf anda belum login</p>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($this->session->flashdata('info')) : ?>
    <div class="container">
        <div class="col-sm-10 col-10">
            <div class="alert alert-primary" role="alert">
                <?= $this->session->flashdata('info') ?>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <br><br>


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-5 col-5 panel-profile">
                <a href="<?= base_url('pengaduan/update_profile') ?>">
                    <i class="fas fa-user-edit"></i>
                    <p>Update Profile</p>
                </a>
            </div>
            <div class="col-sm-5 col-5 panel-profile ml-3">
                <a href="<?= base_url('pengaduan/history') ?>">
                    <i class="fas fa-history"></i>
                    <p>History pengaduan</p>
                </a>
            </div>
        </div>
    </div>



    <div class="navigationP">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-3 col-3">
                    <a href="<?= base_url("pengaduan") ?>" class="active">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </div>
                <div class="col-sm-3 col-3">
                    <a href="<?= base_url("pengaduan/cat_feedback") ?>">
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


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
</body>
</html>