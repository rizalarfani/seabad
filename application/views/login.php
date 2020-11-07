<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SEABAD</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css');?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css');?>">
  <!-- My Custom CSS -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/login.css');?>">
  <link rel="shorcut icon" href="<?php echo base_url('assets/img/sialbert24x24.png');?>" types="images/x-icon">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body">

<div class="container-fluid form-login">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="panel-group">
				<div class="panel panel-primary">
			    	<div class="panel-heading">Login SEABAD</div>
			    	<div class="panel-body">
			    		<?php if($this->session->flashdata('info')): ?>
			    			<div class="alert alert-warning">
			    				<?php echo $this->session->flashdata('info'); ?>
			    			</div>
			    		<?php endif; ?>
			      		<?php
							$name = array(
								'name'=>'login',
								'class'=>'form-horizontal'
								); 
							echo form_open('auth/login',$name);
						?>
						  	<div class="form-group">
							    <label class="sr-only" for="username">Username</label>
							    <div class="input-group">
								    <div class="input-group-addon">
								    	<i class="fa fa-user"></i>
								    </div>
								    <input type="text" class="form-control" name="username" placeholder="Username">
							    </div>
							    <?php echo form_error('username');?>
							</div>
							<div class="form-group">
								<label class="sr-only" for="username">Password</label>
							    <div class="input-group">
								    <div class="input-group-addon">
								    	<i class="fa fa-lock"></i>
								    </div>
								    <input type="password" class="form-control" name="password" placeholder="Password">
							    </div>
							    <?php echo form_error('password'); ?>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-success submit" name="submit" value="Login">
							</div>
						</form>
			    	</div>
			    </div>
			</div>
		</div>
	</div>
</div>

<!-- Main Footer -->
  <footer class="text-center">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019.</strong> Squad SMIT 1
  </footer>

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php  echo base_url('assets/bootstrap/js/bootstrap.min.js');?>"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>