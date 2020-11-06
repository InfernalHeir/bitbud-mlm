/*==== result-chart =====*/
var ctx = document.getElementById('result-chart');
Chart.defaults.global.defaultFontFamily = 'Fira Sans';
Chart.defaults.global.defaultFontSize = 15;
Chart.defaults.global.defaultFontStyle = '500';
Chart.defaults.global.defaultFontColor = '#283a5e';
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun' ],
        datasets: [{
            label: "one",
            data: [20, 37, 27, 25, 35, 25],
            backgroundColor: 'rgba(255,255,255,0)',
            borderColor: '#4021ba',
            pointBackgroundColor: '#fff',
            pointBorderColor: '#4021ba',
            borderWidth: 2,
            pointRadius: 4
        }, {
            label: "two",
            data: [ 12, 25, 18, 40, 12, 43],
            backgroundColor: 'rgba(255,255,255,0)',
            borderColor: '#ff7e00',
            pointBackgroundColor: '#ff7e00',
            pointBorderColor: '#ffffff',
            borderWidth: 2,
            pointRadius: 4
        }]
    },

    // Configuration options go here
    options: {
        tooltips: {
            custom: function(tooltip) {
                if (!tooltip) return;
                // disable displaying the color box;
                tooltip.displayColors = false;
            },
            titleFontColor: '#fff',
            bodyFontColor: '#fff',
            backgroundColor: '#283a5e',
            xPadding: 15,
            yPadding: 15,
            borderWidth: 3,
            borderColor:  "rgba(255, 255, 255, .9)"
        },
        legend: {
            display: false,
            tooltips: {
                displayColors:false,
            },
            labels: {
                fontSize: 14,
                fontStyle: 'bold',
                fontColor: '#fff',
                boxWidth: 50,
                padding: 25,
                defaultFontStyle: 'bold',
                fontFamily: 'Heebo',
                usePointStyle: true,
            }
        },

        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: '#eee',
                }
            }],
            yAxes: [{
                display: true,
                gridLines: {
                    color: '#eee',
                },
                ticks: {
                    fontSize: 14,
                }
            }]

        },
        elements: {
            line: {
                //tension: 0.00001,
                tension: 0.4,
                borderWidth: 1,
            }
        }
    }
});