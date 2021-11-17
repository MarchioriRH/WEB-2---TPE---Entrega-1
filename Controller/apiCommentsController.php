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

        if($column == 'fecha' && $order == 'DESC')
            $comments = $this->model->getCommentsByDateDESC($id);
        else if($column == 'fecha' && $order == 'ASC')
            $comments = $this->model->getCommentsByDateASC($id);
        else if($column == 'score' && $order == 'DESC')
            $comments = $this->model->getCommentsByScoreDESC($id);
        else if($column == 'score' && $order == 'ASC')
            $comments = $this->model->getCommentsByscoreASC($id);
        
        //$comments = $this->model->getCommentsByOrder($id, $column, $order);
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
            if (!empty($_POST['id_usuario']) && !empty($_POST['id_vehiculo']) && !empty($_POST['comment']) && 
                !empty($_POST['fecha']) && !empty($_POST['score'])){        
                $id_usuario = $_POST['id_usuario'];
                $id_vehiculo = $_POST['id_vehiculo'];
                $comment = $_POST['comment'];
                $fecha = $_POST['fecha'];
                $score = $_POST['score'];    
                $this->model->addComment($id_usuario, $id_vehiculo, $fecha, $comment, $score);
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