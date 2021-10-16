"use strict"
// funcion para mostrar u ocultar la ccontraseña ingresada
window.addEventListener("load", function() {
    // se selecciona la clase show-password y se espera el evento click
    let showPassword = document.querySelector('.show-password');
    showPassword.addEventListener('click', () => {
        // la variable password toma la clase password
        let password = document.querySelector('.password'); 
        // si el tipo de password es text lo cambia a pasword y cambia el icono       
        if ( password.type === "text" ) {
            password.type = "password";           
            showPassword.classList.remove('fa-eye-slash');
        // viceversa del anterior
        } else {
            password.type = "text";            
            showPassword.classList.toggle("fa-eye-slash");
        }
    })
});