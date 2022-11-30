import {insertPreguntaEleccion} from "../../http/httpProvider";
import {limpiarForm} from "../pruebasComponentes";


const form = document.getElementById('formPrueba50');

form.addEventListener('submit', async(e) => { 
    const data = new FormData(form);
    const datosPrueba = Object.fromEntries(data.entries());
    e.preventDefault();

    insertPreguntaEleccion(datosPrueba).then(limpiarForm(form.id));
});