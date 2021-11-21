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
        // Se setea el numero de pagina.
        if (isset($_GET['pagina']))
            $this->pagina = $_GET['pagina'];
        else
            $this->pagina = 1;
    }

    // Funcion que muestra todos los comentarios y pasa la variables a la vista dependiendo del origen de la peticion.
    public function showComments($id){
        if(isset($_GET['fromCat']))
            $this->view->showComments($id, $_GET['fromCat'], $this->pagina);
        else
            $this->view->showComments($id, null, $this->pagina);
    }

    // Funcion encargada de mostrar la vista para agregar un comentario.
    public function addComment($id){
        if ($this->session->sessionStarted())
            $this->view->addComment($id, $this->pagina);
    }

}