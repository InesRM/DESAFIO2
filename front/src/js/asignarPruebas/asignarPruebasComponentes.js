import {cargarHumanosLs} from "../localStorage/localStorage";

const {asignarPruebas, fetchHumanos} = require("../http/httpProvider");

let contTarjetasPrueba = document.querySelectorAll('.contcontenedorTarjetasPruebas')[0];
let contTarjetasHumano = document.querySelectorAll('.contenedorTarjetasHumanos')[0];


const crearTarjHumanoPruebaHtml = (tarjetaPrueba, nombre) => {
    // console.warn(tarjetaPrueba);

    let tarjDiv = document.createElement('li');
    tarjDiv.classList.add('list-group-item');
    tarjDiv.innerHTML = nombre;

    // const html = `
    //     <li class="list-group-item">${(nombre)}</li>
    // `;

    tarjetaPrueba.append(tarjDiv);
    // console.log(tarjetaPrueba.innerHTML);
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

    tarjDiv.addEventListener('dragstart', e => {
        e.dataTransfer.setData('text', e.target.id)
    });

    contTarjetasHumano.append(tarjDiv);


    return tarjDiv;
}

const generarHtmlTooltip = (prueba, tipo) => {

    let html = '';

    switch (tipo) {
        case 'puntuales':
            html = `
            <b>Descripción</b>
            <p>
                ${(prueba.descripcion)}
            </p>
            <p>
                <b>Destino: </b> ${(prueba.destino)} 
                <br>
                <b>Porcentaje: </b> ${(prueba.porcentaje)}%
                <br>
                <b>Atributo: </b> ${(prueba.atributo)}
                <br>
            </p>
            `;
            break;
        case 'eleccion' :
            html = `
            <b>Pregunta</b>
            <p>
                ${(prueba.pregunta)}
            </p>
            <p>
                <b>Destino: </b> ${(prueba.destino)} 
                <br>
                <b>Respuesta correcta: </b> ${(prueba.respuestaCorrecta)} 
                <br>
                <b>Respuesta incorrecta: </b> ${(prueba.respuestaIncorrecta)} 
                <br>
                <b>Atributo: </b> ${(prueba.atributo)}
                <br>
            </p>
            `;
        default:
            break;
    }

        return html;
}

const crearTarjPrueba = (prueba, tipo) => {
    let tarjDiv = document.createElement('div');
    tarjDiv.classList.add('accordion', 'mb-4', 'rounded-3', 'tarjPrueba');
    tarjDiv.id = 'p' + prueba.id;
    
    const htmlToolip = generarHtmlTooltip(prueba, tipo);

    const html = `
        <div class="accordion-item ">
            <h2 class="accordion-header" id="headingOne">
                <button
                    class="accordion-button d-flex justify-content-between position-relative"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#desp${(tarjDiv.id)}"
                >
                    ${(prueba.titulo)} | ${(tipo)}
    
                    <span class="iconoInfo position-absolute"
                        data-bs-toggle="tooltip" data-bs-placement="right" 
                        data-bs-html="true" data-bs-title="${(htmlToolip)}"
                    >?</span>
                </button>
            </h2>
                <ul
                    class="accordion-collapse collapse list-group contenedorTarjetasPrueba"
                    aria-labelledby="headingOne"
                    id="desp${(tarjDiv.id)}"
                >
            </ul>
        </div>
    `;

    // <img src="../assets/icons/question.png" 
    //                     class="rounded iconoInfo"
    //                     data-bs-toggle="tooltip" data-bs-placement="right" 
    //                     data-bs-html="true" data-bs-title="${(htmlToolip)}"
    //                     ></img>

    tarjDiv.innerHTML = html;
    contTarjetasPrueba.append(tarjDiv);

    tarjDiv.addEventListener('dragover', e => {
        e.preventDefault();
    });

    tarjDiv.addEventListener('drop', async(e) => {
        const data = e.dataTransfer.getData('text');
        const asig = {
            idPrueba : prueba.id,
            idHumano : parseInt(data.substring(1))
        }
        await asignarPruebas(asig);
        crearTarjHumanoPruebaHtml(tarjDiv.getElementsByTagName('ul')[0], document.getElementById(data).nombre);

    });

    return tarjDiv;

}

export const pintarAsignarPruebas = async(humanosPruebas, humanos) => { 

    let idPrueba = humanosPruebas[0].id;
    let tarj = document.getElementById('despp' + idPrueba);    
    for (const humanoPrueba of humanosPruebas) {
        if (humanoPrueba.idPrueba !== idPrueba) {
            idPrueba = humanoPrueba.idPrueba;
            tarj = document.getElementById('despp' + idPrueba); 
        }
        
        crearTarjHumanoPruebaHtml(tarj, humanos.filter(h => {return h.id === humanoPrueba.idHumano})[0].name);
    }
}

export const rellenarContHumanos = (humanos)  => {
    for (const humano of humanos) {
        // console.warn(humano);
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