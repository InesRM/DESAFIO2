// Mario (todo el archivo)
import {insertPruebaPuntual} from "../../http/httpProvider";
import {limpiarForm} from "../pruebasComponentes";

const form = document.getElementById('formPruebaPuntual');

form.addEventListener('submit', async(e) => { // ASYNC
    const data = new FormData(form);
    const datosPrueba = Object.fromEntries(data.entries());

    console.warn(datosPrueba);

    e.preventDefault();

    insertPruebaPuntual(datosPrueba).then(limpiarForm(form.id));
});