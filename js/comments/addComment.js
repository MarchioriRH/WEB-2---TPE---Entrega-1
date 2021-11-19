
document.addEventListener('DOMContentLoaded', main);
'use strict';
const API_URL = "api/comment";

function addComment(e){
    e.preventDefault();
    let url = API_URL;
    console.log(url);
    var f = new Date();
    let id = document.querySelector("#id").innerHTML;
    let fecha = (f.getFullYear() + "/" + (f.getMonth() +1) + "/" + f.getDate());
    const formData = new URLSearchParams(new FormData(this));
    formData.append('fecha', fecha);
    fetch (url, { 
        method : "POST",
        body : formData,
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            if (data.status == "\"OK\""){
                console.log("Comentario agregado con exito");
                window.location.href = 'showComments/' + id;
            }
            else{
                console.log("Error al agregar el comentario");
            }
        })
        .catch(error => console.log(error));
    
    window.location.href = 'showComments/' + id;
}  

function main(){    
    document.querySelector("#form-comment").addEventListener('submit', addComment);
}