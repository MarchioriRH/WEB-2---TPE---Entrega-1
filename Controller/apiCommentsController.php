<?php

include_once 'Model/ApiCommentsModel.php';
include_once 'View/ApiCommentsView.php';
include_once 'Helpers/LoginHelpers.php';
include_once 'View/GeneralView.php';
const RAMACOMMENTS = 'RamaComments';

class ApiCommentsController{

    private $model;
    private $view;
    private $loginHelper;
    private $generalView;

    
    public function __construct(){
        
        $this->model = new ApiCommentsModel();
        $this->view = new ApiCommentsView();
        $this->loginHelper = new LoginHelpers();
        $this->generalView = new GeneralView();
    }

    public function getComment($params = null){
        $id = $params[':ID'];
        $comments = $this->model->getComment($id);
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found for the id = $id", 404);
     
    }

    public function getAllComments(){
        $comments = $this->model->getAllComments();
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found", 404);
     
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
        if($this->loginHelper->sessionStarted() && ($_SESSION['ROL'] == 1)){
            $id = $params[':ID'];
            $comments = $this->model->deleteComment($id);
            if ($comments){
                $this->view->response("Comment deleted", 200);
            }
            else 
                $this->view->response("No comments found with this ID", 404);
        }
        else {
            $this->view->response("You must be administrator to delete a comment", 401);
            $this->generalView->showMsje(RAMACOMMENTS, "Debe ser administrador para poder eliminar un comentario.");
        }     
    }

    public function addComment($params = null){
        if($this->loginHelper->sessionStarted()){
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
        else {
            $this->view->response("You must be logged in to add a comment", 401);
            $this->generalView->showMsje(RAMACOMMENTS, "Debe estar logueado para poder agregar un comentario.");
        }
    }

    public function getBody() {
        $bodyString = file_get_contents("php://input");
        return json_decode($bodyString);
    }


}