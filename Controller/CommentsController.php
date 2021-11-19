<?php
include_once 'View/CommentsView.php';
include_once 'Helpers/LoginHelpers.php';
class CommentsController {

    private $view;
    private $session;

    public function __construct()    {
        $this->view = new CommentsView();
        $this->session = new LoginHelpers();
    }

    public function showComments($id){
        if(isset($_GET['fromCat']))
            $this->view->showComments($id, $_GET['fromCat']);
        else
            $this->view->showComments($id);
    }

    public function addComment($id){
        if ($this->session->sessionStarted())
            $this->view->addComment($id);
    }

}