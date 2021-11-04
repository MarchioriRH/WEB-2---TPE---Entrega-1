'use strict'

const API_URL = "api/comment/";

function renderizarComentarios(comments){
    if (comments.length > 0) {
        let tabla = document.querySelector('#divTabla');
        tabla.innerHTML = "";
       /* tabla.innerHTML += "<table class='default'>" +
            "<thead>" +
                "<tr>" +
                    "<th>Usuario</th>" +
                    "<th>Fecha</th>" +
                    "<th>Comentario</th>" +            
                    "<th>Accion</th>" +
                "</tr>" +
            "</thead>" +
            "<tbody>";*/
        comments.forEach(comment => {
            tabla.innerHTML += "<tr>" +
                        "<td>" + comment.id_usuario + "</td>" +
                        "<td>" + comment.fecha + "</td>" +
                        "<td>" + comment.comment + "</td>" +
                        "<td hidden='hidden'>" + comment.id_vehiculo + "</td>" +
                        "<td>" +
                        "<button type='button' class='btn btn-danger' onclick='deleteComment(" + comment.id_comment + ")'>Eliminar</button>" +
                        "</td>" +
                    "</tr>";
        });
       /* tabla.innerHTML += "</tbody>" + "</table>";*/
    }


}

async function getComments(id) {
    let url = API_URL + "/ByVehicle/" + id;
    let comments = [];
    try {
        let response = await fetch(url);
        if (response.ok) {
            comments = await response.json();
           
        } else {
            comments = [];
        }
    } catch (e) {
        console.log(e);
    } 
    console.log(comments);
    renderizarComentarios(comments);
}

async function getAllComments() {
    let url = API_URL;
    console.log(url);
    try {
        let response = await fetch(url);
        
        if (response.ok) {
            let comments = await response.json();
            console.log(comments);
           
        } else {
            comments = [];
        }
    } catch (e) {
        console.log(e);
    } renderizarComentarios(comments);
}


function main(){
    let id = document.querySelector("#id").innerHTML;
    let flag = document.querySelector("#flag").innerHTML;
    switch(flag){
        case "ByVehicle":
            getComments(id);
            break;
        case "All":   
            getAllComments();
            break; 
    }
}


main();




