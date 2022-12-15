// Mario (todo el archivo)
import {updateCaracteristicas} from "../http/httpProvider";
import {rellenarTablaCaracteristicas} from "./caracteristicasComponentes";


export const validacion = () => {
    const form = document.getElementById('formCaracteristicas');
    const campos = form.getElementsByClassName('inputCaracteristica');
    const errorSpan = form.getElementsByClassName('error')[0];

    form.addEventListener('submit', async(e) => { // async cuando realice petición al servidor
        const data = new FormData(form);
        const caracteristicas = Object.fromEntries(data.entries());
        updateCaracteristicas(caracteristicas).then(console.log);
        await rellenarTablaCaracteristicas();
    });
}