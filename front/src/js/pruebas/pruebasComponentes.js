// Mario (todo el archivo)
export const limpiarForm = (id) => {
    console.log(id);
    const form = document.getElementById(id);
    console.log(form);
    
    form.reset();
}