
document.addEventListener('DOMContentLoaded', main);
'use strict';
const API_URL = "api/comment";



async function addComment(e){
    e.preventDefault();
    let url = API_URL;
    console.log(url);
    var f = new Date();
    let fecha = (f.getFullYear() + "/" + (f.getMonth() +1) + "/" + f.getDate());
    /*let formElement = document.querySelector("#form-comment");
    formData = new FormData(formElement);
    formData.append(fecha);*/
    let data = { // new URLSearchParams(new FormData("this"));/*{
        "id_usuario": document.querySelector("input[name=id_usuario]").value,
        "id_vehiculo": document.querySelector("input[name=id_vehiculo]").value,
        "fecha": fecha,
        "comment": document.querySelector("#comment").value,
        "score": document.querySelector("input[name=score]").value,
    };
    try {
        await fetch (url, { 
            "method": "POST",
            "headers": { "Content-type": "application/json" },
            "body": JSON.stringify(data),
            })
            .then(response => response.text()) // el servidor nos devuelve HTML
                .then(html => console.log(html))
    } catch (error) {
        console.log(error);
    }
    window.location.href = "verCatalogoVehiculos";
}  

function main(){
    
    let id = document.querySelector("#id").innerHTML;
    let flag = document.querySelector("#flag").innerHTML;
    document.querySelector("#form-comment").addEventListener('submit', addComment);
}