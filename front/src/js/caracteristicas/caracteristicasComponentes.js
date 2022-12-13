import {fetchCaracteristicas} from "../http/httpProvider";
import {validacion} from "./validarCaracteristicas";

const tablaCaracteristicas = document.getElementById('tablaCaracteristicas');
const modalCaracteristicas = document.getElementById('modalCaracteristicas');
const titulo = document.getElementById('tituloModalCaracteristicas');

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
        <div class="row">
            <div class="col>
                <label for="${(nombre)}" class="col-form-label float-start">${(nombre)}:</label>
                <input name="${(nombre)}" type="text" class="form-control mb-3 w-50 float-end inputCaracterisitica" placeholder="${(cantidad)}"
                    pattern="^[1-5]{1}$"
                    title="introduce un valor válido (1 - 5)">
            </div>
        </div>
    `;

    modalCaracteristicas.getElementsByTagName('form')[0].innerHTML += htmlCampo;
}

export const rellenarTablaCaracteristicas = async() => {
    tablaCaracteristicas.getElementsByTagName('tbody')[0].innerHTML = '';
    const caracteristicas = await fetchCaracteristicas();

    for (const atributo in caracteristicas) {
        if (Object.hasOwnProperty.call(caracteristicas, atributo)) {
            const cantidad = caracteristicas[atributo];
            crearHtmlFila(atributo, cantidad);
        }
    }
}



export const rellenarModalCaracterísticas = async() => {
    // const camposModal = modalCaracteristicas.getElementsByClassName('campo');
    const caracteristicas = await fetchCaracteristicas();

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

const actualizarModalCaracteristicas = () => {
    modalCaracteristicas.getElementsByTagName('form')[0];
}