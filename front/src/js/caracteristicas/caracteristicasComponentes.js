import {fetchCaracteristicas} from "../http/httpProvider";
import {initValidacion} from "./validarCaracteristicas";
const tablaCaracteristicas = document.getElementById('tablaCaracteristicas');
const modalCaracteristicas = document.getElementById('modal');
const titulo = document.getElementById('tituloModal');

const crearHtmlFila = (nombre, cantidad) => {
    const htmlFila = `
        <tr>
            <td class="text-center nombreCaracteristica" scope="row">${(nombre)}</td>
            <th class="text-center cantCaracteristica">${(cantidad)}</th>
        </tr>
    `;

    tablaCaracteristicas.getElementsByTagName('tbody')[0].innerHTML += htmlFila;
}

const crearHtmlCampoModal = (nombre, cantidad) => {
    const htmlCampo = `
        <label for="${(nombre)}" class="col-form-label">${(nombre)}:</label>
        <input name="${(nombre)}" type="text" class="form-control mb-3 inputCaracterisitica" placeholder="${(cantidad)}"
            pattern="^[1-5]{1}$"
            title="introduce un valor válido (1 - 5)">
    `;

    modalCaracteristicas.getElementsByTagName('form')[0].innerHTML += htmlCampo;
}

export const rellenarTablaCaracteristicas = (caracteristicas) => {
    
    for (const atributo in caracteristicas) {
        if (Object.hasOwnProperty.call(caracteristicas, atributo)) {
            const cantidad = caracteristicas[atributo];
            crearHtmlFila(atributo, cantidad);
        }
    }
}

export const rellenarModalCaracterísticas = (caracteristicas) => {
    // const camposModal = modalCaracteristicas.getElementsByClassName('campo');

    titulo.innerHTML = 'Editar características';

    const form = document.createElement('form');
    form.id = 'formCaracteristicas';
    // form.noValidate = true;
    modalCaracteristicas.getElementsByClassName('modal-body')[0].append(form);

    for (const atributo in caracteristicas) {
        if (Object.hasOwnProperty.call(caracteristicas, atributo)) {
            const cantidad = caracteristicas[atributo];

            crearHtmlCampoModal(atributo, cantidad)
        }
    }

    const boton = document.createElement('button');
    boton.classList.add('btn', 'btn-primary', 'float-right');
    boton.type = 'submit'; boton.innerHTML = 'aceptar';
    form.append(boton);

    validacion();
}