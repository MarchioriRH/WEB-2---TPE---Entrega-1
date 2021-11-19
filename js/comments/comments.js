document.addEventListener("DOMContentLoaded", main);

'use strict'

const API_URL = "api/comment";

let apiResponse = new Vue({
    el: '#apiResponse',
    data: {
        comments: [],
    },
    props: {
        id : {
            type: String,
            default: document.querySelector('#id').value,
        },
        rol : {
            type: String,
            default: document.querySelector('#rol').value,
        },
        sort : {
            type: String,
            default: "bi bi-sort-down-alt",
        },
        sortNumeric : {
            type: String,
            default: "bi bi-sort-numeric-down",
        },
        order : {
            type: String,
            default: "ASC",
        },
        session : {
            type: String,
            default: document.querySelector('#logged').value,
        }
    }
});

function getComments(id) {
    let url = API_URL + "s/byVehicle/" + id;
    proccessResponse(url);
}

function filterByScore($id){
    let score = 0;
    if(document.querySelector('#inlineRadio1').checked){
        score = 1;
    } else if(document.querySelector('#inlineRadio2').checked){
        score = 2;
    } else if(document.querySelector('#inlineRadio3').checked){ 
        score = 3;
    } else if(document.querySelector('#inlineRadio4').checked){
        score = 4;
    } else if(document.querySelector('#inlineRadio5').checked){
        score = 5;
    } else if(document.querySelector('#inlineRadio6').checked){
        getComments($id);
        return;
    }
    let url = API_URL + "s/byScore/" + $id + "?score=" + score;
    proccessResponse(url);
}

function getCommentsOrd(column, id, order) {
   
    if (order == "ASC") {
        apiResponse.order = "DESC";
    } else {
        apiResponse.order = "ASC";
    }

    if (order == "DESC" && column == "fecha") {
        apiResponse.sort = "bi bi-sort-up-alt";
    } else if (order == "ASC" && column == "fecha") {
        apiResponse.sort = "bi bi-sort-down-alt";
    } else if (order == "DESC" && column == "score") {
        apiResponse.sortNumeric = "bi bi-sort-numeric-up";
    } else if (order == "ASC" && column == "score") {
        apiResponse.sortNumeric = "bi bi-sort-numeric-down";
    }

    let url = API_URL + "s/byOrder/" + id + '?column=' + column + '&order=' + order;
    proccessResponse(url);
}

async function proccessResponse(url) {
    let comments = [];
    try {
        let response = await fetch(url);
        if (response.ok) {
            comments = await response.json();
            apiResponse.comments = comments;
        } else {
            apiResponse.comments = [];
        }
    } catch (e) {
        console.log(e);
    } 
}

async function deleteComment(idComment, idVehicle) {
    let url = API_URL + "/" + idComment;
    try {
        let response = await fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            }
        });
       console.log(response);
    } catch (e) {
        console.log(e);
    }
    getComments(idVehicle);
}

function main() {
    getComments(document.querySelector('#id').value);
}





