<?php
include_once 'View/CommentsView.php';
include_once 'Helpers/LoginHelpers.php';
class CommentsController {

    private $view;
    private $session;
    private $pagina;

    public function __construct()    {
        $this->view = new CommentsView();
        $this->session = new LoginHelpers();
        if (isset($_GET['pagina']))
            $this->pagina = $_GET['pagina'];
        else
            $this->pagina = 1;
    }

    public function showComments($id){
        if(isset($_GET['fromCat']))
            $this->view->showComments($id, $_GET['fromCat'], $this->pagina);
        else
            $this->view->showComments($id, null, $this->pagina);
    }

    public function addComment($id){
        if ($this->session->sessionStarted())
            $this->view->addComment($id, $this->pagina);
    }

}