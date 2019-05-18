<?php

require_once getcwd()."/model/suscripcion_producto.php";
require_once getcwd()."/model/productos.php";

class suscripcion_producto {
    
    function listar_suscripciones_productos() {
        
        $suscripciones = new model_suscripcion_producto("ecobabyplanet");
        $productos = new model_productos("ecobabyplanet");
        $resultado_suscripciones = $suscripciones->get();        

        require_once getcwd()."/view/suscripciones.php";
    }

}