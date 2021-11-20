
document.addEventListener('DOMContentLoaded', main);
'use strict';
const API_URL = "api/comment";

function addComment(e){
    e.preventDefault();    
    let id = document.querySelector("#id").innerHTML;

    let url = API_URL + "/" + id;
    console.log(url);
    let f = new Date();
    let fecha = (f.getFullYear() + "/" + (f.getMonth() +1) + "/" + f.getDate());
    let formData = new URLSearchParams(new FormData(this));    
    formData.append('fecha', fecha);    
    data = JSON.stringify(Object.fromEntries(formData));
    console.log(data);
    fetch (url, { 
        method : "POST",
        body : data,
        })
        .then(response => response.json())
        .then(data => {
            console.log(data);
            console.log(data.status);
            if (data.status == 'OK'){
                console.log("Comentario agregado con exito");
               // getComments(id);
            }
            else{
                console.log("Error al agregar el comentario");
                
            }
        })
        .catch(error => console.log(error));
    
    getComments(id);
}  

function main(){    
    document.querySelector("#form-comment").addEventListener('submit', addComment);
}