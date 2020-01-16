<?php
    require_once('../../inc/connection.php');
    if ($_GET["type"] == "count"){
        $sql = "SELECT COUNT(*) AS NUMBER FROM student_details GROUP BY DEPARTMENT";
    }
    elseif ($_GET["type"] == "online"){
        $sql = "SELECT COUNT(*) AS NUMBER FROM student_details WHERE STATE=1";
    }
    $result = mysqli_query($connection,$sql);
    $data = array();
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    echo json_encode($data);
?>