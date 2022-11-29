const urlDestino = 'http://localhost:8000/api/info/getdestino';
const urlCaracteristicas = 'http://localhost:8000/api/info/getcaracteristicas';


export const fetchDestino = async() => {
    try {
        const resp = await fetch(urlDestino); // + el user
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
        const resp = await fetch(urlGetCaracteristicas); // + el user
        if(!respuesta.ok) throw ('No se pudo realizar la petición');
        const caracteristicas = await resp.json();

        return caracteristicas;
    }
    catch (error) {
        throw error;
    }
}