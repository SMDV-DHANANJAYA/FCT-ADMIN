// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
setInterval(getCount,5000);
function getCount() {
  var ajax = new XMLHttpRequest();
  var method = "GET";
  var url = "inc/getData.php?type=count";
  var asynchronous = true;

  ajax.open(method,url,asynchronous);
  ajax.send();

  ajax.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200){
      var data = JSON.parse(this.responseText);
      displayChart(data);
    }
  }
}

function displayChart(data) {
  var ct = data[1].NUMBER;
  var et = data[2].NUMBER;
  var cs = data[0].NUMBER;

  document.getElementById("ct").innerHTML = ct;
  document.getElementById("et").innerHTML = et;
  document.getElementById("cs").innerHTML = cs;

  $("#ct-progress").attr('aria-valuenow',ct).css('width',ct);
  $("#et-progress").attr('aria-valuenow',et).css('width',et);
  $("#cs-progress").attr('aria-valuenow',cs).css('width',cs);

  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ["CT","ET","CS"],
      datasets: [{
        data: [ct,et,cs],
        backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
        hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
        hoverBorderColor: "rgba(234, 236, 244, 1)",
      }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        caretPadding: 10,
      },
      legend: {
        display: false
      },
      cutoutPercentage: 80,
      responsive: true,
    },
  });
}