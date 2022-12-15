
const urlCosa = 'http://127.0.0.1:8000/api/cosa';
import {cargarUserLs} from "../localStorage/localStorage";
const urlInfo = 'http://127.0.0.1:8000/api/cosa';
const urlPruebas = 'http://127.0.0.1:8000/api/pruebas';
const urlConsultas = 'http://127.0.0.1:8000/api/getDiosProtector/33';
// const urlLogin = 'http://localhost:8000/api/users/login';


/**@author Ines 
 * dios_protector
*/


export const fetchDiosProtector = async() => {

    try {
        const resp= await fetch(urlConsultas);

        const data = await resp.json();
        JSON.stringify(data);
        
        return data.dios_protector;
      
    }
    catch (error) {
        throw error;
    }
}


export const fetchDestino = async() => {
    try {
        const resp = await fetch(urlCosa + '/getdestino/1'); // + el user
        if(!resp.ok) throw ('No se pudo realizar la petición');
        // resp.json().then(console.log);
        const {destino} = await resp.json();
        
        return destino;
    }
    catch (error) {
        throw error;
    }
}


export const fetchCaracteristicas = async() => {
    try {
        const resp = await fetch(urlCosa + '/getcaracteristicas/1'); // + el user

        if(!resp.ok) throw ('No se pudo realizar la petición');
        const caracteristicas = await resp.json();

        return caracteristicas;
    }
    catch (error) {
        throw error;
    }
}

export const updateCaracteristicas = async(caracteristicas) => {

    const resp = await fetch(urlCosa + '/updatecaracteristicas/1', { // + el user
        method: 'PUT', 
        body: JSON.stringify(caracteristicas),
        headers: {'Content-Type': 'application/json'} 
    });

    return await resp.json(); 
}

export const insertPreguntaEleccion = async(datos) => {

    const resp = await fetch(urlPruebas
            + '/insertpruebaeleccion', {
        method: 'POST',
        body: JSON.stringify(datos),
        headers: {'Content-Type': 'application/json'} 
        });

    return await resp.json();
}

export const insertPruebaPuntual = async(datos) => {

    const resp = await fetch(urlPruebas
            + '/insertpruebapuntual', {
        method: 'POST',
        body: JSON.stringify(datos),
        headers: {'Content-Type': 'application/json'}
        });

    return await resp.json();
}