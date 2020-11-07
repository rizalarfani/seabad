<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?= $title ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,900|Playfair+Display:400,700,900 " rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/pengaduan/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/pengaduan/css/jquery-ui.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/pengaduan/css/owl.carousel.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/pengaduan/css/owl.theme.default.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/pengaduan/css/owl.theme.default.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/pengaduan/css/jquery.fancybox.min.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/pengaduan/css/bootstrap-datepicker.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/pengaduan/css/aos.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/pengaduan/css/style.css') ?>">

    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">

    <!-- file unutk dropzone -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/basic.min.css">
    <!-- Jquery ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  
  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>
   
    
    <header class="site-navbar py-4 js-sticky-header site-navbar-target" role="banner">

      <div class="container">
        <div class="row align-items-center">
          
          <!-- Image and text -->
          <nav class="navbar navbar-light">
            <a class="navbar-brand" href="<?= base_url('home') ?>">
              <img src="<?= base_url('assets/img/logo.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="Seabad">
              SeaBad
            </a>
          </nav>

          <div class="col-12 col-md-10 d-none d-xl-block">
            <nav class="site-navigation position-relative text-right" role="navigation">

              <ul class="site-menu main-menu js-clone-nav mr-auto d-none d-lg-block">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li><a href="#about" class="nav-link">About</a></li>
                <li><a href="#alur" class="nav-link">Alur Pengaduan</a></li>
                <li><a href="#pengaduan" class="nav-link">Pengaduan</a></li>
                <?php if ($this->session->userdata('user')) : ?>
                  <li><a href="<?= base_url('auth/logout_u') ?>" class="nav-link">Logout</a></li>
                <?php else : ?>
                  <li><a href="<?= base_url('auth/login_u') ?>" class="nav-link">Login</a></li>
                <?php endif; ?>
              </ul>
            </nav>
          </div>

          <div class="col-6 d-inline-block d-xl-none ml-md-0 py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black float-right"><span class="icon-menu h3"></span></a></div>

        </div>
      </div>
      
    </header>

    <div class="site-blocks-cover overlay" style="background-image: url(<?= base_url('assets/img/kota_tegal.jpg') ?>); balckground-size: cover;  " data-aos="fade" id="home">
      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-10 mt-lg-5 text-center">
            <br>
            <h1>Selamat datang aplikasi SEABAD Sewa alat berat dan pengaduan</h1>
            <p class="mb-5">Anda bingun untuk sewa alat berat di mana??,apakah anda juga bingun untuk pengadu keteka melihat jalan raya yang berlubang.Ini solusinya dengan mengunakan aplikasi seabad ini anda bisa sewa alat berat dan bisa mengadu ketika melihat jalan Rusak/Berlubang</p>
            <br>
          </div>
          </div>
        </div>
      </div>
      <a href="#howitworks-section" class="smoothscroll arrow-down"><span class="icon-arrow_downward"></span></a>
    </div>


    <section class="site-section border-bottom bg-light" id="about">
      <div class="container">
      <h2 class="section-title">About</h2>
        <div class="row justify-content-center">
          <div class="col-sm-6">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aut magni aliquid repellendus quae ipsam facere labore deleniti quaerat maiores et, rerum nulla, corporis sit id! Delectus sunt corrupti explicabo laborum! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, ad repudiandae quisquam nihil et beatae voluptate doloribus voluptatibus animi culpa perferendis harum, vel incidunt omnis accusamus, sed quas architecto placeat.</p>
          </div>
          <div class="col-sm-6">
            <img src="<?= base_url('assets/img/logo.png') ?>" class="img-fluid ml-5" alt="Logo Seabad">
          </div>
        </div>
      </div>
    </section>

    <section class="site-section border-buttom" id="pengaduan">
      <div class="container">
        <h2 class="section-title">Pengaduan</h2>
        <?= $this->session->flashdata('info');?>
        <div class="row justify-content-center">
          <div class="col-sm-8">
            <form action="<?= base_url('pengaduan/lapor_pengaduan') ?>" method="post" class="pengaduan">
              <div class="form-group">
                <label for="nik">NIK</label>
                <?php if ($this->session->userdata('user')) : ?>
                  <input type="text" id="nik" name="nik" placholder="<?= $nik->nik ?>" value="<?= $nik->nik ?>" class="form-control" readonly>
                <?php else : ?>
                  <input type="text" id="nik" name="nik" placholder="Silahkan login" class="form-control" readonly>
                <?php endif; ?>
              </div>
              <div class="form-group">
                <label for="Alamat jalan">Alamat jalan</label>
                <input type="text" name="alamat" class="form-control">
              </div>
              <div class="form-group">
                <label for="Deskripsi Laporan">Deskripsi Laporan</label>
                <textarea name="desc" class="form-control" rows="2"></textarea>
              </div>
              <div class="form-group">
                <label for="Upload gambar">Gambar</label>
                <input type="file" name="gambar" class="form-control">
              </div>
              <div class="form-group">
              <?php if ($this->session->userdata('user')) : ?>
                <button class="btn btn-block btn-info">Kirim</button>
              <?php else : ?>
                <span class="d-inline-block" data-toggle="popover" data-content="Disabled popover">
                  <button class="btn btn-block btn-primary" style="pointer-events: none;" type="button" disabled>Kirim</button>
                </span>
              <?php endif; ?>
              </div>
            </form>
          </div>
          <div class="col-sm-4">
            <h4 class="section-title">Info</h4>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eligendi itaque reiciendis assumenda, nemo dignissimos temporibus nisi consectetur ullam eum, saepe aut? Ipsum, labore tenetur reprehenderit quisquam beatae impedit ducimus optio Lorem, ipsum dolor sit amet consectetur adipisicing elit. Eum magni autem sapiente in soluta molestias reprehenderit ullam vel distinctio qui, adipisci voluptate suscipit error accusamus eius corrupti rerum natus numquam..</p>
          </div>
        </div>
      </div>
    </section>

    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-8">
            <div class="row">
              <div class="col-md-5">
                <h2 class="footer-heading mb-4">About Stated</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque facere laudantium magnam voluptatum autem. Amet aliquid nesciunt veritatis aliquam.</p>
              </div>
              <div class="col-md-3 ml-auto">
                <h2 class="footer-heading mb-4">Quick Links</h2>
                <ul class="list-unstyled">
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="#">Testimonials</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              
            </div>
          </div>
          <div class="col-md-4">
            <div class="mb-4">
              <h2 class="footer-heading mb-4">Subscribe Newsletter</h2>
            <form action="#" method="post" class="footer-subscribe">
              <div class="input-group mb-3">
                <input type="text" class="form-control border-secondary text-white bg-transparent" placeholder="Enter Email" aria-label="Enter Email" aria-describedby="button-addon2">
                <div class="input-group-append">
                  <button class="btn btn-primary text-black" type="button" id="button-addon2">Send</button>
                </div>
              </div>
            </form>  
            </div>
            
            <div class="">
              <h2 class="footer-heading mb-4">Follow Us</h2>
                <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
            </div>


          </div>
        </div>
       
      </div>
    </footer>

  </div> <!-- .site-wrap -->
  <script src="<?= base_url ('assets/pengaduan/js/jquery-3.3.1.min.js')?>"></script>
  <script src="<?= base_url ('assets/pengaduan/js/jquery-migrate-3.0.1.min.js')?>"></script>
  <script src="<?= base_url ('assets/pengaduan/js/jquery-ui.js')?>"></script>
  <script src="<?= base_url ('assets/pengaduan/js/popper.min.js')?>"></script>
  <script src="<?= base_url ('assets/pengaduan/js/bootstrap.min.js')?>"></script>
  <script src="<?= base_url ('assets/pengaduan/js/owl.carousel.min.js')?>"></script>
  <script src="<?= base_url ('assets/pengaduan/js/jquery.stellar.min.js')?>"></script>
  <script src="<?= base_url ('assets/pengaduan/js/jquery.countdown.min.js')?>"></script>
  <script src="<?= base_url ('assets/pengaduan/js/bootstrap-datepicker.min.js')?>"></script>
  <script src="<?= base_url ('assets/pengaduan/js/jquery.easing.1.3.js')?>"></script>
  <script src="<?= base_url ('assets/pengaduan/js/aos.js')?>"></script>
  <script src="<?= base_url ('assets/pengaduan/js/jquery.fancybox.min.js')?>"></script>
  <script src="<?= base_url ('assets/pengaduan/js/jquery.sticky.js')?>"></script>

  
  <script src="<?= base_url ('assets/pengaduan/js/main.js')?>"></script>
  </body>
</html>