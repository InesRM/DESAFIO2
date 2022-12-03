const {rellenarContPruebas, rellenarContHumanos} = require("../asignarPruebas/asignarPruebasComponentes");
const {fetchPruebas, fetchHumanos} = require("../http/httpProvider");

fetchHumanos().then(rellenarContHumanos)
fetchPruebas().then(rellenarContPruebas);