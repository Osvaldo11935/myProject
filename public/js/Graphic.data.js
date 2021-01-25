let _baseURL = "src/Manipulacao/buscar.php";
var colors = ["#007bff", "#28a745", "#333333", "#c3e6cb", "#dc3545", "#6c757d", "#7BFF00", "#FF007B", "#FF7B00", "#FFFFFF", "#C0C0C0", "#800000", "#808000", "#00FFFF", "#0000FF"];
const consumer = async(body) => {
    var res = await fetch(_baseURL, { method: "POST", body: JSON.stringify(body) })
        .then((result) => {
            return result.json();
        })
        .catch((err) => {
            return err;
        });
    return res;
};

const graphic = async(table, id, prov = null) => {
    let data = []
    var obj = await consumer({ prov: prov, action: "selectCount", tabela: table, mes: "1,2,3,4,5,6,7,8,9,10,11,12" })
    for (let objs of obj) {
        data.push(objs["Res"])
    }
    var chLine = document.getElementById(`chLine${id}`);
    var chartData = {
        labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
            data: data,
            backgroundColor: "transparent",
            borderColor: colors[0],
            borderWidth: 4,
            pointBackgroundColor: colors[0],
        }, ],
    };
    if (chLine) {
        new Chart(chLine, {
            type: "line",
            data: chartData,
            options: {
                scales: {
                    xAxes: [{
                        ticks: {
                            beginAtZero: false,
                        },
                    }, ],
                },
                legend: {
                    display: false,
                },
                responsive: true,
            },
        });
    }
    /* large pie/donut chart */
    var chPie = document.getElementById(`chPie${id}`);
    if (chPie) {
        new Chart(chPie, {
            type: "pie",
            data: {
                labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                datasets: [{
                    backgroundColor: [colors[1], colors[0], colors[2], colors[5]],
                    borderWidth: 0,
                    data: data,
                }, ],
            },
            plugins: [{
                beforeDraw: function(chart) {
                    var width = chart.chart.width,
                        height = chart.chart.height,
                        ctx = chart.chart.ctx;
                    ctx.restore();
                    var fontSize = (height / 70).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";
                    var text = chart.config.data.datasets[0].data[0] + "%",
                        textX = Math.round((width - ctx.measureText(text).width) / 2),
                        textY = height / 2;
                    ctx.fillText(text, textX, textY);
                    ctx.save();
                },
            }, ],
            options: {
                layout: { padding: 0 },
                legend: { display: false },
                cutoutPercentage: 80,
            },
        });
    }
    /* bar chart */
    var chBar = document.getElementById(`chBar${id}`);
    if (chBar) {
        new Chart(chBar, {
            type: "bar",
            data: {
                labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                datasets: [{
                        data: data,
                        backgroundColor: colors[0],
                    },
                    {
                        data: data,
                        backgroundColor: colors[1],
                    },
                ],
            },
            options: {
                legend: {
                    display: false,
                },
                scales: {
                    xAxes: [{
                        barPercentage: 0.4,
                        categoryPercentage: 0.5,
                    }, ],
                },
            },
        });
    }
    /* 3 donut charts */
    var donutOptions = {
        cutoutPercentage: 85,
        legend: {
            position: "bottom",
            padding: 5,
            labels: { pointStyle: "circle", usePointStyle: true },
        },
    };
    // donut 1
    var chDonutData1 = {
        labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
            backgroundColor: colors.slice(0, 12),
            borderWidth: 0,
            data: data,
        }, ],
    };
    var chDonut1 = document.getElementById(`chDonut1${id}`);
    if (chDonut1) {
        new Chart(chDonut1, {
            type: "pie",
            data: chDonutData1,
            options: donutOptions,
        });
    }
    // donut
    var chDonutData2 = {
        labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
            backgroundColor: colors.slice(0, 12),
            borderWidth: 0,
            data: data,
        }, ],
    };
    var chDonut2 = document.getElementById(`chDonut2${id}`);
    if (chDonut2) {
        new Chart(chDonut2, {
            type: "pie",
            data: chDonutData2,
            options: donutOptions,
        });
    }

    // donut 3
    var chDonutData3 = {
        labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
        datasets: [{
            backgroundColor: colors.slice(0, 12),
            borderWidth: 0,
            data: data,
        }, ],
    };
    var chDonut3 = document.getElementById(`chDonut3${id}`);
    if (chDonut3) {
        new Chart(chDonut3, {
            type: "pie",
            data: chDonutData3,
            options: donutOptions,
        });
    }

    /* 3 line charts */
    var lineOptions = {
        legend: { display: false },
        tooltips: { interest: false, bodyFontSize: 11, titleFontSize: 11 },
        scales: {
            xAxes: [{
                ticks: {
                    display: false,
                },
                gridLines: {
                    display: false,
                    drawBorder: false,
                },
            }, ],
            yAxes: [{ display: false }],
        },
        layout: {
            padding: {
                left: 6,
                right: 6,
                top: 4,
                bottom: 6,
            },
        },
    };

    var chLine1 = document.getElementById(`chLine1${id}`);
    if (chLine1) {
        new Chart(chLine1, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                datasets: [{
                    backgroundColor: "#ffffff",
                    borderColor: "#ffffff",
                    data: data,
                    fill: false,
                }, ],
            },
            options: lineOptions,
        });
    }
    var chLine2 = document.getElementById(`chLine2${id}`);
    if (chLine2) {
        new Chart(chLine2, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                datasets: [{
                    backgroundColor: "#ffffff",
                    borderColor: "#ffffff",
                    data: data,
                    fill: false,
                }, ],
            },
            options: lineOptions,
        });
    }
    var chLine3 = document.getElementById(`chLine3${id}`);
    if (chLine3) {
        new Chart(chLine3, {
            type: "line",
            data: {
                labels: ["Jan", "Feb", "Mar", "Abr", "Mai", "Jun", "Jul", "Ago", "Set", "Out", "Nov", "Dez"],
                datasets: [{
                    backgroundColor: "#ffffff",
                    borderColor: "#ffffff",
                    data: data,
                    fill: false,
                }, ],
            },
            options: lineOptions,
        });
    }
};