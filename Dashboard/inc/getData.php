<?php
    require_once('../../inc/php/connection.php');

    $sql = "";
    if ($_GET["type"] == "count"){
        $sql = "SELECT COUNT(*) AS NUMBER FROM student_details GROUP BY DEPARTMENT";
    }
    elseif ($_GET["type"] == "online"){
        $sql = "SELECT COUNT(*) AS NUMBER FROM student_details WHERE STATE=1";
    }
    elseif ($_GET["type"] == "visitors"){
        $sql = "SELECT COUNT FROM visitors ORDER BY DAY ASC";
    }
    elseif ($_GET["type"] == "dataTable"){
        $sql = "SELECT STUDENT_NUMBER,ACADEMIC_YEAR,DEPARTMENT,EMAIL,SEX FROM student_details ORDER BY ACADEMIC_YEAR ASC";
        $result = mysqli_query($connection,$sql);
        $data = array();
        while($row = mysqli_fetch_assoc($result)){
            $row["ACTION"] = "<button class='btn btn-outline-success btn-sm mr-3' id='btn-edit' data-id-edit='{$row['STUDENT_NUMBER']}'><span class='fa fa-edit'></span></button>";
            $row["ACTION"] .= "<button class='btn btn-outline-danger btn-sm' id='btn-delete' data-id-delete='{$row['STUDENT_NUMBER']}'><span class='fa fa-trash'></span></button>";
            $data[] = $row;
        }
        echo json_encode($data);
    }

    if ($_GET["type"] != "dataTable"){
        $result = mysqli_query($connection,$sql);
        $data = array();
        while($row = mysqli_fetch_assoc($result)){
            $data[] = $row;
        }
        echo json_encode($data);
    }
?>