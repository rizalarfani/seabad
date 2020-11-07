<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=  $tilte ?></title>

     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- font awasome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">


</head>
<body>

    <!-- Top bar -->
    <nav class="navbar navbar-light bg-primary">
        <a href="<?= base_url('index.php/utama') ?>">
            <i class="fas fa-long-arrow-alt-left"></i>
        </a>
        <p>Login</p> 
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
    <!-- Akhir top bar -->


    <br><br>

    <div class="row justify-content-center">
        <img class="logo" src="<?= base_url('assets/img/Logo.png') ?>" alt="Logo Seabad">
        
    </div>
    <h1 class="text-center">LOGIN - PENGADUAN</h1>
    <hr>
    <br><br>

    <?php if ($this->session->flashdata('info')) : ?>
    <div class="container">
        <div class="col-sm-10 col-10">
            <?= $this->session->flashdata('info') ?>
        </div>
    </div>
    <?php endif; ?>

    <br><br>

    <div class="container">
        <div class="row justify-content-center login_pengaduan">
            <div class="col-sm-10 col-10">
                <form method="post" action="<?= base_url('pengaduan/login') ?>">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input id="username" class="form-control" type="text" name="username" placeholder="username anda">
                        <p><?= form_error('username') ?></p>
                    </div>
                    <div class="form-group">
                        <label for="password">password</label>
                        <input id="password" class="form-control" type="password" name="password" placeholder="password anda">
                        <p><?= form_error('password') ?></p>
                    </div>
                    <div class="col-sm-12 col-12 btn">
                        <button class="btn btn-outline-primary btn-block">login</button>
                        <a href="<?= base_url('pengaduan/register') ?>">Belum punya akun</a>
                    </div>
                    <br>
                </form>
            </div>
        </div>
    </div>

    <br><br><br>

    <div class="navigationP">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-3 col-3">
                    <a href="<?= base_url("pengaduan") ?>" >
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
                    <a href="<?= base_url("pengaduan/login") ?>" class="active">
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