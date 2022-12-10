const {rellenarContPruebas, rellenarContHumanos, pintarAsignarPruebas} = require("../asignarPruebas/asignarPruebasComponentes");
const {fetchPruebas, fetchHumanos, fetchAsigPruebas, asignarPruebas} = require("../http/httpProvider");
const {guardarHumanosLs} = require("../localStorage/localStorage");


const resolverEnOrden = async() => {
    const humanos = await fetchHumanos();
    console.warn(humanos);
    const pruebas = await fetchPruebas();
    console.warn(pruebas);
    const humanosPruebas = await fetchAsigPruebas();

    rellenarContHumanos(humanos);
    rellenarContPruebas(pruebas);
    pintarAsignarPruebas(humanosPruebas, humanos);
}

resolverEnOrden();

// fetchHumanos().then(rellenarContHumanos);
// fetchPruebas().then(rellenarContPruebas);
// fetchAsigPruebas().then(pintarAsignarPruebas);