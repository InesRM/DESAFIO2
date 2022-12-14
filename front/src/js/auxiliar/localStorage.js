// token= window.localStorage.getItem('token');


const recuperarToken = (user) => window.localStorage.getItem('token',user);
const guardarToken = (data) => window.localStorage.setItem('token', JSON.stringify(data.token));


export {
    guardarToken,
    recuperarToken,
}


   






