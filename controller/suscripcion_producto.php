<?php

require_once getcwd()."/model/suscripcion_producto.php";
require_once getcwd()."/model/productos.php";

class suscripcion_producto {
    
    function listar_suscripciones_productos() {
        
        $suscripciones = new model_suscripcion_producto("ecobabyplanet");
        $productos = new model_productos("ecobabyplanet");
        $resultado_suscripciones = $suscripciones->get_suscrip();        

        require_once getcwd()."/view/suscripcion_productos.php";
    }

    function eliminar_producto($parametros){
        $suscripciones = new model_suscripcion_producto("ecobabyplanet");
        $suscripciones->eliminar_producto($parametros);
        header("Location: index.php?metodo=suscripcion_producto&accion=listar_suscripciones_productos");
        
    }
}