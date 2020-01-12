<?php
    $connection = mysqli_connect('localhost','root','','fct_students');
    if (!$connection){
        header('location: ../404.php');
    }
?>
