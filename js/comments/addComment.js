document.addEventListener('DOMContentLoaded', main);
'use strict';
const API_URL = "api/comment";

// Funcion encargada de enviar los datos del formulario a la API.
function addComment(e){
    e.preventDefault();    
    let id = document.querySelector("#id").innerHTML;
    let url = API_URL + "/" + id;
    // Se declara una variable de tipo Date para obtener la fecha actual.
    let f = new Date();
    // Se obtiene la fecha actual en formato yyyy/mm/dd.
    let fecha = (f.getFullYear() + "/" + (f.getMonth() +1) + "/" + f.getDate());
    // Se obtinen los datos del formulario.
    let formData = new URLSearchParams(new FormData(this));    
    // Se anexa la fecha actual al formulario.
    formData.append('fecha', fecha);   
    // Se convierte el formulario en un objeto JSON. 
    data = JSON.stringify(Object.fromEntries(formData));
    // Se envian los datos al servidor.
    fetch (url, { 
        method : "POST",
        body : data,
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log(data.status);
            if (data == 'Comment added'){
                console.log("Comentario agregado con exito");
                window.location.href ='showComments/' + id;
            }
            else{
                console.log("Error al agregar el comentario");
                window.location.href = 'showComments/' + id;
            }
        })
        .catch(error => console.log(error));
}  

// Funcion principal.
function main(){    
    document.querySelector("#form-comment").addEventListener('submit', addComment);
}