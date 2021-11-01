'use strict'

const API_URL = "api/comment";


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
    document.querySelector("#form-comment").addEventListener('submit', addComment);
}

main();
