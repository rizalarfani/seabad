<!DOCTYPE html>
<html lang="en">
<head>
	<title><?= $title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/vendor/bootstrap/css/bootstrap.min.css') ?>">

	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/css/util.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/login/css/main.css') ?>">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('<?= base_url('assets/login/images/bg-01.jpg') ?>');">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="post" action="<?= base_url('auth/register') ?>">
					<span class="login100-form-title p-b-49">
						Registrasi | SEABAD
					</span>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Username</span>
                                <input class="input100" type="text" name="username" placeholder="Type your username" value="<?= set_value('username') ?>">
								<?php echo form_error('username'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">NIK</span>
                                <input class="input100" type="text" name="nik" placeholder="Type your NIK" value="<?= set_value('nik') ?>">
								<?php echo form_error('nik'); ?>
                            </div>
                        </div>
                    </div>
					
                    
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" type="email" name="email" placeholder="Type your email" value="<?= set_value('email') ?>">
						<?php echo form_error('email'); ?>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">First Name</span>
                                <input class="input100" type="text" name="first_name" placeholder="Type your First Name" value="<?= set_value('first_name') ?>">
								<input type="hidden" name="group" value="5" >
								<?php echo form_error('first_name'); ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Last Name</span>
                                <input class="input100" type="text" name="last_name" placeholder="Type your Last Name" value="<?= set_value('last_name') ?>">
								<?php echo form_error('last_name'); ?>
                            </div>
                        </div>
                    </div>
                
					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input">Password</span>
						<input class="input100" type="password" name="pass" placeholder="Type your password" value="<?= set_value('pass') ?>">
						<?php echo form_error('pass'); ?>
					</div>
					<br>
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button class="login100-form-btn">
								Register
							</button>
						</div>
                    </div>
                    <div class="txt1 text-center p-t-10 ">
						<span>
							<a href="<?= base_url('auth/login_u') ?>">Sudah punya akun??Silahkan Login</a>
						</span>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	

	<script src="<?= base_url("assets/login/vendor/jquery/jquery-3.2.1.min.js") ?>"></script>
	<script src="<?= base_url('assets/login/vendor/bootstrap/js/bootstrap.min.js') ?>"></script>
	<script src="<?= base_url('assets/login/js/main.js') ?>"></script>

</body>
</html>