const urlInfo = 'http://localhost:8000/api/info';


export const fetchDestino = async() => {
    try {
        const resp = await fetch(urlInfo + '/getdestino'); // + el user
        if(!resp.ok) throw ('No se pudo realizar la petición');
        const {cantDestino} = await resp.json();
        
        return cantDestino;
    }
    catch (error) {
        throw error;
    }
}

export const fetchCaracteristicas = async() => {
    try {
        const resp = await fetch(urlInfo + '/getcaracteristicas'); // + el user
        if(!respuesta.ok) throw ('No se pudo realizar la petición');
        const caracteristicas = await resp.json();

        return caracteristicas;
    }
    catch (error) {
        throw error;
    }
}

export const updateCaracteristicas = async(user, caracteristicas) => {
    const resp = await fetch(urlInfo + '/updatecaracteristicas', { // + el user
        method: 'PUT', 
        body: JSON.stringify(caracteristicas),
        headers: {'Content-Type': 'application/json'} 
    });
    
    return await resp.json(); 
}

export const insertPreguntaEleccion = async(datos) => {

    const resp = await fetch(urlInsertPruebas
            + '/insertpruebaeleccion', {
        method: 'POST',
        body: JSON.stringify(datos),
        headers: {'Content-Type': 'application/json'} 
        });

    return await resp.json();
}

export const insertPruebaPuntual = async(datos) => {

    const resp = await fetch(urlInsertPruebas
            + '/insertpruebapuntual', {
        method: 'POST',
        body: JSON.stringify(datos),
        headers: {'Content-Type': 'application/json'}
        });

    return await resp.json();
}