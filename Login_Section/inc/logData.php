<?php
    require_once('../../inc/connection.php');
    if ($_GET["datatype"] == "login") {
        $sql = "SELECT STUDENT_NUMBER,NAME,PASSWORD,STATE FROM student_details WHERE STUDENT_NUMBER='{$_GET['stnum']}'";
        $result = mysqli_query($connection, $sql);
        $data = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        echo json_encode($data);
    }
    elseif ($_GET["datatype"] == "repass"){
        $sql = "UPDATE student_details SET PASSWORD='{$_GET["password"]}' WHERE NIC='{$_GET["nic"]}'";
        $result = mysqli_query($connection, $sql);
        if ($result){
            echo "true";
        }
        else{
            echo "Password Update Fail";
        }
    }
    elseif ($_GET["datatype"] == "signin"){
        $sql = "INSERT INTO student_details(STUDENT_NUMBER,NAME,DEPARTMENT,PASSWORD) VALUES ('{$_GET["stnum"]}','{$_GET["name"]}','{$_GET["department"]}','{$_GET["password"]}')";
        $result = mysqli_query($connection, $sql);
        if ($result){
            echo "true";
        }
        else{
            echo "Add User Fail";
        }
    }
?>