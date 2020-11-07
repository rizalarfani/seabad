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
            <?php if($this->session->userdata('user')) : ?>
                <h3><?= $profile->username; ?></h3>
                <p><?= $profile->nik ?></p>
            <?php else : ?>
                <h3>Maaf anda belum login</h3>
            <?php endif; ?>
            </div>
        </div>
    </div>

    <br>
    <?= $this->session->flashdata('msg');
     ?>

    <div class="container">
        <div class="row justify-content-center profile-user">
            <div class="col-sm-10 col-10">
                <form method="post" action="<?= base_url('penyewa/data_users') ?>">
                    <div class="form-group">
                        <label for="username">username</label>
                        <input class="form-control" type="text" name="username" value="<?= $profile->username; ?>" >
                        <?php echo form_error('username'); ?>
                    </div>
                    <div class="form-group">
                        <label>Fist Name</label>
                        <input class="form-control" type="text" name="fist" value="<?= $profile->first_name; ?>">
                        <?php echo form_error('fist'); ?>
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input class="form-control" type="text" name="last" value="<?= $profile->last_name; ?>">
                        <?php echo form_error('last'); ?>
                    </div>
                    <div class="form-group">
                        <label>NIK</label>
                        <input class="form-control" type="text" name="nik" value="<?= $profile->nik; ?>">
                        <?php echo form_error('nik'); ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input class="form-control" type="email" name="email" value="<?= $profile->email ?>">
                        <?php echo form_error('email'); ?>
                    </div>
                    <div class="form-group">
                        <label>Company</label>
                        <input class="form-control" type="text" name="company" value="<?= $profile->company ?>">
                        <?php echo form_error('company'); ?>
                    </div>
                    <div class="form-group">
                        <label>NO Phone</label>
                        <input class="form-control" type="text" name="phone" value="<?= $profile->phone ?>">
                        <?php echo form_error('phone'); ?>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Update Profile</button>
                </form>
            </div>
        </div>
    </div>
    <br><br><br>


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