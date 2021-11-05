'use strict'

const API_URL = "api/comment";

let apiResponse = new Vue({
    el: '#apiResponse',
    data: {
        comments: [],

    }
});

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




