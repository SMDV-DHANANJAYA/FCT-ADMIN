//login

/*$errors = array();
$stnum = strtoupper(mysqli_real_escape_string($connection,$_POST["stnum"]));
/*if (isset($_COOKIE["userDetails"])){
$pass = mysqli_real_escape_string($connection,$_POST["password"]);
}
else{
$pass = sha1(mysqli_real_escape_string($connection,$_POST["password"]));
}
$pass = sha1(mysqli_real_escape_string($connection,$_POST["password"]));
$sql = "SELECT STUDENT_NUMBER,NAME,PASSWORD,STATE FROM student_details WHERE STUDENT_NUMBER='{$stnum}'";
$result = mysqli_query($connection,$sql);
$dbdata = mysqli_fetch_assoc($result);
$name = explode(" ",$dbdata["NAME"]);
if ($dbdata["STATE"] == 0){
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
/*$errors[] = "Password is invalid";
echo "Password is invalid";
}
}
else{
echo "Student Number is Invalid";
/*$errors[] = "Student Number is Invalid";
}
}
else{
echo "User Already Log in";
/*$errors[] = "User Already Log in";
}*/

// login //


// forgot password

/*else if (isset($_POST["forget"])){
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
/*$errors[] = "Invalid NIC Number";
echo "Invalid NIC Number";
}
}
else{
/*$errors[] = "Password is not match";
echo "Password is not match";
}
}*/

// forgot pass //

//signup

/*    else if (isset($_POST["signin"])){
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
}*/

//signup //

