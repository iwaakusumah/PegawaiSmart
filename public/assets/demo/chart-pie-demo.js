// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Chart.js script
document.addEventListener('DOMContentLoaded', function () {
  // Data dari view (sebagai contoh, Anda dapat menggantinya sesuai dengan cara Anda mendapatkan data)
  var label = window.chartData.label;
  var data = window.chartData.data;

  // Pie Chart Example
  var ctx = document.getElementById("myPieChart");
  var myPieChart = new Chart(ctx, {
      type: 'pie',
      data: {
          labels: label,
          datasets: [{
              data: data,
              backgroundColor: ['#007bff', '#ffc107', '#28a745'],
          }],
      },
  });
});
