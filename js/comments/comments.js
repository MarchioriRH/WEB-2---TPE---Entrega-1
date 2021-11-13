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
        logged : {
            type: String,
            default: document.querySelector('#logged').value,
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
            default: "DESC",
        },
    }
});

async function filterByScore($id){
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
    let url = API_URL + "/byScore/" + $id + "?score=" + score;
    let comments = [];
    try {
        let response = await fetch(url);
        comments = await response.json();
        if(response.ok){
            apiResponse.comments = comments;
        } else {
            console.log("Error: " + response.status);
        }
    } catch (e) {
        console.log(e);
    }
}

async function getCommentsOrd(column, id, order) {
   
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

    let url = API_URL + "/byOrder/" + id + '?column=' + column + '&order=' + order;
    
    let comments = [];
    try {
        let response = await fetch(url);
        console.log(response);
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
    await getComments(idVehicle);
}

async function getComments(id) {
    let url = API_URL + "/byVehicle/" + id;
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
    console.log(comments);
}

function main(){
    let id = document.querySelector("#id").value;
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




