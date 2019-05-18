<?php
include_once "model.php";

class model_suscripcion_producto extends model{

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

    function eliminar_producto($parametros){
        $sql = "DELETE FROM suscripcion_tiene_producto WHERE id_suscripcion= ? and id_producto = ?";        
        return $this->query($sql, array($parametros["id_suscripcion"], $parametros["id_producto"]));        
    }

    function insertar_producto($parametros){
        $sql = "INSERT INTO suscripcion_tiene_producto (id_suscripcion,id_producto ) VALUES (?,?); ";        
        return $this->query($sql, array($parametros["id_suscripcion"], $parametros["id_producto"]));        
    }
}


