"use strict"
// funcion para mostrar u ocultar la clave ingresada
window.addEventListener("load", function() {
    // icono para mostrar contraseña
    let showPassword = document.querySelector('.show-password');
    showPassword.addEventListener('click', () => {
        // elementos input de tipo clave
        let password = document.querySelector('.password');        
        if ( password.type === "text" ) {
            password.type = "password";           
            showPassword.classList.remove('fa-eye-slash');
        } else {
            password.type = "text";            
            showPassword.classList.toggle("fa-eye-slash");
        }
    })
});