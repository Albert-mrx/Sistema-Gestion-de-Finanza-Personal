let select = document.querySelector('#input-select');
let category = ['Comida','Transporte','Vivienda','Entretenimiento','Otros'];
console.log(category.length);

select.addEventListener('focus', () => {
    select.innerHTML = '';
    for (let i = 0; i < category.length; i++) {
        let optionElement = document.createElement('option'); // Crear nuevo elemento de opción en cada iteración
        optionElement.innerText = category[i];
        select.appendChild(optionElement);
    }
});