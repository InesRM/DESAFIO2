
export const cargarUserLs = () => {
    const user = (localStorage.getItem('user')) 
        ? JSON.parse(localStorage.getItem('user'))
        : [];

        return user;
}

export const guardarUserLs = (user) => {
    localStorage.setItem('user', JSON.stringify(user));
}