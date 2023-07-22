document.addEventListener("DOMContentLoaded", function() {
    // Datos del gráfico
    var data = {
        labels: ["ingreso", "gasto", "presupuesto"],
        datasets: [{
            data: [30, 40, 30], // Porcentajes de los valores
            backgroundColor: ["#1DD667", "#F62828", "#4365DF"],
            hoverBackgroundColor: ["#1DD667", "#F62828", "#4365DF"]
        }]
    };

    // Opciones del gráfico
    var options = {
        responsive: true,
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    var dataset = data.datasets[tooltipItem.datasetIndex];
                    var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                        return previousValue + currentValue;
                    });
                    var currentValue = dataset.data[tooltipItem.index];
                    var percentage = ((currentValue / total) * 100).toFixed(2);
                    return percentage + "%";
                }
            }
        }
    };

    // Crear gráfico circular
    var ctx = document.getElementById("myChart").getContext("2d");
    var myChart = new Chart(ctx, {
        type: "doughnut",
        data: data,
        options: options
    });
});
