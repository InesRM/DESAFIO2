import { crearUsuario } from "./crud-provider";
// import { eliminarUsuario } from "./crud-provider";
// import { editarUsuario } from "./crud-provider";
import { consultarUsuario } from "./crud-provider";

const form = document.getElementById("loginForm");
const form2 = document.getElementById("registerForm");
const email = document.getElementById("email");
const btn= document.getElementById("entrar");
const emailError = document.querySelector("span.error");
const password = document.getElementById("password");
const passwordError = document.querySelector("span.error");
const name= document.getElementById('name');
const nameError = document.querySelector("span.error");
//const name= document.getElementById('name');

const init = () => {
  validation();
};

const validation = () => {
  email.addEventListener("input", (event) => {
    if (email.validity.valid) {
      emailError.innerHTML = ""; //Restablece el contenido del mensaje
      emailError.className = "error"; //Restablece el estado visual el mensaje
    } else {
      //Si todavía hay error, muestra el error
      showError();
    }
  });
/***********Login********/
  form.addEventListener("onclick", (event) => {
    if (!email.validity.valid) {
      showError();
      event.preventDefault(); //Evitamos que se envíe el formulario
    }else if(!password.validity.valueMissing){
      passwordError.textContent = "El campo no puede estar vacio";
    }
    
    else {
      const data =(document.getElementById(".entrar"));
      const usuario = Object.fromEntries(data);
      consultarUsuario(usuario).then(
        (data) => {
          if (usuario) {
            localStorage.setItem("token", data.token);
            location.href = "http://localhost:8080/html/ok.html";
          } else {
            throw new Error(data.msg);
          }
        },
      );
      event.preventDefault();
    }

    showError();
  });
/***********Register********/
  form2.addEventListener("submit", (event) => {
    if (!email.validity.valid) {
      showError();
      event.preventDefault(); //Evitamos que se envíe el formulario
    }else if(!password.validity.valueMissing){
      passwordError.textContent = "El campo no puede estar vacio";
    }else if(!name.validity.valueMissing){
      nameError.textContent = "El campo no puede estar vacio";
    }else {
      const data = new FormData(
        document.getElementById(".reg")
      );
      const usuario = Object.fromEntries(data);
      crearUsuario(usuario).then(
        (data) => {
          if (data.ok) {
            localStorage.setItem("token", data.token);
            location.href = "http://localhost:8080/html/landing.html";
          } else {
            throw new Error(data.msg);
          }
        },
      );
      event.preventDefault();
    }
    showError();
  });
};

const showError = () => {
  if (email.validity.valueMissing) {
    emailError.textContent = "El campo no se ajusta a un correo estándar";
  } else if (email.validity.typeMismatch) {
    emailError.textContent =
      "El valor introducido debe ser una dirección de correo electrónico.";
  } else if (email.validity.tooShort) {
    emailError.textContent = `El correo electrónico debe tener al menos ${email.minLenght} caracteres.`;
  }else if (password.validity.valueMissing) {
    passwordError.textContent = "El campo no puede estar vacio";
  }else if (name.validity.valueMissing) {
    nameError.textContent = "El campo no puede estar vacio";
  }
  passwordError.className = "error active";
  nameError.className = "error active";
  emailError.className = "error";
};

export { init };
