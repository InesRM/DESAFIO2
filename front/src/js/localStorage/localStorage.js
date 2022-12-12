
export const cargarHumanosLs = () => {
    const humanos = (localStorage.getItem('humano')) 
        ? JSON.parse(localStorage.getItem('humano'))
        : [];

        return humanos;
}

export const guardarHumanosLs = (humanos) => {
    localStorage.setItem('humanos', JSON.stringify(humanos));
}