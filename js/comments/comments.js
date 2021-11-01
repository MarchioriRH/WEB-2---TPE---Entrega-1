'use strict'

const API_URL = "api/comment/";

let apiResponse = new Vue({
    el: "#apiResponse",
    data: {
        comments: [], 
    },
}); 

async function getComments(id) {
    let url = API_URL + "/ByVehicle/" + id;
    try {
        let response = await fetch(url);
        if (response.ok) {
            let comments = await response.json();
            apiResponse.comments = comments;
        } else {
            apiResponse.comments = [];
        }
    } catch (e) {
        console.log(e);
    }
}

async function getAllComments() {
    let url = API_URL;
    console.log(url);
    try {
        let response = await fetch(url);
        
        if (response.ok) {
            let comments = await response.json();
            console.log(comments);
            apiResponse.comments = comments;
        } else {
            apiResponse.comments = [];
        }
    } catch (e) {
        console.log(e);
    }
}

async function addComment(e){
    e.preventDefault();
    let url = API_URL;
    console.log(url);
    var f = new Date();
    let fecha = (f.getFullYear() + "/" + (f.getMonth() +1) + "/" + f.getDate());
    let data = new URLSearchParams(new FormData(this));

    console.log(data);
    try {
        let response = await fetch (url, { 
            "method": "POST",
            "headers": { "Content-type": "application/json" },
            "body": JSON.stringify(data),
            });


    
    } catch (error) {
        console.log(error);
    }
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
        case "Add":   
            document.querySelector("#form-comment").addEventListener('submit', addComment);
            break;
    }
}

main();
