<?php
    require_once("inc/connection.php");
    session_start();

    if (isset($_POST["login"])){
        $errors = array();
        $stnum = strtoupper(mysqli_real_escape_string($connection,$_POST["stnum"]));
        if (isset($_COOKIE["userDetails"])){
            $pass = mysqli_real_escape_string($connection,$_POST["password"]);
        }
        else{
            $pass = sha1(mysqli_real_escape_string($connection,$_POST["password"]));
        }
        $sql = "SELECT STUDENT_NUMBER,NAME,PASSWORD FROM student_details WHERE STUDENT_NUMBER='{$stnum}'";
        $result = mysqli_query($connection,$sql);
        $dbdata = mysqli_fetch_assoc($result);
        $name = explode(" ",$dbdata["NAME"]);
        if (!isset($_SESSION["userName"]) && ($_SESSION["userName"]) != $name[0]){
            if ($dbdata["STUDENT_NUMBER"] == $stnum){
                if ($dbdata["PASSWORD"] == $pass){
                    if (isset($_POST["remember-me"]) && $_POST["remember-me"] == "on"){
                        $data = $stnum . "|" . $pass;
                        setcookie('userDetails',$data,time() + 60 * 60 * 24);
                    }
                    else{
                        if (isset($_COOKIE["userDetails"])){
                            setcookie('userDetails',"",time() - 60);
                        }
                    }
                    $sql = "UPDATE student_details SET LAST_LOGIN=NOW(),STATE=1 WHERE STUDENT_NUMBER='{$stnum}'";
                    mysqli_query($connection,$sql);
                    $_SESSION["userName"] = $name[0];
                    $_SESSION["stnum"] = $stnum;
                    header("location: Dashboard/dashboard.php");
                }
                else{
                    /*$errors[] = "Password is invalid";*/
                    echo "Password is invalid";
                }
            }
            else{
                echo "Student Number is Invalid";
                /*$errors[] = "Student Number is Invalid";*/
            }
        }
        else{
            echo "User Already Log in";
            /*$errors[] = "User Already Log in";*/
        }
    }
    else if (isset($_POST["signin"])){
        $errors = array();
        $stnum = strtoupper(mysqli_real_escape_string($connection,$_POST["stnum"]));
        $name = strtoupper(mysqli_real_escape_string($connection,$_POST["name"]));
        $pass = sha1(mysqli_real_escape_string($connection,$_POST["password"]));
        $sql = "SELECT STUDENT_NUMBER FROM student_details WHERE STUDENT_NUMBER='{$stnum}'";
        $result = mysqli_query($connection,$sql);
        $dbdata = mysqli_fetch_assoc($result);
        if ($dbdata["STUDENT_NUMBER"] != $stnum){
            $sql = "INSERT INTO student_details(STUDENT_NUMBER,NAME,PASSWORD) VALUES('{$stnum}','{$name}','{$pass}')";
            $result = mysqli_query($connection,$sql);
            if ($result){
                header("location: index.php");
            }
            else{
                /*$errors[] = "Try again later time";*/
                echo "Try again later time";
            }
        }
        else{
            /*$errors[] = "User Create account already";*/
            echo "User Create account already";
        }
    }
    else if (isset($_POST["forget"])){
        $errors = array();
        $nic = strtoupper(mysqli_real_escape_string($connection,$_POST["nic"]));
        $pass = mysqli_real_escape_string($connection,$_POST["password"]);
        $re_pass = mysqli_real_escape_string($connection,$_POST["re-enter-pass"]);
        if ($pass == $re_pass){
            $sql = "SELECT NIC FROM student_details WHERE NIC='{$nic}'";
            $dbdata = mysqli_fetch_assoc(mysqli_query($connection,$sql));
            if ($dbdata["NIC"] == $nic){
                $pass = sha1($pass);
                $sql = "UPDATE student_details SET PASSWORD='{$pass}' WHERE NIC='{$nic}'";
                mysqli_query($connection,$sql);
                header("location: index.php");
            }
            else{
                /*$errors[] = "Invalid NIC Number";*/
                echo "Invalid NIC Number";
            }
        }
        else{
            /*$errors[] = "Password is not match";*/
            echo "Password is not match";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>FCT ADMIN - LOGIN</title>
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
                    <form action="index.php" method="POST" class="login100-form">
                        <span class="login100-form-logo">
                            <i class="fas fa-user-lock"></i>
                        </span>

                        <span class="login100-form-title p-b-34 p-t-27">
						Log In
					    </span>

                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input class="input100" type="text" name="stnum" placeholder="Student Number" value="<?php
                            if(isset($_COOKIE["userDetails"])){
                                $userDetails = explode("|",$_COOKIE["userDetails"]);
                                echo $userDetails[0];
                            }
                            ?>">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" name="password" placeholder="Password" value="<?php
                            if(isset($_COOKIE["userDetails"])){
                                $userDetails = explode("|",$_COOKIE["userDetails"]);
                                echo $userDetails[1];
                            }
                            ?>">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="contact100-form-checkbox float-left">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me" <?php
                            if(isset($_COOKIE["userDetails"])){
                                echo "checked";
                            }
                            ?>>
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
                <div class="forgot_pass">
                    <form action="index.php" method="POST" class="login100-form">
                        <span class="login100-form-logo">
                            <i class="fas fa-user-edit"></i>
                        </span>

                        <span class="login100-form-title p-b-34 p-t-27">
						    Forgot Password
					    </span>

                        <div class="wrap-input100 validate-input" data-validate = "Enter NIC Number">
                            <input class="input100" type="text" name="nic" placeholder="NIC Number">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Enter Password">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Enter Password">
                            <input class="input100" type="password" name="re-enter-pass" placeholder="Re Enter Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" name="forget" class="login100-form-btn">
                                RESET
                            </button>
                        </div>

                        <div class="text-center mt-3 text-white">OR |
                            <a class="txt1 sign-in" id="logIn_ForgotPass" style="cursor: pointer;">
                                LOG IN
                            </a>
                        </div>
                    </form>
                </div>
                <div class="signin">
                    <form action="index.php" method="POST" class="login100-form">
                        <span class="login100-form-logo">
                            <i class="fas fa-user-plus"></i>
                        </span>

                        <span class="login100-form-title p-b-34 p-t-27">
						    Sign In
					    </span>

                        <div class="wrap-input100 validate-input" data-validate = "Enter Student Number">
                            <input class="input100" type="text" name="stnum" placeholder="Student Number">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter Name">
                            <input class="input100" type="text" name="name" placeholder="User Name">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="password">
                            <input class="input100" type="password" name="password" placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="submit" name="signin" class="login100-form-btn">
                                SIGN IN
                            </button>
                        </div>

                        <div class="text-center mt-3 text-white">OR |
                            <a class="txt1 sign-in" id="logIn_SignIn" style="cursor: pointer;">
                                LOG IN
                            </a>
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