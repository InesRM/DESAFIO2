const urlInfo = 'http://127.0.0.1:8000/api/cosa';
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

export const updateCaracteristicas = async(caracteristicas) => { // EN CUARENTENA

    const resp = await fetch(urlInfo + '/updatecaracteristicas/1', { // + el user
        method: 'PUT', 
        body: JSON.stringify(caracteristicas),
        headers: {'Content-Type': 'application/json'} 
    });

    return await resp.json(); 
}

export const updateCaracteristicas2 = async() => { // EN CUARENTENA
    const options = {
        method: 'PUT',
        body: '{"sabiduria":5,"nobleza":5,"virtud":1,"maldad":4,"audacia":1}'
      };
      
      fetch('http://127.0.0.1:8000/api/cosa/updatecaracteristicas/1', options)
        .then(response => response.json())
        .then(response => console.log(response))
        .catch(err => console.error(err));
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

export const fetchPruebas = async() => {
    try {
        const resp = await fetch(urlPruebas + '/getpruebas');
        if(!resp.ok) throw ('No se pudo realizar la petición');
        // resp.json().then(console.log);
        const pruebas = await resp.json();
        
        return pruebas;
    }
    catch (error) {
        throw error;
    }
}

export const fetchHumanos = async() => {
    try {
        const resp = await fetch(urlInfo + '/gethumanos');
        if (!resp.ok) throw ('No se pudo realizar la petición');
        
        const humanos = await resp.json();

        console.log(humanos);
        return humanos;
    }
    catch (error) {
        throw error;
    }
}

