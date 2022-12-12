import {updateCaracteristicas2} from "../http/httpProvider";
import {rellenarTablaCaracteristicas} from "./caracteristicasComponentes";


export const validacion = () => {
    const form = document.getElementById('formCaracteristicas');
    const campos = form.getElementsByClassName('inputCaracteristica');
    const errorSpan = form.getElementsByClassName('error')[0];

    form.addEventListener('submit', async(e) => {
        const data = new FormData(form);
        const caracteristicas = Object.fromEntries(data.entries());
        updateCaracteristicas2().then(console.log); // EN CUARENTENA
        await rellenarTablaCaracteristicas();
    });
}