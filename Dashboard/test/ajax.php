
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