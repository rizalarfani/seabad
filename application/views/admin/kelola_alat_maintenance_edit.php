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
        <li><a href="<?php echo base_url('index.php/admin');?>"><i class="fa fa-home"></i> <span>BERANDA</span></a></li>
        <li class="treeview active">
          <a href="#"><i class="fa fa-retweet"></i> <span>KELOLA ALAT BERAT</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/f_admin/kelola_alat');?>"><i class="fa fa-angle-double-right"></i> Daftar Alat Berat</a></li>
            <li><a href="<?php echo base_url('index.php/f_admin/kelola_alat/status_alat');?>"><i class="fa fa-angle-double-right"></i> Status Alat</a></li>
            <li class="active"><a href="<?php echo base_url('index.php/f_admin/kelola_alat/maintenance');?>"><i class="fa fa-angle-double-right"></i> Maintenance</a></li>
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
        <li class="treeview">
          <a href="#"><i class="fa fa-line-chart"></i> <span>LAPORAN</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('index.php/f_admin/laporan/kinerja_operator');?>"><i class="fa fa-angle-double-right"></i> KINERJA OPERATOR</a></li>
            <li><a href="<?php echo base_url('index.php/f_admin/laporan/status_alat_berat');?>"><i class="fa fa-angle-double-right"></i> STATUS ALAT BERAT</a></li>
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
        Kelola Alat
        <small>Pengelolaan Data Maintenance</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/f_admin/kelola_alat');?>"><i class="fa fa-retweet"></i> Kelola Alat</a></li>
        <li class="active">Maintenance</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="col-md-12">

          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Tambah Data Maintenance</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="col-md-10">

                <?php if($this->session->flashdata('info')): ?>
                  <div class="alert alert-warning">
                    <?php echo $this->session->flashdata('info'); ?>
                  </div>
                <?php endif; ?>
                <?php
                  $name = array(
                    'name'=>'addMaintenance',
                    'class'=>'form-horizontal'
                    ); 
                  echo form_open('f_admin/kelola_alat/edit_maintenance/'.$data_list->id,$name);
                ?>
                  <div class="form-group">
                    <label for="nm_kendaraan" class="col-sm-4 control-label">Nama Kendaraan</label>
                    <div class="col-sm-8">
                      <select id="nm_kendaraan" class="selectpicker form-control" data-live-search="true" name="nm_kendaraan">
                         <option value="<?php echo $data_list->id_kendaraan;?>" selected style="display:none;"><?php echo $data_list->nm_kendaraan.' '.$data_list->jns_kendaraan;?></option>
                         <?php foreach($kendaraan as $kendaraan){?>
                          <option value="<?php echo $kendaraan->id;?>"><?php echo $kendaraan->nm_kendaraan.' '.$kendaraan->jns_kendaraan;?></option>
                         <?php } ?>
                      </select>
                      <?php echo form_error('nm_kendaraan');?>
                    </div>
                  </div>                  

                  <div class="form-group">
                    <label for="tgl_awal" class="col-sm-4 control-label">Tanggal Awal</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="tgl_awal" name="tgl_awal" placeholder="yyyy/mm/dd" value="<?php echo $data_list->tglawalm;?>">
                      <?php echo form_error('tgl_awal');?>
                    </div>
                  </div>
                  <script>
                    $("#tgl_awal").datepicker();
                  </script>

                  <div class="form-group">
                    <label for="tgl_akhir" class="col-sm-4 control-label">Tanggal Akhir</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="tgl_akhir" name="tgl_akhir" placeholder="yyyy/mm/dd" value="<?php echo $data_list->tglakhirm;?>">
                      <?php echo form_error('tgl_akhir');?>
                    </div>
                  </div>
                  <script>
                    $("#tgl_akhir").datepicker();
                  </script>

                  <div class="form-group">
                    <label for="bengkel" class="col-sm-4 control-label">Bengkel</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="bengkel" name="bengkel" placeholder="Bengkel" value="<?php echo $data_list->bengkel;?>">
                      <?php echo form_error('bengkel');?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="alamat" class="col-sm-4 control-label">Alamat</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" value="<?php echo $data_list->alamat;?>">
                      <?php echo form_error('alamat');?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="jns_rusak" class="col-sm-4 control-label">Jenis Rusak</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="jns_rusak" name="jns_rusak" placeholder="Jenis Rusak" value="<?php echo $data_list->jenisrusak;?>">
                      <?php echo form_error('jns_rusak');?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="nilai" class="col-sm-4 control-label">Nilai</label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nilai" name="nilai" placeholder="Nilai" value="<?php echo $data_list->nilai;?>">
                      <?php echo form_error('nilai');?>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="col-sm-offset-4 col-sm-8">
                      <button type="submit" name="submit" value="submit" class="btn btn-default">Simpan</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>             
            <!-- /.box-body -->      
          </div>

        <!-- /.col -->
      </div>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->