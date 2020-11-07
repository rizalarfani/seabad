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


    <title><?php echo $title ?></title>
</head>
<body>

    <nav class="navbar navbar-light bg-primary">
        <a href="<?= base_url('utama') ?>">
            <i class="fas fa-long-arrow-alt-left"></i>
        </a>
        <p>Home</p>
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

    <div class="container">
        <div class="row justify-content-center">
            <?= $this->session->flashdata('info') ?>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-12 detail_pengaduan">
                <img src="<?= base_url('assets/img/pengaduan/') ?><?= $detail->foto ?>">
                <span class="badge badge-info">
                    <i class="fas fa-users"></i>
                    <?= $detail->nama_pengadu ?>
                </span>
            </div>
        </div>
        <br>
        <div class="row justify-content-center">
            <div class="col-sm-10 col-10 detail_pengaduan">
                <h5 class="text-center">Deskripsi Pengaduan</h5>
                <hr>
                <p><?= $detail->desc ?></p>
                <h5 class="text-center">Feedback Pengaduan</h5>
                <hr>
                <p><?= $detail->feedback ?></p>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-sm-10 col-10 login_pengaduan kompuntar_pengaduan">
                <h5 class="text-center">Komentar Pengaduan</h5>
                <hr>
                <form method="post" action="<?= base_url('pengaduan/addKomentar/') ?><?= $detail->id_feedback ?>">
                    <div class="form-group">
                        <label for="komntar">Kormentar</label>
                        <input class="form-control" id="komentar" name="komentar" type="text">
                    </div>
                    <div class="col-sm-12 col-12">
                        
                        <button type="submit" class="btn btn-info btn-block">Komentar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>    
    
    <div class="container">
        <div class="row justify-content-center mt-3">
            <div class="col-sm-10 col-10 kompuntar_pengaduan">
                <h5 class="text-center">Komentar Masyarakat</h5>
                <hr>
                <?php foreach( $komentar as $dt ) : ?>
                    <div class="komentar">
                        <h5><?= $dt->first_name .$dt->last_name ?></h5>
                        <span class="badge badge-primary"><?= $dt->nik ?></span>
                        <span class="badge badge-success"><?= $dt->date_created ?></span>
                        <p><?= $dt->isi_komentar ?></p>
                    </div>
                <?php endforeach; ?>
                <hr>
            </div>
        </div>
    </div>
    
    <br><br><br>

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

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>


