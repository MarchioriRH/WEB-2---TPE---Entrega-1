<?php

class ApiCommentsView{

    // Funcion que envia la respuesta de la consulta y completa algunos datos del encabezado.
    public function response($data, $status) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        echo json_encode($data);
    }

    // Funcion que retorna el estado de la peticion.
    private function _requestStatus($code) {
        $status = array(
            200 => 'OK',
            404 => 'Not Found',
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        );
        return (isset($status[$code]))?$status[$code]:$status[500];
    }
}