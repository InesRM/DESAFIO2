const urlDestino = 'http://localhost:8000/api/cantdestino';

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