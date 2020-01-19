<?php
    require_once('../../inc/php/connection.php');

    $sql = "SELECT STUDENT_NUMBER,ACADEMIC_YEAR,DEPARTMENT,EMAIL,SEX FROM student_details ORDER BY ACADEMIC_YEAR ASC";
    $result = mysqli_query($connection,$sql);
    $data = array();
    while($row = mysqli_fetch_assoc($result)){
        $row["action"] = "<button class='btn btn-outline-success btn-sm' id='btn-edit' data-id-edit='{$row['STUDENT_NUMBER']}'><span class='fa fa-edit'></span></button>";
        $row["action"] .= "<button class='btn btn-outline-danger btn-sm' id='btn-edit' data-id-delete='{$row['STUDENT_NUMBER']}'><span class='fa fa-trash'></span></button>";
        $data[] = $row;
    }
    echo "<pre>";
    echo print_r($data);
    echo "</pre>";


?>