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
    
    <!-- Top bar -->
    <nav class="navbar navbar-light bg-primary">
        <a href="<?= base_url('index.php/utama') ?>">
            <i class="fas fa-long-arrow-alt-left"></i>
        </a>
        <p>Login</p> 
        <a href="<?= base_url('penyewa/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </nav>
    <!-- Akhir top bar -->

    <br><br><br><br>

    <div class="row justify-content-center">
        <img class="logo" src="<?= base_url('assets/img/Logo.png') ?>" alt="Logo Seabad">
    </div>
    <br><br>


    <div class="row justify-content-center">
        <div class="col-sm-8 col-8 login_p">
            <form action="<?= base_url('penyewa/login') ?>" method="post">
                <div class="form-group">
                    <label for="username">username</label>
                    <input id="username" class="form-control" type="text" name="username">
                </div>
                <div class="form-group">
                    <label for="password">password</label>
                    <input id="password" class="form-control" type="password" name="pass">
                </div>
                <button type="submit" class="btn btn-block btn-primary">Login</button>
            </form>
            <a href="<?= base_url('penyewa/registrasi') ?>">Belum punya akun?.Silahkan login</a>
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
                    <div class="icon-active">
                        <a href="<?= base_url("penyewa/registrasi") ?>">
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