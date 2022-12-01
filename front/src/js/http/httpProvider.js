const urlInfo = 'http://127.0.0.1:8000/api/info';
const urlPruebas = 'http://127.0.0.1:8000/api/pruebas';


export const fetchDestino = async() => {
    try {
        const resp = await fetch(urlInfo + '/getdestino/1'); // + el user
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
        const resp = await fetch(urlInfo + '/getcaracteristicas/1'); // + el user
        if(!resp.ok) throw ('No se pudo realizar la petición');
        const caracteristicas = await resp.json();

        return caracteristicas;
    }
    catch (error) {
        throw error;
    }
}

export const updateCaracteristicas = async(caracteristicas) => {

    const resp = await fetch(urlInfo + '/updatecaracteristicas/1', { // + el user
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