'use strict'

//const API_URL = "api/comment/";

document.querySelector('#delComment').addEventListener('click', async function(event){
    event.preventDefault();
    let id = document.querySelector('#idComment').value;
    let url = API_URL + id;
    try {
        let response = await fetch(url, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json'
            }
        });
        if (response.ok) {
            let comments = await response.json();
            apiResponse.comments = comments;
        } else {
            apiResponse.comments = [];
        }
    } catch (e) {
        console.log(e);
    }
});


