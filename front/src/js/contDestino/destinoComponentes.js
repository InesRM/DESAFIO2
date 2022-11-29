import {fetchDestino} from '../http/httpProvider';


export const pintarContDestino = async() => {
    let contDestino = document.getElementById('contDestino');
    
    contDestino.innerHTML = await fetchDestino();
}