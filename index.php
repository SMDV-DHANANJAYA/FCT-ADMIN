<?php
    require_once("inc/php/connection.php");
    session_start();

    if (isset($_GET["login"]) && ($_GET["login"] == "true")){
        $data = $_GET["stnum"];
        if (isset($_GET["remember"]) && ($_GET["remember"] == "true")){
            setcookie('userDetails',$data,time() + 60 * 60 * 24);
        }
        else{
            if (isset($_COOKIE["userDetails"])){
                setcookie('userDetails',"",time() - 60);
            }
        }
        $sql = "UPDATE student_details SET LAST_LOGIN=NOW(),STATE=1 WHERE STUDENT_NUMBER='{$data}'";
        mysqli_query($connection,$sql);

        $date = date("Y:M:d");
        $sql = "SELECT COUNT FROM visitors WHERE DAY='{$date}'";
        $result = mysqli_query($connection,$sql);
        $dataCount = mysqli_fetch_assoc($result);
        if (mysqli_num_rows($result) == 0){
            $sql = "INSERT INTO visitors(DAY,COUNT) VALUES('{$date}',1)";
            mysqli_query($connection,$sql);
        }
        else{
            $count = $dataCount["COUNT"] + 1;
            $sql = "UPDATE visitors SET COUNT={$count} WHERE DAY='{$date}'";
            mysqli_query($connection,$sql);
        }

        $_SESSION["userName"] = $_GET["name"];
        $_SESSION["stnum"] = $data;
        mysqli_close($connection);
        header("location: Dashboard/dashboard.php");
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
                    <!--<form action="index.php" method="POST" class="login100-form" name="login-form">-->
                        <span class="login100-form-logo">
                            <i class="fas fa-user-lock"></i>
                        </span>

                        <span class="login100-form-title p-b-34 p-t-27">
						Log In
					    </span>
                        <div id="login-error"></div>
                        <div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input class="input100" type="text" id="stnum-log" placeholder="Student Number" value="<?php
                            if(isset($_COOKIE["userDetails"])){
                                $userDetails = explode("|",$_COOKIE["userDetails"]);
                                echo $userDetails[0];
                            }
                            ?>">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter password">
                            <input class="input100" type="password" id="log-password" placeholder="Password">
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
                            <button type="button" name="login" class="login100-form-btn" onclick="checkUser('login')">
                                LOGIN
                            </button>
                        </div>

                        <div class="text-center mt-3 text-white">OR | Create New Account
                            <a class="txt1 sign-in" id="signIn" style="cursor: pointer;">
                                SIGN IN
                            </a>
                        </div>
                    <!--</form>-->
                </div>
                <div class="forgot_pass">
                    <!--<form action="index.php" method="POST" class="login100-form">-->
                        <span class="login100-form-logo">
                            <i class="fas fa-user-edit"></i>
                        </span>

                        <span class="login100-form-title p-b-34 p-t-27">
						    Forgot Password
					    </span>
                        <div id="forgot-error"></div>
                        <div class="wrap-input100 validate-input" data-validate = "Enter NIC Number">
                            <input class="input100" type="text" id="nic" placeholder="NIC Number">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Enter Password">
                            <input class="input100" type="password" id="forgot-password" placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate = "Enter Password">
                            <input class="input100" type="password" id="re-enter-pass" placeholder="Re Enter Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="button" name="forget" class="login100-form-btn" onclick="checkUser('forgot-pass')">
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
                    <!--<form action="index.php" method="POST" class="login100-form">-->
                        <span class="login100-form-logo">
                            <i class="fas fa-user-plus"></i>
                        </span>

                        <span class="login100-form-title p-b-34 p-t-27">
						    Sign In
					    </span>
                        <div id="signup-error"></div>
                        <div class="wrap-input100 validate-input" data-validate = "Enter Student Number">
                            <input class="input100" type="text" id="stnum-sign" placeholder="Student Number">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="Enter Name">
                            <input class="input100" type="text" id="name" placeholder="User Name">
                            <span class="focus-input100" data-placeholder="&#xf207;"></span>
                        </div>

                        <div class="wrap-input100 validate-input" data-validate="password">
                            <input class="input100" type="password" id="sign-password" placeholder="Password">
                            <span class="focus-input100" data-placeholder="&#xf191;"></span>
                        </div>

                        <div class="container-login100-form-btn">
                            <button type="button" name="signin" class="login100-form-btn" onclick="checkUser('signup')">
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

        <script>
            function checkUser(data){
                if (data == "login"){
                    var stnum = document.getElementById("stnum-log").value.toUpperCase();
                    var patt = /^(CT|ET|CS)\/201[5-7]\/[0-9]{3}$/g;
                    if (result = stnum.match(patt)){
                        var ajax = new XMLHttpRequest();
                        var method = "GET";
                        var url = "Login_Section/inc/logData.php?datatype=login&stnum="+stnum;
                        var asynchronous = true;

                        ajax.open(method,url,asynchronous);
                        ajax.send();

                        ajax.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200){
                                var data = JSON.parse(this.responseText);
                                if (data[0].STUDENT_NUMBER == stnum){
                                    var pass = CryptoJS.MD5(document.getElementById("log-password").value);
                                    if (data[0].PASSWORD == pass){
                                        if (data[0].STATE == 0){
                                            var name = data[0].NAME.split(" ");
                                            var remember = document.getElementById("ckb1").checked;
                                            var link="";
                                            if (remember == true){
                                                link = 'index.php?login=true&stnum='+stnum+'&remember=true&name='+name[0];
                                            }
                                            else {
                                                link = 'index.php?login=true&stnum='+stnum+'&name='+name[0];
                                            }
                                            window.location = link;
                                        }
                                        else{
                                            var msg = "<div class='alert alert-danger alert-dismissible fade show mb-5'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> User Already Log in.</div>";
                                            document.getElementById("login-error").innerHTML = msg;
                                        }
                                    }
                                    else{
                                        var msg = "<div class='alert alert-danger alert-dismissible fade show mb-5'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Invalid Password.</div>";
                                        document.getElementById("login-error").innerHTML = msg;
                                    }
                                }
                                else{
                                    var msg = "<div class='alert alert-danger alert-dismissible fade show mb-5'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Wrong Student Number.</div>";
                                    document.getElementById("login-error").innerHTML = msg;
                                }
                            }
                        }
                    }
                    else{
                        var msg = "<div class='alert alert-danger alert-dismissible fade show mb-5'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Wrong Student Number Type.</div>";
                        document.getElementById("login-error").innerHTML = msg;
                    }
                }
                else if(data == "forgot-pass"){
                    var nic = document.getElementById("nic").value.toUpperCase();
                    if (/\s/.test(nic)){
                        var msg = "<div class='alert alert-danger alert-dismissible fade show mb-5'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Invalid Nic Number Type.</div>";
                        document.getElementById("forgot-error").innerHTML = msg;
                    }
                    else{
                        var pass = document.getElementById("forgot-password").value;
                        var re_pass = document.getElementById("re-enter-pass").value;
                        if (pass == re_pass){
                            var ajax = new XMLHttpRequest();
                            var method = "GET";
                            var url = "Login_Section/inc/logData.php?datatype=repass&nic="+nic+'&password='+CryptoJS.MD5(pass);
                            var asynchronous = true;

                            ajax.open(method,url,asynchronous);
                            ajax.send();

                            ajax.onreadystatechange = function () {
                                if (this.readyState == 4 && this.status == 200){
                                    if(this.responseText == "true") {
                                        window.location = "index.php";
                                    }
                                    else{
                                        console.log(this.responseText);
                                    }
                                }
                            }
                        }
                        else{
                            var msg = "<div class='alert alert-danger alert-dismissible fade show mb-5'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Password Not Match.</div>";
                            document.getElementById("forgot-error").innerHTML = msg;
                        }
                    }
                }
                else if (data == "signup"){
                    var stnum = document.getElementById("stnum-sign").value.toUpperCase();
                    var patt = /^(CT|ET|CS)\/201[5-7]\/[0-9]{3}$/g;
                    if (result = stnum.match(patt)){
                        var pass = CryptoJS.MD5(document.getElementById("sign-password").value);
                        var name = document.getElementById("name").value.toUpperCase();
                        var department = stnum.split("/");

                        var ajax = new XMLHttpRequest();
                        var method = "GET";
                        var url = "Login_Section/inc/logData.php?datatype=signin&stnum="+stnum+"&name="+name+"&department="+department[0]+"&password="+pass;
                        var asynchronous = true;

                        ajax.open(method,url,asynchronous);
                        ajax.send();

                        ajax.onreadystatechange = function () {
                            if (this.readyState == 4 && this.status == 200){
                                if (this.responseText == "true"){
                                    window.location = "index.php";
                                }
                                else{
                                    console.log(this.responseText);
                                }
                            }
                        }
                    }
                    else{
                        var msg = "<div class='alert alert-danger alert-dismissible fade show mb-5'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Error!</strong> Invalid Student Number Type.</div>";
                        document.getElementById("signup-error").innerHTML = msg;
                    }
                }
            }
        </script>

	<script src="Login_Section/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--<script src="Login_Section/vendor/animsition/js/animsition.min.js"></script>-->
	<!--<script src="Login_Section/vendor/bootstrap/js/popper.js"></script>-->
	<script src="Login_Section/vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--<script src="Login_Section/vendor/select2/select2.min.js"></script>
	<script src="Login_Section/vendor/daterangepicker/moment.min.js"></script>
	<script src="Login_Section/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="Login_Section/vendor/countdowntime/countdowntime.js"></script>-->
	<script src="Login_Section/js/main.js"></script>
	<script src="Login_Section/js/md5.js"></script>
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