<?php
include_once "model.php";

class model_suscripcion extends model{

    public function getLista() {
        $sql = "SELECT * FROM suscripcion";
        return $this->query($sql, array());
    }
}


