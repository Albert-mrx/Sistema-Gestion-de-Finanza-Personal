document.addEventListener('DOMContentLoaded', function() {
    // Datos del gráfico
    let data = {
      labels: ['Comida', 'Transporte', 'Vivienda','Entretenimiento','Otros'], // Etiquetas para cada barra
      datasets: [{
        label: 'S/ Cantidad', // Leyenda del dataset
        data: [40, 70, 300,1100,100], // Valores correspondientes a cada barra
        backgroundColor: 'rgba(8, 246, 171, 0.303)', // Color de fondo de las barras
        borderColor: 'rgba(3, 161, 111, 0.303)', // Color del borde de las barras
        borderWidth: 1 // Ancho del borde de las barras
      }]
    };
  
    // Opciones de configuración del gráfico
    let options = {
      responsive: true, // Hace que el gráfico se adapte al tamaño del contenedor
      maintainAspectRatio: false, // Evita que el gráfico rebase su contenedor
      scales: {
        y: {
          beginAtZero: true // Comienza el eje y desde cero
        }
      }
    };
  
    // Obtén el elemento del canvas del gráfico
    let ctx = document.getElementById('myChart').getContext('2d');
  
    // Crea el gráfico de barras
    let myChart = new Chart(ctx, {
      type: 'bar',
      data: data,
      options: options
    });
  });
  
// Función para agregar un nuevo dato al gráfico
// function agregarDato(etiqueta, valor) {
//     // Agrega la nueva etiqueta y valor a los datos existentes
//     myChart.data.labels.push(etiqueta);
//     myChart.data.datasets[0].data.push(valor);
  
//     // Actualiza el gráfico
//     myChart.update();
//   }
  
  // Ejemplo de uso de la función agregarDato
//   agregarDato('Dato 4', 25);