<?php

require_once getcwd()."/model/suscripcion.php";
require_once getcwd()."/model/productos.php";

class suscripcion {
    
    function ver_suscripciones() {
        
        // Llamamos a la página principal
        
        require_once getcwd()."/view/suscripciones.php";
    }

    function listar_suscripciones() {
        
        $suscripciones = new model_suscripcion("ecobabyplanet2");
        $productos = new model_productos("ecobabyplanet2");
        $resultado = $suscripciones->getLista();
        $resultado_suscripciones = $suscripciones->get_suscrip();

        require_once getcwd()."/view/suscripciones.php";
    }

}