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
        <p>Lapor Pengaduan</p>
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
            <p class="mb-3">Silahkan Laporkan kerusakan infrastuktur yang kamu lihat di sini</p>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col sm-10 col-10 login_pengaduan">
                <form action="<?= base_url('pengaduan/lapor_pengaduan') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="NIK">NIK</label>
                        <input id="nik" class="form-control" type="text" name="nik" value="<?= $nik->nik; ?>">
                        <p><?php echo form_error('nik');?></p>
                    </div>
                    <div class="form-group">
                        <label for="Nama">Nama Anda</label>
                        <input id="nama" class="form-control" type="text" name="nama" value="<?= $nik->first_name.' '.$nik->last_name; ?>">
                        <p><?php echo form_error('nama');?></p>
                    </div>
                    <div class="form-group">
                        <label for="desc">Descripsi Pengaduan</label>
                        <input id="desc" class="form-control" type="text" name="desc">
                        <p><?php echo form_error('desc');?></p>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Pengaduan</label>
                        <input id="alamat" class="form-control" type="text" name="alamat">
                        <p><?php echo form_error('alamat');?></p>
                    </div>
                    <div class="form-group">
                        <label for="Pilih_kategori">Pilih Kategori</label>
                        <select name="kategori" id="kategori" class="form-control">
                            <option seleted>Pilih Kendaraan</option>
                            <option value="jalan">Jalan</option>
                            <option value="gedung">Gedung</option>
                            <option value="jembatan">Jembatan</option>
                            <option value="fasilitas_umum">Fasilitas Umum</option>
                            <option value="kantor_pemerintah">Kantor pemerintah</option>
                            <option value="saluran_air">Saluran air</option>
                            <option value="lain_lain">Lain-Lain</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gambar">Foto infrastuktur</label>
                        <input id="foto_infrastuktur" class="form-control" type="file" name="foto_infrastuktur" accept="image/*" capture>
                    </div>
                    <div class="col-sm-12 col-12">
                        <button class="btn btn-block btn-info">Lapor Pengaduan</button>
                        <button class="btn btn-block btn-warning">Kembali</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <br><br>


    <div class="navigationP">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-3 col-3">
                    <a href="<?= base_url("pengaduan") ?>" class="">
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
                    <a href="<?= base_url("pengaduan/lapor_pengaduan") ?>" class="active">
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