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
            <li class="active"><a href="<?php echo base_url('index.php/f_admin/kelola_alat/status_alat');?>"><i class="fa fa-angle-double-right"></i> Status Alat</a></li>
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
        Kelola Alat Berat
        <small>Pengelolaan Status Alat Berat</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url('index.php/f_admin/kelola_alat');?>"><i class="fa fa-line-chart"></i> Kelola Alat Berat</a></li>
        <li class="active">Status Alat</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <div class="col-md-12">

        <div class="box box-warning">
          <div class="box-header with-border">
            <h3 class="box-title">Tambah Data Status</h3>

            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
              </button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-10">

              <?php if($this->session->flashdata('infoAdd')): ?>
                <div class="alert alert-warning">
                  <?php echo $this->session->flashdata('infoAdd'); ?>
                </div>
              <?php endif; ?>
              <?php
                $name = array(
                  'name'=>'addStatus',
                  'class'=>'form-horizontal'
                  ); 
                echo form_open('f_admin/kelola_alat/addStatus/',$name);
              ?>

                <div class="form-group">
                  <label for="nm_kendaraan" class="col-sm-4 control-label">Nama Kendaraan</label>
                  <div class="col-sm-8">
                    <select id="nm_kendaraan" class="selectpicker form-control" data-live-search="true" name="nm_kendaraan">
                         <option value="" disabled selected style="display:none;">-- Pilih Kendaraan --</option>
                         <?php foreach($list_kendaraan as $list){?>
                          <option value="<?php echo $list->id;?>"><?php echo $list->nm_kendaraan.' '.$list->jns_kendaraan;?></option>
                         <?php } ?>
                      </select>
                    <?php echo form_error('nm_kendaraan');?>
                  </div>
                </div>
                <div class="form-group">
                  <label for="jns_kendaraan" class="col-sm-4 control-label">Status</label>
                  <div class="col-sm-8">
                    <select id="status_kendaraan" class="selectpicker form-control" data-live-search="true" name="status" onchange="showLama()">
                         <option value="" disabled selected style="display:none;">-- Pilih Status --</option>
                         <?php foreach($list_status as $list){
                            if($list->id==1){

                            } else {
                          ?>
                          <option value="<?php echo $list->id;?>"><?php echo $list->status_kendaraan;?></option>
                         <?php } 
                          } ?>
                      </select>
                    <?php echo form_error('status');?>
                  </div>
                </div>

                <div class="form-group">
                  <label for="biaya_sewa" class="col-sm-4 control-label">Tanggal</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="tgl" name="tgl" placeholder="yyyy/mm/dd" value="<?php echo set_value('tgl');?>">
                    <?php echo form_error('tgl');?>
                  </div>
                </div>
                <script>
                  $("#tgl").datepicker();
                </script>

                <div id="divlama" class="form-group" style="display:none;">
                  <label for="lama" class="col-sm-4 control-label">Lama Sewa</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="lama" name="lama" placeholder="jumlah hari" value="<?php echo set_value('lama');?>">
                    <?php echo form_error('lama');?>
                  </div>
                </div>

                <script>
                  function showLama(){
                    var status = document.getElementById("status_kendaraan").value;
                    if (status==5){
                      $("#divlama").show();
                      document.getElementById("lama").value = "";
                    }else{
                      $("#divlama").hide();
                      document.getElementById("lama").value = 1;
                    }
                  }
                </script>                

                <div class="form-group">
                  <div class="col-sm-offset-4 col-sm-8">
                    <button type="submit" name="submit" value="submit" class="btn btn-default">Tambah</button>
                  </div>
                </div>
              </form>
            </div>
          </div>             
          <!-- /.box-body -->      
        </div>

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
            <div class="box-body table-responsive ">
              <?php if($this->session->flashdata('info')): ?>
                  <div class="alert alert-warning">
                    <?php echo $this->session->flashdata('info'); ?>
                  </div>
                <?php endif; ?>

               <?php if(!$data_list==null){?>
                <table id="status" class="table table-condensed table table-hover table-bordered table-striped" cellspacing="0">
              <?php }else{?>
                <table class="table table-condensed table table-hover table-bordered table-striped" cellspacing="0">
              <?php }?>
                <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Kendaraan</th>
                  <th>Tanggal</th>
                  <th>Lama Sewa</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                  if(!$data_list==null){
                    foreach($data_list as $dt){ ?>
                    <tr>
                      <td><?php echo $no++;?></td>
                      <td><?php echo $dt->nm_kendaraan.' '.$dt->jns_kendaraan;?></td>
                      <td><?php echo $dt->tgl_update;?></td>

                      <?php if($dt->id_status==5){?>
                        <td><?php echo $dt->lama.' Hari';?></td>
                      <?php } else{ ?>
                        <td class="text-center"> - </td>
                      <?php } ?>
                      <td class="text-center">

                      <?php if($dt->id_status==1){?>
                          <span class="label label-success"><?php echo $dt->status_kendaraan;?></span>
                      <?php } else if($dt->id_status==2){?>
                          <span class="label label-warning"><?php echo $dt->status_kendaraan;?></span>
                      <?php } else if($dt->id_status==3){?>
                        <span class="label label-info"><?php echo $dt->status_kendaraan;?></span>
                      <?php } else if($dt->id_status==4){?>
                        <span class="label label-default"><?php echo $dt->status_kendaraan;?></span>
                      <?php } else if($dt->id_status==5){?>
                        <span class="label label-danger"><?php echo $dt->status_kendaraan;?></span>

                      <?php }else{?>
                        -
                      <?php }?>

                      </td>
                      <td class="text-center">
                        <a href="#" onclick="functionDelete('<?php echo base_url('index.php/f_admin/kelola_alat/deleteStatus/'.$dt->id_kendaraan.'/'.$dt->tgl_update);?>')" class="btn btn-xs btn-danger"><i class="fa fa-trash"> Hapus</i></a>
                      </td>
                    </tr>
                  <?php } 
                 } else{ ?>
                  <tr>
                    <td colspan="6" class="text-center">Tidak Ada Data</td>
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