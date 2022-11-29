import {updateCaracteristicas} from "../http/httpProvider";


export const validacion = () => {
    const form = document.getElementById('formCaracteristicas');
    const campos = form.getElementsByClassName('inputCaracteristica');
    const errorSpan = form.getElementsByClassName('error')[0];

    form.addEventListener('submit', async(e) => { // async cuando realice petición al servidor
        const data = new FormData(form);
        const caracteristicas = Object.fromEntries(data.entries());
        await updateCaracteristicas(caracteristicas);
    });
}