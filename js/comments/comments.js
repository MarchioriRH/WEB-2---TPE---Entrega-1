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
            default: document.querySelector('#id').value
        }
    }
});

async function getCommentsOrd(column, id){
    let order = null;
    let sense = 0;
    if (sense == 0) {
        order = "ASC";
        sense = 1;
    } else {
        order = "DESC";
        sense = 0;
    }
    
    let url = API_URL + "/byOrder/" + id + '?column=' + column + '&order=' + order;
    console.log(url);
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
    let url = API_URL + "/ByVehicle/" + id;
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




