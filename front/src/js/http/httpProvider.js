// Mario (todo el archivo)
import {cargarUserLs} from "../localStorage/localStorage";

const urlInfo = 'http://127.0.0.1:8000/api/general';
const urlPruebas = 'http://127.0.0.1:8000/api/pruebas';

const user = cargarUserLs();

export const fetchDestino = async() => {
    try {
        
        const resp = await fetch(urlInfo + '/getdestino/' + user.id, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + user.token
            }
        });
        
        if(!resp.ok) throw ('No se pudo realizar la petición');
        
        const {destino} = await resp.json();
        
        return destino;
    }
    catch (error) {
        throw error;
    }
}

export const fetchCaracteristicas = async() => {
    try {
        const resp = await fetch(urlInfo + '/getcaracteristicas/' + user.id, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + user.token
            }
        });

        if(!resp.ok) throw ('No se pudo realizar la petición');
        const caracteristicas = await resp.json();

        return caracteristicas;
    }
    catch (error) {
        throw error;
    }
}

export const updateCaracteristicas = async(caracteristicas) => { // EN CUARENTENA

    const resp = await fetch(urlInfo + '/updatecaracteristicas/' + user.id, { // + el user
        method: 'PUT', 
        body: JSON.stringify(caracteristicas),
        headers: {'Content-Type': 'application/json', 'Authorization': 'Bearer ' + user.token} 
    });

    return await resp.json(); 
}

export const insertPreguntaEleccion = async(datos) => {
    console.log(datos);
    const resp = await fetch(urlPruebas
            + '/insertpruebaeleccion/' + user.id, {
        method: 'POST',
        body: JSON.stringify(datos),
        headers: {'Content-Type': 'application/json', 'Authorization': 'Bearer ' + user.token} 
        });

    return await resp.json();
}

export const insertPruebaPuntual = async(datos) => {
    const resp = await fetch(urlPruebas
            + '/insertpruebapuntual/', {
        method: 'POST',
        body: JSON.stringify(datos),
        headers: {'Content-Type': 'application/json', 'Authorization': 'Bearer ' + user.token}
        });

    return await resp.json();
}

export const insertPruebaRespLibre = async(datos) => {
    const resp = await fetch(urlPruebas
        + '/insertpruebaresplibre', {
    method: 'POST',
    body: JSON.stringify(datos),
    headers: {'Content-Type': 'application/json', 'Authorization': 'Bearer ' + user.token}
    });

    return await resp.json();
}

export const insertPruebaValoracion = async(datos) => {
    const resp = await fetch(urlPruebas
            + '/insertpruebapuntual', {
        method: 'POST',
        body: JSON.stringify(datos),
        headers: {'Content-Type': 'application/json', 'Authorization': 'Bearer ' + user.token}
        });

    return await resp.json();
}

export const fetchPruebas = async() => {
    try {
        const resp = await fetch(urlPruebas + '/getpruebas', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + user.token
            }
        });

        if(!resp.ok) throw ('No se pudo realizar la petición');

        const pruebas = await resp.json();
        
        return pruebas;
    }
    catch (error) {
        throw error;
    }
}

export const fetchHumanos = async() => {
    try {
        const resp = await fetch(urlInfo + '/gethumanos/' + user.id, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + user.token
            }
        });

        if (!resp.ok) throw ('No se pudo realizar la petición');
        
        const humanos = await resp.json();

        return humanos;
    }
    catch (error) {
        throw error;
    }
}

export const fetchAsigPruebas = async() =>  { 
    try {
        const resp = await fetch(urlPruebas + '/gethumanosasig/' + user.id, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + user.token
            }
        });
        if(!resp.ok) throw ('No se pudo realizar la petición');
        const humanosAsig = await resp.json();

        return humanosAsig;
    }
    catch (error) {
        throw error;
    }
}

export const asignarPruebas = async(asignacion) => {
    const resp = await fetch(urlPruebas
        + '/asignarprueba', {
    method: 'POST',
    body: JSON.stringify(asignacion),
    headers: {'Content-Type': 'application/json'}
    });

    return await resp.json();
}

