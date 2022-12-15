
// Mario (todo el archivo)
export const cargarUserLs = () => {
    const user = (localStorage.getItem('user')) 
        ? JSON.parse(localStorage.getItem('user'))
        : [];

        return user;
}

export const guardarUserLs = (user) => {
    console.log(user);
    localStorage.setItem('user', JSON.stringify(user));
}