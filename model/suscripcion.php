<?php
include_once "model.php";

class model_suscripcion extends model{

    public function getLista() {
        $sql = "SELECT * FROM suscripcion";
        return $this->query($sql, array());
    }

    public function get($id) {
        $sql = "SELECT * FROM suscripcion_tiene_producto WHERE id_suscripcion = ?";
        return $this->query($sql, array($id));
    }
    public function get_suscrip() {
        $sql = "SELECT * FROM suscripcion";
        return $this->query($sql, array());
    }
    function get_suscripciones($id_suscripcion){
        $sql = "SELECT * FROM suscripcion WHERE id_suscripcion= ?";        
        return $this->query($sql, array($id_suscripcion));
    }

}