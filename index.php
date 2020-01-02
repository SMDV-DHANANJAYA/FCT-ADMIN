<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V3</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="Login_Section/images/icons/student.ico"/>
	<link rel="stylesheet" type="text/css" href="Login_Section/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Login_Section/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="Login_Section/fonts/iconic/css/material-design-iconic-font.min.css">
	<link rel="stylesheet" type="text/css" href="Login_Section/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="Login_Section/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="Login_Section/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="Login_Section/vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="Login_Section/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="Login_Section/css/util.css">
	<link rel="stylesheet" type="text/css" href="Login_Section/css/main.css">
    <!-- Custom fonts for this template (from dashboard) -->
    <link href="Dashboard/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template (from dashboard) -->
    <link href="Dashboard/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="Login_Section/css/custom.css" rel="stylesheet">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('Login_Section/images/bg-01.jpg');">
            <div class="wrap-login100 default">
                <div class="login">
                    <form action="index.php" method="POST" class="login100-form validate-form">
					<span class="login100-form-logo">
						<i class="fas fa-user-lock"></i>
					</span>

                        <span class="login100-form-title p-b-34 p-t-27">
						Log In
					</span>

                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input class="input100" type="text" name="username" placeholder="Username">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="contact100-form-checkbox float-left">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>

                        <div class="text-right float-right">
                            <a class="text-white forgot-password" id="forgot-Pass" style="cursor: pointer;">
                                Forgot password?
                            </a>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" name="login" class="login100-form-btn">
                                LOGIN
                            </button>
                        </div>

                        <div class="text-center mt-3 text-white">OR | Create New Account
                            <a class="txt1 sign-in" id="signIn" style="cursor: pointer;">
                                SIGN IN
                            </a>
                        </div>
                    </form>
                </div>
			</div>
		</div>
	</div>

	<script src="Login_Section/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="Login_Section/vendor/animsition/js/animsition.min.js"></script>
	<script src="Login_Section/vendor/bootstrap/js/popper.js"></script>
	<script src="Login_Section/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="Login_Section/vendor/select2/select2.min.js"></script>
	<script src="Login_Section/vendor/daterangepicker/moment.min.js"></script>
	<script src="Login_Section/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="Login_Section/vendor/countdowntime/countdowntime.js"></script>
	<script src="Login_Section/js/main.js"></script>

</body>
<script>
    $(document).ready(function(){
        //signup section
        $("#signIn").click(function(){
            $(".login").slideUp(500);
            $(".signin").slideDown(1000);
        });

        $("#logIn_SignIn").click(function(){
            $(".signin").slideUp(500);
            $(".login").slideDown(1000);
        });

        //forgot password section
        $("#forgot-Pass").click(function(){
            $(".login").slideUp(500);
            $(".forgot_pass").slideDown(1000);
        });

        $("#logIn_ForgotPass").click(function(){
            $(".forgot_pass").slideUp(500);
            $(".login").slideDown(1000);
        });
    });
</script>
</html>