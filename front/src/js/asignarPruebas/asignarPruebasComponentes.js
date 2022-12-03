const {fetchPruebas} = require("../http/httpProvider");

let contTarjetasPrueba = document.querySelectorAll('.contcontenedorTarjetasPruebas')[0];
let contTarjetasHumano = document.querySelectorAll('.contenedorTarjetasHumanos')[0];


const crearTarjHumanoPruebaHtml = (tarjetaPrueba, nombre) => {
    console.warn(tarjetaPrueba);

    const html = `
        <li class="list-group-item">${(nombre)}</li>
    `;

    tarjetaPrueba.innerHtml += html;
}

const crearTarjHumanoHtml = (humano) => {
    let tarjDiv = document.createElement('div');
    tarjDiv.classList.add('card', 'mb-4', 'rounded-3', 'shadow-sm', 'tarjetaHumano');
    tarjDiv.id = 'h' + humano.id;
    tarjDiv.nombre = humano.name;
    tarjDiv.draggable = true;



    const html = `
        <div class="card-body">${(humano.name)}</div>
    `;


    tarjDiv.innerHTML = html;

    // tarjDiv.addEventListener('dragstart', e => {
    //     e.dataTransfer.setData('text', e.target.id)
    // });

    contTarjetasHumano.append(tarjDiv);


    return tarjDiv;
}

const crearTarjPrueba = (prueba, tipo) => {
    let tarjDiv = document.createElement('div');
    tarjDiv.classList.add('accordion', 'mb-4', 'rounded-3');
    tarjDiv.id = 'p' + prueba.id;
    
    const html = `
        <div class="accordion-item ">
            <h2 class="accordion-header" id="headingOne">
                <button
                class="accordion-button "
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#prueba1"
                aria-expanded="true"
                aria-controls="collapseOne"
                >
                ${(prueba.titulo)} | ${(tipo)}
                </button>
            </h2>
            <ul
                class="accordion-collapse collapse list-group contenedorTarjetasPrueba"
                aria-labelledby="headingOne"
            >
            </ul>
        </div>
    `;

    tarjDiv.innerHTML = html;
    contTarjetasPrueba.append(tarjDiv);

    // tarjDiv.addEventListener('dragover', e => {
    //     e.preventDefault();
    // });

    // tarjDiv.addEventListener('drop', e => {
    //     const data = e.dataTransfer.getData('text');
    //     console.log(tarjDiv.getElementsByTagName('ul')[0]);
    //     console.log(document.getElementById(data).nombre);
    //     crearTarjHumanoPruebaHtml(tarjDiv.getElementsByTagName('ul')[0], document.getElementById(data).value);
    //     console.log(data);

    // });

    return tarjDiv;

}

export const rellenarContHumanos = (humanos)  => {
    for (const humano of humanos) {
        console.warn(humano);
        crearTarjHumanoHtml(humano);
    }
}

export const rellenarContPruebas = (pruebas) => {    
    for (const tipo in pruebas) {
        if (Object.hasOwnProperty.call(pruebas, tipo)) {
            const pruebasTipo = pruebas[tipo];
            for (const prueba of pruebasTipo) {
                crearTarjPrueba(prueba, tipo);
            }
        }
    }
}