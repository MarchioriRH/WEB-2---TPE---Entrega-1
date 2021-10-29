<?php

include 'Model/apiCommentsModel.php';
include 'View/apiCommentsView.php';

class ApiCommentsController{

    private $model;
    private $view;
    
    public function __construct(){
        
        $this->model = new ApiCommentsModel();
        $this->view = new ApiCommentsView();
    }

    
    public function getAllComments(){
        $comments = $this->model->getAllComments();
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found", 404);
     
    }

    public function getCommentsByUserID($params = []){
        $userID = $params[':ID'];
        if (!$params['vehiculo']){
            $comments = $this->model->getCommentsByUserID($userID);
            if ($comments){
                $this->view->response($comments, 200);
            }
            else 
                $this->view->response("No comments found", 404);
        }
        else
            getCommentsByVehiculoID($params);
    }

    public function getCommentsByVehiculoID($params = []){
        $userID = $params[':ID'];
        $comments = $this->model->getCommentsByUserID($userID);
        if ($comments){
            $this->view->response($comments, 200);
        }
        else 
            $this->view->response("No comments found", 404);
    }

}