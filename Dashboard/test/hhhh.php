<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="md5.js"></script>
    <title>Document</title>
</head>
<body>
    <?php
    require_once("../../inc/connection.php");
    $date = date("Y:M:d");
    $sql = "SELECT COUNT FROM visitors WHERE DAY='{$date}'";
    $result = mysqli_query($connection,$sql);
    echo mysqli_num_rows($result);
    /*$data = mysqli_fetch_assoc($result);
    echo $data;*/


    ?>
</body>
</html>
