<?php
require_once getcwd()."/model/productos.php";
class productos {   
    function ver(){
    // Llamamos a la página principal
    $productos = new model_productos("ecobabyplanet");
    $resultado = $productos->get_productos();
    require_once getcwd()."/view/productos.php"; 

    }

}
?>