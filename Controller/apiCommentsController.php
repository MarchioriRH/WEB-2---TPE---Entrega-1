<?php

include 'Model/ApiCommentsModel.php';
include 'View/ApiCommentsView.php';

class ApiCommentsController{

    private $model;
    private $view;
    
    public function __construct(){
        
        $this->model = new ApiCommentsModel();
        $this->view = new ApiCommentsView();
    }

    public function getComment($params = null){
        $id = $params[':ID'];
        $comments = $this->model->getComment($id);
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found with this ID", 404);
     
    }

    public function getAllComments(){
        $comments = $this->model->getAllComments();
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found", 404);
     
    }

    public function getCommentsByUserID($params = null){
        $id = $params[':ID'];
        $comments = $this->model->getCommentsByUserID($id);
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found from this user.", 404);
    }

    public function getCommentsByVehiculoID($params = null){
       $id = $params[':ID'];
        $comments = $this->model->getCommentsByVehiculoID($id);
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found for this vehicle.", 404);
    }

    public function deleteComment($params = null){
        $id = $params[':ID'];
        $this->model->deleteComment($id);
        $this->view->response("Comment deleted", 200);        
    }

    public function addComment($params = null){
        $added = 0;
        $body = $this->getBody();
        var_dump($body);
        if($body){
            $added = $this->model->addComment($body->id_usuario, $body->id_vehiculo, $body->fecha, $body->comment, $body->score);
        }   
        if ($added != 0){   
            $this->view->response("Comment added", 200);
        }
        else
            $this->view->response("Error adding comment", 404);
    }

    public function updateComment($params = null){
        $updated = 0;
        $id = $params[':ID'];
        $body = $this->getBody();
        if($body){
            $this->model->updateComment($id, $body->fecha, $body->comment, $body->score);
            $this->view->response("Comment updated", 200);
        } else
            $this->view->response("Error updating comment", 404);
    }

    public function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }


}