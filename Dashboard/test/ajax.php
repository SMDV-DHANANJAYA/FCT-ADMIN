<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../vendor/jquery/jquery.min.js"></script>
    <link rel="stylesheet" href="../../Login_Section/vendor/bootstrap/css/bootstrap.min.css">
    <title>test ajax page</title>
</head>
<body>
    <div class="jumbotron text-center text-dark lead">
        Get Data Using Ajax
        <br><br>
        <input type="text" placeholder="Enter Student Number" id="stnum">
        <input type="button" onclick="getData()" value="Get Data" class="btn btn-dark">
    </div>
    <div class="container">
        <div class="row">
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                        <th>STUDENT NUMBER</th>
                        <th>NAME</th>
                        <th>DEPARTMENT</th>
                    </tr>
                </thead>
                <tbody id="data">
                </tbody>
            </table>
        </div>
    </div>
</body>
<script>
    function getData() {
        /*var number = document.getElementById("stnum").value;
        window.location.href = 'test.html?stnum='+number;*/
        var number = document.getElementById("stnum").value;

        var ajax = new XMLHttpRequest();
        var method = "GET";
        var url = "data.php?stnum="+number;
        var asynchronous = true;

        ajax.open(method,url,asynchronous);
        ajax.send();

        ajax.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200){
                var data = JSON.parse(this.responseText);
                var text = "";
                for (var i = 0; i < data.length; i++){
                    text += "<tr>";
                    text += "<td>" + data[i].STUDENT_NUMBER + "</td>";
                    text += "<td>" + data[i].NAME + "</td>";
                    text += "<td>" + data[i].DEPARTMENT + "</td>";
                    text += "</tr>";
                }
                document.getElementById("data").innerHTML = text;
            }
        }
    }
</script>
</html>