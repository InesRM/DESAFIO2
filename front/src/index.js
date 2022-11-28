import './styles.scss';
import {iniciar} from './js/login/componentes';
import {ancho} from './js/login/componentes';
import {registrarse} from './js/login/componentes';
import {init} from './js/login/validation';

//FUNCIONES
init();
document.getElementById("btn__iniciar-sesion").addEventListener("click", iniciar);
document.getElementById("btn__registrarse").addEventListener("click", registrarse);
window.addEventListener("resize", ancho);