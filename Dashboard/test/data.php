<?php
    require_once('../../inc/php/connection.php');

    $sql = "SELECT COUNT FROM visitors ORDER BY DAY ASC";
    $result = mysqli_query($connection,$sql);
    $data = array();
    while($row = mysqli_fetch_assoc($result)){
        $data[] = $row;
    }
    echo json_encode($data);
?>