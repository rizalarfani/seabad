<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar-toggler mini 50x50 pixels -->
      <img class="logo-mini" alt="S AB" src="<?php echo base_url('assets/img/sialbert50x50.png');?>">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SEABAD</b></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img src="<?php echo base_url('assets/img/user.png');?>" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo $user->first_name;?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="<?php echo base_url('assets/img/user.png');?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $user->first_name.' '.$user->last_name;?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?php echo base_url('index.php/setting');?>" class="btn btn-default btn-sm btn-flat"><i class="fa fa-gear"></i> Setting</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url('index.php/auth/logout');?>" class="btn btn-default btn-sm btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/img/user.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $user->first_name;?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>
        <!-- Optionally, you can add icons to the links -->
        <?php if($group->id==3){ ?>
          <li><a href="<?php echo base_url('index.php/pimpinan');?>"><i class="fa fa-home"></i> <span>BERANDA</span></a></li>
          <li class="treeview active">
            <a href="#"><i class="fa fa-line-chart"></i> <span>LAPORAN</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('index.php/f_admin/laporan/kinerja_operator');?>"><i class="fa fa-angle-double-right"></i> KINERJA OPERATOR</a></li>
              <li  class="active"><a href="<?php echo base_url('index.php/f_admin/laporan/status_alat_berat');?>"><i class="fa fa-angle-double-right"></i> STATUS ALAT BERAT</a></li>
              <li><a href="<?php echo base_url('index.php/f_admin/laporan/spj_vs_pendapatan');?>"><i class="fa fa-angle-double-right"></i> SPJ VS PENDAPATAN</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-file-text"></i> <span>LAPORAN PENDAPATAN</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('index.php/f_admin/laporan_pendapatan/pendapatan_per_alat');?>"><i class="fa fa-angle-double-right"></i> PENDAPATAN PER ALAT</a></li>
              <li><a href="<?php echo base_url('index.php/f_admin/laporan_pendapatan/pendapatan_per_jenis_alat');?>"><i class="fa fa-angle-double-right"></i> PENDAPATAN PER JENIS ALAT</a></li>
              <li><a href="<?php echo base_url('index.php/f_admin/laporan_pendapatan/pendapatan_semua_alat');?>"><i class="fa fa-angle-double-right"></i> PENDAPATAN SEMUA ALAT</a></li>
            </ul>
          </li>

        <?php } else { ?>

          <li><a href="<?php echo base_url('index.php/admin');?>"><i class="fa fa-home"></i> <span>BERANDA</span></a></li>
          <li class="treeview">
            <a href="#"><i class="fa fa-retweet"></i> <span>KELOLA ALAT BERAT</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('index.php/f_admin/kelola_alat');?>"><i class="fa fa-angle-double-right"></i> Daftar Alat Berat</a></li>
              <li><a href="<?php echo base_url('index.php/f_admin/kelola_alat/status_alat');?>"><i class="fa fa-angle-double-right"></i> Status Alat</a></li>
              <li><a href="<?php echo base_url('index.php/f_admin/kelola_alat/maintenance');?>"><i class="fa fa-angle-double-right"></i> Maintenance</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-users"></i> <span>KELOLA USER</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('index.php/f_admin/kelola_user/user');?>"><i class="fa fa-angle-double-right"></i> USER</a></li>
              <li><a href="<?php echo base_url('index.php/f_admin/kelola_user/penyewa');?>"><i class="fa fa-angle-double-right"></i> PENYEWA</a></li>
            </ul>
          </li>
          <li class="treeview">
          <a href="#"><i class="fa fa-retweet"></i> <span>KELOLA PENGADUAN</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('pengaduan/data_pengaduan');?>"><i class="fa fa-angle-double-right"></i> Data pengaduan</a></li>
            <li><a href="<?php echo base_url('pengaduan/data_feedback');?>"><i class="fa fa-angle-double-right"></i> Data Feedback</a></li>
          </ul>
        </li>
          <li><a href="<?php echo base_url('index.php/f_admin/kelola_sewa');?>"><i class="fa fa-retweet"></i> <span>KELOLA SEWA</span></a></li>
          <li class="treeview active">
            <a href="#"><i class="fa fa-line-chart"></i> <span>LAPORAN</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('index.php/f_admin/laporan/kinerja_operator');?>"><i class="fa fa-angle-double-right"></i> KINERJA OPERATOR</a></li>
              <li  class="active"><a href="<?php echo base_url('index.php/f_admin/laporan/status_alat_berat');?>"><i class="fa fa-angle-double-right"></i> STATUS ALAT BERAT</a></li>
              <li><a href="<?php echo base_url('index.php/f_admin/laporan/spj_vs_pendapatan');?>"><i class="fa fa-angle-double-right"></i> SPJ VS PENDAPATAN</a></li>
            </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-file-text"></i> <span>LAPORAN PENDAPATAN</span>
              <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('index.php/f_admin/laporan_pendapatan/pendapatan_per_alat');?>"><i class="fa fa-angle-double-right"></i> PENDAPATAN PER ALAT</a></li>
              <li><a href="<?php echo base_url('index.php/f_admin/laporan_pendapatan/pendapatan_per_jenis_alat');?>"><i class="fa fa-angle-double-right"></i> PENDAPATAN PER JENIS ALAT</a></li>
              <li><a href="<?php echo base_url('index.php/f_admin/laporan_pendapatan/pendapatan_semua_alat');?>"><i class="fa fa-angle-double-right"></i> PENDAPATAN SEMUA ALAT</a></li>
            </ul>
          </li>

        <?php } ?>
        
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Laporan
        <small>Laporan Status Alat Berat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/f_admin/laporan');?>"><i class="fa fa-line-chart"></i> Laporan</a></li>
        <li class="active">Status Alat Berat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="col-md-12">

        <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Data Status Alat Berat</h3>
              
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <?php if($this->session->flashdata('info')): ?>
                  <div class="alert alert-warning">
                    <?php echo $this->session->flashdata('info'); ?>
                  </div>
                <?php endif; ?>

                <?php
                    $name = array(
                      'name'=>'cekStatus',
                      'class'=>'form-inline',
                      'style'=>'margin-bottom:10px;'
                      ); 
                    echo form_open('f_admin/laporan/status_alat_berat/',$name);
                  ?>
                <div class="form-group">
                  <input type="text" name="tgl" id="tgl" class="form-control" placeholder="Pilih Tanggal">
                </div>
                <script>
                  $( "#tgl" ).datepicker();
                </script>
                  <button type="submit" name="submit" value="submit" class="btn btn-warning"><i class="fa fa-search"></i> Cek</button>
              </form>

               <?php if(!$data_list==null){?>
                <table id="status" class="table table-condensed table table-hover table-bordered table-striped" cellspacing="0">
              <?php }else{?>
                <table class="table table-condensed table table-hover  table-bordered table-striped" cellspacing="0">
              <?php }?>
                <thead>
                <tr>
                  <th>No</th>
                  <th>Tanggal</th>
                  <th>Nama Kendaraan</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  if(!$data_list==null){
                    foreach($data_list as $dt){ ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $tanggal;?></td>
                      <td><?php echo $dt->nm_kendaraan.' '.$dt->jns_kendaraan;?></td>
                      <td class="text-center">

                      <?php if($dt->status==1){?>
                          <span class="label label-success">Available</span>
                      <?php } else if($dt->status==2){?>
                          <span class="label label-warning">Pemeliharaan</span>
                      <?php } else if($dt->status==3){?>
                        <span class="label label-info">Swakelola</span>
                      <?php } else if($dt->status==4){?>
                        <span class="label label-default">Rusak</span>
                      <?php } else if($dt->status==5){?>
                        <span class="label label-danger">Sewa</span>
                      <?php }else{?>
                        -
                      <?php }?>

                        
                      </td>
                    </tr>
                  <?php } 
                 } else{ ?>
                  <tr>
                    <td colspan="4" class="text-center">Tidak Ada Data</td>
                  </tr>
                <?php } ?>
                  
                </tbody>
               </table>        
            </div>
            <!-- /.box-body -->
        </div>

        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script type="text/javascript">
    function functionDelete(url){
      swal({
        title: "Apakah Anda Yakin?",
        text: "Data yang telah dihapus tidak bisa dikembalikan!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Tidak, cancel!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm){
        if (isConfirm) {
          swal("Terhapus!", "Data pilihan anda telah dihapus!", "success");
            window.location = url;
        } else {
        swal("Cancelled", "Data pilihan anda tidak dihapus!", "error");
        }
      });
    }
  </script>