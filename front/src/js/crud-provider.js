const urlCRUD = 'http://localhost:8000/api/users';


const crearUsuario = async(usuario) => {
    const resp = await fetch(urlCRUD, {
        method: 'POST',
        body: JSON.stringify(usuario),
        headers: {
            'Content-Type': 'application/json' //Decimos al backend que la información que mando es JSON
        }
    });
    return await resp.json();
}

export {
    crearUsuario
}

const consultarUsuario = async(id, user) => {
    const resp = await fetch(`${urlCRUD}/${id}`, {
    method: 'GET',
    body: JSON.stringify(user),
    headers: {
        'Content-Type': 'application/json' //Decimos al backend que la información que mando es JSON
    }
});
    return await resp.json();
}
export {
    consultarUsuario
}

const actualizarUsuario = async(id, user) => {
    const resp = await fetch(`${urlCRUD}/${id}`, {
    method: 'PUT',
    body: JSON.stringify(user),
    headers: {
        'Content-Type': 'application/json; charset=UTF-8' //Decimos al backend que la información que mando es JSON
    }
});
    return await resp.json();
}
export {
    actualizarUsuario
}

const matarUsuario = async(id) => {
    const resp = await fetch(`${urlCRUD}/${id}`, {
    method: 'DELETE',
    headers: {
        'Content-Type': 'application/json' //Decimos al backend que la información que mando es JSON
    }
});
    return await resp.json();
}
export {
    matarUsuario
}