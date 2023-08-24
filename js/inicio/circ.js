document.addEventListener("DOMContentLoaded", function() {
    // Hacemos una solicitud AJAX para obtener los datos del archivo PHP
    fetch('modelo/circle.php')
        .then(response => response.json())
        .then(data => {
            // Datos del gráfico con los valores obtenidos del servidor
            var dataChart = {
                labels: ["Ingreso", "Gasto", "Presupuesto"],
                datasets: [{
                    data: [data.totalIngreso, data.totalGasto, data.presupuesto],
                    backgroundColor: ["#1DD667", "#F62828", "#4365DF"],
                    hoverBackgroundColor: ["#1DD667", "#F62828", "#4365DF"]
                }]
            };

            // Opciones del gráfico
            var optionsChart = {
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

            // Crear el gráfico circular
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'doughnut',
                data: dataChart,
                options: optionsChart
            });
        })
});
