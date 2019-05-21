<?php
include_once "model.php";

class model_mis_suscripciones extends model {

    function get_mis_suscripciones($id) {
        $sql="SELECT * FROM suscripcion s
        INNER JOIN usuario_compra_suscripcion u
        ON s.id_suscripcion = u.id_suscripcion
        WHERE u.id_usuario = ?;";
        return $this->query($sql,array($id));
    }


    function cancelar_suscripcion($id){
        $sql="DELETE FROM usuario_compra_suscripcion
        WHERE id_usuario = ?;";
        return $this->query($sql,array($id));
    }



}

?>