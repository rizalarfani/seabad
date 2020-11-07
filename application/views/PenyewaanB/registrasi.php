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
        <p>Registrasi</p>
        <a href="<?= base_url('penyewa/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
        </a> 
    </nav>
    <!-- Akhir top bar -->

    <br><br><br>

    <?= $this->session->flashdata('msg');
     ?>

    <div class="alert alert-primary" role="alert">
    Registrasi hanya berlaku 3 hari dari proses registrasi online, segera lakukan verifikasi data dengan datang ke kantor DPUPR Kota Tegal untuk mendapatkan
    akses username dan password di sistem SEABAD, dengan membawa identitas diri/ perusahaan
    </div>
    

    <!-- Registrasi -->
    <div class="row justify-content-center">
        <div class="col-sm-10 col-10">
            <div class="card border-warning mb-3">
                <div class="card-header">Registrasi</div>
                <div class="card-body">
                    <form action="<?= base_url('penyewa/registrasi') ?>" method="post">
                        <div class="form-group">
                            <label for="NIK">NIK</label>
                            <input class="form-control" type="text" name="nik">
                        </div>
                        <div class="form-group">
                            <label for="Masukan nama ">Masukan nama </label>
                            <input class="form-control" type="text" name="nama">
                        </div>
                        <div class="form-group">
                            <label for="alamat ">Alamat KTP </label>
                            <input class="form-control" type="text" name="alamat">
                        </div>
                        <div class="form-group">
                            <label for="perusahaan ">Nama perusahaan </label>
                            <input class="form-control" type="text" name="perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="alamat perusahaan "> Alamat perusahaan </label>
                            <input class="form-control" type="text" name="almat_perusahaan">
                        </div>
                        <div class="form-group">
                            <label for="jabatan "> Jabatan </label>
                            <input class="form-control" type="text" name="jabatan">
                        </div>
                        <div class="form-group">
                            <label for="No "> Nomor HP </label>
                            <input class="form-control" type="text" name="no">
                        </div>
                        
                        <button class="btn btn-block btn-outline-primary" type="submit">Registrasi</button>
                        <p>Sudah punya akun??.<a href="<?= base_url('penyewa/login') ?>">Silahkan login</a></p>
                    </form>
                </div>
            </div>
        </div>      
    </div>
    <br><br>
    <!-- Akhir registrasi -->


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