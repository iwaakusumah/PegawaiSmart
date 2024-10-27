// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily =
    '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = "#292b2c";

// Data dari view
var labels = window.chartDatas.labels; // Tahun
var datasMasuk = window.chartDatas.datasMasuk; // Data untuk jumlah masuk
var datasKeluar = window.chartDatas.datasKeluar; // Data untuk jumlah keluar

var ctx = document.getElementById("myLineChart");
var myLineChart = new Chart(ctx, {
    type: "line",
    data: {
        labels: labels,
        datasets: [
            {
                label: "Jumlah Masuk",
                lineTension: 0.3,
                backgroundColor: "rgba(2,117,216,0.2)",
                borderColor: "rgba(2,117,216,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(2,117,216,1)",
                pointBorderColor: "rgba(255,255,255,0.8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(2,117,216,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: datasMasuk,
            },
            {
                label: "Jumlah Keluar",
                lineTension: 0.3,
                backgroundColor: "rgba(255,99,132,0.2)",
                borderColor: "rgba(255,99,132,1)",
                pointRadius: 5,
                pointBackgroundColor: "rgba(255,99,132,1)",
                pointBorderColor: "rgba(255,255,255,0 .8)",
                pointHoverRadius: 5,
                pointHoverBackgroundColor: "rgba(255,99,132,1)",
                pointHitRadius: 50,
                pointBorderWidth: 2,
                data: datasKeluar,
            },
        ],
    },
    options: {
        scales: {
            xAxes: [
                {
                    time: {
                        unit: "year", // Anda dapat mengubah ini sesuai kebutuhan, misalnya "month", "year", dll.
                    },
                    gridLines: {
                        display: false,
                    },
                    ticks: {
                        autoSkip: false, // Pastikan semua label ditampilkan
                        maxRotation: 0, // Rotasi maksimum untuk label
                        minRotation: 0, // Rotasi minimum untuk label
                        maxTicksLimit: labels.length, // Atur ke jumlah label untuk menampilkan semuanya
                    },
                },
            ],
            yAxes: [
                {
                    ticks: {
                        min: 0,
                        max:
                            Math.max(
                                Math.max.apply(Math, datasMasuk),
                                Math.max.apply(Math, datasKeluar)
                            ) + 10,
                        maxTicksLimit: 5,
                    },
                    gridLines: {
                        color: "rgba(0, 0, 0, .125)",
                    },
                },
            ],
        },
        legend: {
            display: true, // Tampilkan legend untuk membedakan antara dua garis
        },
    },
});
