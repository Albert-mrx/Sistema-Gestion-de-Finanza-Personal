// let select = document.querySelector('#select');
// let category = ['Comida','Transporte','Vivienda','Entretenimiento','Otros'];
// select.addEventListener('focus', () => {
//     select.innerHTML = '';
//     for (let i = 0; i < category.length; i++) {
//         let optionElement = document.createElement('option'); // Crear nuevo elemento de opción en cada iteración
//         optionElement.innerText = category[i];
//         optionElement.value = i + 1;
//         select.appendChild(optionElement);
//     }
// });
// Hacer una solicitud AJAX para obtener las categorías
// let selectElement = document.getElementById('select');
// let xhr = new XMLHttpRequest();
// xhr.open('GET', './modelo/cate.php', true);
// xhr.onload = function() {
//   if (xhr.status === 200) {
//     let categorias = JSON.parse(xhr.responseText);
//     categorias.forEach(function(categoria) {
//       let option = document.createElement('option');
//       option.value = categoria.id_categoria;
//       option.textContent = categoria.nombre_categoria;
//       selectElement.appendChild(option);
//     });
//   }
// };
// xhr.send();
