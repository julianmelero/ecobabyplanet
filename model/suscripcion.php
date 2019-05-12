<?php
include_once "model.php";

class suscripcion {

    public $id_suscripcion;
    public $nombre;
    public $descripcion;
    public $imagen;
    public $precio;
    public $divisa;

    public function listar_suscripciones($id_suscripcion) {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM id_suscripcion = ? ORDER BY id_suscripcion ASC");
            $stm->execute(array($id_suscripcion));
            return $stm->fetchALL (PDO::FETCH_OBJ);
        }
    }



    
}



