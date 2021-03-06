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

    <title><?= $title; ?></title>
</head>
<body>

    <!-- Awal Top bar  -->
    <nav class="navbar navbar-light bg-primary">
        <a href="<?= base_url('index.php/utama') ?>">
            <i class="fas fa-long-arrow-alt-left"></i>
        </a>
        <p>Data alat berat</p>
        <a href="<?= base_url('penyewa/logout') ?>">
            <i class="fas fa-sign-out-alt"></i>
        </a> 
    </nav>
    <!-- Akhir top bar -->

    <br><br><br>

    <br>
    <?php if ($this->session->userdata('user')) : ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div class="alert alert-primary" role="alert">
                        Silahkan anda bisa sewa
                    </div>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-12">
                    <div class="alert alert-danger" role="alert">
                        Maaf anda harus login dahulu untuk bisa melakuka Sewa!!
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

     <!-- Info kesalahan -->
     <?php echo $this->session->flashdata('msg');?>
    <!-- Akhir Info kesalahan -->


    <!-- Bagian data alat berat -->
    <div class="container">
        <div class="row justify-content-center">
        <?php foreach ($data_list as $key) : ?>
            <div class="col-sm-5 col-5 data_alat">
            <?php if ($key->status == 1 ) : ?>
                <a href="<?= base_url('Penyewa/request_sewa/') ?><?= $key->id ?>">
                    <img src="<?= base_url('assets/img/alat_berat/') ?><?= $key->gambar ?>" alt="Daftar alat berat">
                    <h6 class="mt-2"><?= $key->nm_kendaraan.'  ' . $key->jns_kendaraan ?></h6>
                    <p>Rp.<?= $key->biaya_sewa ?></p>

                    <table class="table">
                        <tr>
                            <td>Operator</td>
                            <td>Status</td>
                        </tr>
                        <tr>
                            <td>
                                <span class="badge badge-warning"><?= $key->operator ?></span>
                            </td>
                            <td>
                                <?php if($key->status==1){?>
                                    <span class="badge badge-primary">Available</span>
                                <?php } else if($key->status==2){?>
                                    <span class="badge badge-warning">Pemeliharaan</span>
                                <?php } else if($key->status==3){?>
                                    <span class="badge badge-info">Swakelola</span>
                                <?php } else if($key->status==4){?>
                                    <span class="badge badge-danger">Rusak</span>
                                <?php } else if($key->status==5){?>
                                    <span class="badge badge-danger">Sewa</span>
                                <?php }else{?>
                                -
                                <?php }?>
                            </td>
                        </tr>
                    </table>
                </a>
        <?php else : ?>
                
                <img src="<?= base_url('assets/img/alat_berat/') ?><?= $key->gambar ?>" alt="Daftar alat berat">
                <h4><?= $key->nm_kendaraan ?></h4>
                <p>Rp.<?= $key->biaya_sewa ?></p>

                <table class="table">
                    <tr>
                        <td>Operator</td>
                        <td>Status</td>
                    </tr>
                    <tr>
                        <td>
                            <span class="badge badge-warning"><?= $key->operator ?></span>
                        </td>
                        <td>
                            <?php if($key->status==1){?>
                                <span class="badge badge-primary">Available</span>
                            <?php } else if($key->status==2){?>
                                <span class="badge badge-warning">Pemeliharaan</span>
                            <?php } else if($key->status==3){?>
                                <span class="badge badge-info">Swakelola</span>
                            <?php } else if($key->status==4){?>
                                <span class="badge badge-danger">Rusak</span>
                            <?php } else if($key->status==5){?>
                                <span class="badge badge-danger">Sewa</span>
                            <?php }else{?>
                            -
                            <?php }?>
                        </td>
                    </tr>
                </table>
        <?php endif; ?>
            </div>
        <?php endforeach; ?>      
        </div>
    </div>
    <!-- Akhir Bagian data alat berat -->
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
                    <div class="icon-active">
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