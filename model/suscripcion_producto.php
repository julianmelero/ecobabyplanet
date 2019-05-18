<?php
include_once "model.php";

class model_suscripcion_producto extends model{

    public function get() {
        $sql = "SELECT * FROM suscripcion_tiene_producto";
        return $this->query($sql, array());
    }
    function get_suscripciones($id_suscripcion){
        $sql = "SELECT * FROM suscripcion where id_suscripcion= ?";
        return $this->query($sql, array($id_suscripcion));
    }
}


