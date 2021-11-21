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

    // Funcion que se encarga de obtener un comentarios en particular de un item.
    public function getComment($params = null){
        $id = $params[':ID'];
        // Se obtiene el comentario de.
        $comments = $this->model->getComment($id);
        // Si hay algun comentario se envia al view, y sino, mostramos un mensaje de error.
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found for the id = $id", 404);     
    }

    // Funcion que se encarga de obtener los comentarios de un item.
    public function getCommentsByVehiculoID($params = null){
        $id = $params[':ID'];
        // Se obtienen los comentarios de un item.
        $comments = $this->model->getCommentsByVehiculoID($id);
        // Si hay algun comentario se envian al view, y sino, mostramos un mensaje de error.
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found for this vehicle.", 404);
    }

    // Funcion que se encarga de obtener los comentarios ordenados de un item.
    public function getCommentsByOrder($params = null){
        $id = $params[':ID'];
        $order = $_GET['order'];
        $column = $_GET['column'];
        // Si los datos enviados en el GET son correctos, se obtienen los comentarios de acuerdo a
        // los parametros enviados.
        if($column == 'fecha' || $column == 'score'){
            if ($order == 'DESC' || $order == 'ASC')
                $comments = $this->model->getCommentsByOrder($id, $column, $order);
        }
        else
            $comments = [];
        // Si hay comentarios se envian al view, y sino, se muestra un mensaje de error.     
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found for this vehicle.", 404);
    }

    // Funcion encargada de filtrar los comentarios de acuerdo al puntaje.
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


    // Funcion encargada de eliminar un comentario.
    public function deleteComment($params = null){
        // Si el usuario esta logueado y ademas es administrador, se procede a eliminar el comentario.
        if($this->loginHelper->sessionStarted() && ($_SESSION['ROL'] == 1)){
            $id = $params[':ID'];
            $this->model->deleteComment($id);           
            $this->view->response("Comment deleted", 200);           
        }
        // Si el usuario no tiene los permisos necesarios se muestra un mensaje de error.
        else {
            $this->view->response("You must be administrator to delete a comment", 401);
            $this->generalView->showMsje(RAMACOMMENTS, "Debe ser administrador para poder eliminar un comentario.");
        }     
    }

    // Funcion encargada de crear un comentario.
    public function addComment($params = null){
        // Si el usuario esta logueado, se procede a crear el comentario.
        if($this->loginHelper->sessionStarted()){
            $id_vehiculo = $params[':ID'];
            // Se obtiene el body del comentario.
            $body = $this->getBody();
            // Si no esta vacio, se procede a crear el comentario, sino se muestra un mensaje de error.
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

    // Funcion encargada de obtener el body del comentario enviado desde el POST.
    private function getBody() {
        $body = json_decode($this->data);       
        return $body;
    }


}