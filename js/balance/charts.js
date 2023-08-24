document.addEventListener('DOMContentLoaded', function() {
  // Obtén los datos del archivo obtenerDatosGasto.php utilizando AJAX
  fetch('modelo/obtenerBalance.php')
    .then(response => response.json())
    .then(data => {
      // Datos del gráfico
      let dataChart = {
        labels: Object.keys(data),
        datasets: [{
          label: 'S/ Cantidad',
          data: Object.values(data),
          backgroundColor: 'rgba(8, 246, 171, 0.303)',
          borderColor: 'rgba(3, 161, 111, 0.303)',
          borderWidth: 1
        }]
      };

      // Opciones de configuración del gráfico
      let options = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      };

      // Obtén el elemento del canvas del gráfico
      let ctx = document.getElementById('myChart').getContext('2d');

      // Crea el gráfico de barras
      let myChart = new Chart(ctx, {
        type: 'bar',
        data: dataChart,
        options: options
      });
    })
    .catch(error => {
      console.error('Error al obtener los datos del gasto:', error);
    });
});
