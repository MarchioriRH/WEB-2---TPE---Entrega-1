
'use strict';

//const API_URL = "api/comment/";

//let btnsEliminar = document.querySelectorAll('#delComment');
async function deleteComment(event){
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
}
deleteComment();


