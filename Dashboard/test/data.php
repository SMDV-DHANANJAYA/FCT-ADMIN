<?php
    require_once('../../inc/connection.php');
    $sql = "SELECT STUDENT_NUMBER,NAME,DEPARTMENT FROM student_details WHERE STUDENT_NUMBER = '{$_GET["stnum"]}'";
    $result = mysqli_query($connection,$sql);
    $data = array();
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    echo json_encode($data);
?>