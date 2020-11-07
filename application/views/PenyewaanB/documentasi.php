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
        <p>Profile user</p> 
        <a href="<?= base_url('penyewa/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
        </a>
    </nav>
    <!-- Akhir top bar -->

    <div class="row">
        <div class="col-sm-12 col-12">
            <div class="jumbotron profile" style="background-image: url(<?= base_url('assets/img/jumbroton.jpg') ?>);">
                <h1 class="text-center text-white">Upload Dokumentasi</h1>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-10 col-10">
                <?php echo $this->session->flashdata('msg') ?>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-10 col-10">
            <div class="card border-primary mb-3">
                <div class="card-header">
                    Upload foto documentasi
                </div>
                <div class="card-body">
                    <form action="<?= base_url('penyewa/upload_documentasi') ?>" method="post" enctype='multipart/form-data'>
                        <div class="form-group">
                            <label for="kendaraan">Pilih Kendaraan</label>
                            <select class="form-control" name="kendaraan">
                            <option seleted>Pilih Kendaraan</option>
                            <?php foreach($kendaraan as $knd) : ?>
                                <option value="<?= $knd->id_kendaraan ?>"><?php echo $knd->nm_kendaraan?></option>
                            <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="upload">Upload Foto</label>
                            <input id="upload" class="form-control" type="file" name="upload_kendaraan">
                        </div>
                        <div class="col-sm-12 col-12">
                            <button type="submit" name="submit" class="btn btn-block btn-primary">
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

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