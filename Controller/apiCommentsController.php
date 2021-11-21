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
    private $data;

    
    public function __construct(){
        $this->data = file_get_contents("php://input");
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

    public function getCommentsByVehiculoID($params = null){
        $id = $params[':ID'];
        $comments = $this->model->getCommentsByVehiculoID($id);
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found for this vehicle.", 404);
    }

    public function getCommentsByOrder($params = null){
        $id = $params[':ID'];
        $order = $_GET['order'];
        $column = $_GET['column'];

        if($column == 'fecha' || $column == 'score'){
            if ($order == 'DESC' || $order == 'ASC')
                $comments = $this->model->getCommentsByOrder($id, $column, $order);
        }
        else
            $comments = [];
              
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found for this vehicle.", 404);
    }

    public function getCommentsByScore($params = null){
        $id = $params[':ID'];
        $score = $_GET['score'];
        $comments = $this->model->getCommentsByScore($id, $score);
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found for this id.", 404);
    }

    public function deleteComment($params = null){
        if($this->loginHelper->sessionStarted() && ($_SESSION['ROL'] == 1)){
            $id = $params[':ID'];
            $this->model->deleteComment($id);           
            $this->view->response("Comment deleted", 200);           
        }
        else {
            $this->view->response("You must be administrator to delete a comment", 401);
            $this->generalView->showMsje(RAMACOMMENTS, "Debe ser administrador para poder eliminar un comentario.");
        }     
    }

    public function addComment($params = null){
        if($this->loginHelper->sessionStarted()){
            $id_vehiculo = $params[':ID'];
            $body = $this->getBody();
            if (!empty($body->comment)){
                $this->model->addComment($body->id_usuario, $id_vehiculo, $body->fecha, $body->comment, $body->score);
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

    private function getBody() {
        $body = json_decode($this->data);       
        return $body;
    }


}