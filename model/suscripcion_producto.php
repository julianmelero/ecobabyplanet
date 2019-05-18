<?php
include_once "model.php";

class model_suscripcion_producto extends model{

    public function get() {
        $sql = "SELECT * FROM suscripcion_tiene_producto";
        return $this->query($sql, array());
    }
}


