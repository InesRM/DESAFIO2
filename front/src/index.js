import './css/styles.css';
import {iniciar} from './js/componentes';
import {ancho} from './js/componentes';
import {registrarse} from './js/componentes';
import {init} from './js/validation';

//FUNCIONES
init();
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciar);
document.getElementById("btn__registrarse").addEventListener("click", registrarse);
window.addEventListener("resize", ancho);


