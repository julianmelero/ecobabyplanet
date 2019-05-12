<?php
require_once getcwd()."/model/productos.php";
class productos {   
    function ver(){
        session_start();
    // Comprobamos que pueda acceder
    if(isset($_SESSION["rol"])){
        $productos = new model_productos("ecobabyplanet");
        $resultado = $productos->get_productos();
        require_once getcwd()."/view/productos.php"; 
    }
    else{
        header( "Location: index.php");
    }

    }

}
?>