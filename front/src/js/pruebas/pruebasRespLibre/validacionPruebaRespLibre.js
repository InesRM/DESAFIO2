import {insertPruebaRespLibre} from "../../http/httpProvider";
import {limpiarForm} from "../pruebasComponentes";


const form = document.getElementById('formPruebaRespLibre');

form.addEventListener('submit', async(e) => { 
    const data = new FormData(form);
    const datosPrueba = Object.fromEntries(data.entries());
    e.preventDefault();

    insertPruebaRespLibre(datosPrueba).then(limpiarForm(form.id));
});