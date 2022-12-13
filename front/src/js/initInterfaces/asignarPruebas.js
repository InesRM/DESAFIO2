import '../../styles.scss';
import * as bootstrap from 'bootstrap';

const {rellenarContPruebas, rellenarContHumanos, pintarAsignarPruebas} = require("../asignarPruebas/asignarPruebasComponentes");
const {fetchPruebas, fetchHumanos, fetchAsigPruebas, asignarPruebas} = require("../http/httpProvider");
const {guardarHumanosLs} = require("../localStorage/localStorage");


const resolverEnOrden = async() => {
    const humanos = await fetchHumanos();
    const pruebas = await fetchPruebas();
    const humanosPruebas = await fetchAsigPruebas();

    rellenarContHumanos(humanos);
    rellenarContPruebas(pruebas);
    pintarAsignarPruebas(humanosPruebas, humanos);
}

resolverEnOrden().then(data => {
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
});