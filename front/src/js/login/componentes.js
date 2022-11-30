
import "../../styles.scss";
// import * as webpacklogo from "../assets/img/webpack-logo.png";

//FUNCIONES
 // Img
    // const img = document.createElement('img');
    // img.src = webpacklogo;
    // document.body.style( img );

const anchoPage = () => {
  let formulario_login = document.querySelector(".formulario__login");
  let formulario_register = document.querySelector(".formulario__register");
  let contenedor_login_register = document.querySelector(".contenedor__login-register");
  let caja_trasera_login = document.querySelector(".caja__trasera-login");
  let caja_trasera_register = document.querySelector(".caja__trasera-register");
  
  if (window.innerWidth > 850) {
    caja_trasera_register.style.display = "block";
    caja_trasera_login.style.display = "block";
  } else {
    caja_trasera_register.style.display = "block";
    caja_trasera_register.style.opacity = "1";
    caja_trasera_login.style.display = "none";
    formulario_login.style.display = "block";
    contenedor_login_register.style.left = "0px";
    formulario_register.style.display = "none";
  }
};

anchoPage();

const iniciarSesion = () => {
  let formulario_login = document.querySelector(".formulario__login");
  let formulario_register = document.querySelector(".formulario__register");
  let contenedor_login_register = document.querySelector(".contenedor__login-register");
  let caja_trasera_login = document.querySelector(".caja__trasera-login");
  let caja_trasera_register = document.querySelector(".caja__trasera-register");
  
  if (window.innerWidth > 850) {
    formulario_login.style.display = "block";
    contenedor_login_register.style.left = "10px";
    formulario_register.style.display = "none";
    caja_trasera_register.style.opacity = "1";
    caja_trasera_login.style.opacity = "0";
  } else {
    formulario_login.style.display = "block";
    contenedor_login_register.style.left = "0px";
    formulario_register.style.display = "none";
    caja_trasera_register.style.display = "block";
    caja_trasera_login.style.display = "none";
  }
};

const register = () => {
  let formulario_login = document.querySelector(".formulario__login");
  let formulario_register = document.querySelector(".formulario__register");
  let contenedor_login_register = document.querySelector(".contenedor__login-register");
  let caja_trasera_login = document.querySelector(".caja__trasera-login");
  let caja_trasera_register = document.querySelector(".caja__trasera-register");
  if (window.innerWidth > 850) {
    formulario_register.style.display = "block";
    contenedor_login_register.style.left = "410px";
    formulario_login.style.display = "none";
    caja_trasera_register.style.opacity = "0";
    caja_trasera_login.style.opacity = "1";
  } else {
    formulario_register.style.display = "block";
    contenedor_login_register.style.left = "0px";
    formulario_login.style.display = "none";
    caja_trasera_register.style.display = "none";
    caja_trasera_login.style.display = "block";
    caja_trasera_login.style.opacity = "1";
  }
};

export const ancho = () => {
  anchoPage();
};
export const iniciar = () => {
  iniciarSesion();
};
export const registrarse = () => {
  register();
};
// export const img = () => {
//   document.getElementById("body").style.backgroundImage = "url(" + webpacklogo + ")";
// }
