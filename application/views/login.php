<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login Layanan Konseling</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/login/images/'); ?>icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/'); ?>bootstrap/<?php echo base_url('assets/login/'); ?>bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/fonts/'); ?>font-awesome-4.7.0/<?php echo base_url('assets/login/'); ?>font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/'); ?>Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/'); ?>animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/'); ?>css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/'); ?>animsition/<?php echo base_url('assets/login/'); ?>animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/'); ?>select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/vendor/'); ?>daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/'); ?>util.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/login/css/'); ?>main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(<?php echo base_url('assets/login/images/'); ?>bg-01.jpg);">
                    <span class="login100-form-title-1">
                        Sign In
                    </span>
                </div>

                <form class="login100-form" action="<?php echo site_url('login/validasi'); ?>" method="POST" enctype="multipart/form-data" role="form">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username tidak boleh kosong">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Enter username">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="Password tidak boleh kosong">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Enter password">
                        <span class="focus-input100"></span>
					</div>
					
					<div style="color:red;"><?php echo $error; ?></div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div>
                            <a href="#" class="txt1">
                                Forgot Password?
                            </a>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/login/vendor/'); ?>jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/login/vendor/'); ?>animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/login/vendor/'); ?>bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url('assets/login/vendor/'); ?>bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/login/vendor/'); ?>select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/login/vendor/'); ?>daterangepicker/moment.min.js"></script>
    <script src="<?php echo base_url('assets/login/vendor/'); ?>daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/login/vendor/'); ?>countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="<?php echo base_url('assets/login/js/'); ?>main.js"></script>

</body>

</html> 