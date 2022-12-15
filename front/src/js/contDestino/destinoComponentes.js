import {fetchDestino} from '../http/httpProvider';
import {fetchDiosProtector} from '../http/httpProvider';


export const pintarContDestino = async() => {
    let contDestino = document.getElementById('contDestino');
    
    contDestino.innerHTML = await fetchDestino();
}

export const pintarDiosProtector = async() => {
   
    let dios_protector = document.getElementById('contDiosProtector');

    dios_protector.innerHTML = await fetchDiosProtector();
   
    // crearFilaDios(dios);
}