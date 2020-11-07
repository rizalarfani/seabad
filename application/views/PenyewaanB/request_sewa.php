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
        <p>Request Alat Berat</p>
        <a href="<?= base_url('penyewa/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
        </a> 
    </nav>
    <!-- Akhir top bar -->

    <br><br><br>

    <br><br>
    <!-- Awal main -->
    <div class="row justify-content-center">
        <div class="col-sm-10 col-10">
            <div class="card border-warning mb-3">
                <div class="card-header">Request Sewa Alat Berat</div>
                <div class="card-body">
                    <form action="<?= base_url('penyewa/request_sewa/')?><?= $id_ken ?>" method="post">
                        <div class="form-group">
                            <label for="NIK">NIK</label>
                            <input id="nik" class="form-control" type="text" name="nik" value="<?= $GetNik->nik ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="Ke daraa ">Kendaraan </label>
                            <input class="form-control" type="text" name="kendaraan" value="<?= $GetKen->nm_kendaraan ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label for="tanggal ">Tanggal Awal </label>
                            <input class="form-control" type="date" name="awal">
                        </div>
                        <div class="form-group">
                            <label for="tanggal ">Tanggal Akhir </label>
                            <input class="form-control" type="date" name="akhir">
                        </div>
                        <div class="form-group">
                            <label for="pemakaian ">Rencana pemakaian </label>
                            <input class="form-control" type="text" name="pemakaian">
                        </div>
                        <div class="form-group">
                            <label for="lokasi ">Lokasi pengerjaan </label>
                            <input class="form-control" type="text" name="lokasi">
                        </div>
                        <div class="form-group">
                            <label>Pendanaan</label>
                            <select class="form-control" name="pendanaan">
                                <option>APBN</option>
                                <option>Swasta</option>
                            </select>
                        </div>
                        <button class="btn btn-outline-primary">Request Sewa</button>
                        <button class="btn btn-outline-warning">Kembali</button>
                    </form>
                </div>
            </div>
        </div>      
    </div>
    <br><br>
    <!-- akhir main -->

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
                        <a href="<?= base_url("penyewa/login") ?>">
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