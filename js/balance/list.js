let select = document.querySelector('#input-select');
let month = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto',
            'Septiembre','Octubre','Noviembre','Diciembre'];
console.log(month.length);

select.addEventListener('click', () => {
    for (let i = 0; i < month.length; i++) {
        let optionElement = document.createElement('option'); // Crear nuevo elemento de opción en cada iteración
        optionElement.innerText = month[i];
        select.appendChild(optionElement);
    }
});
