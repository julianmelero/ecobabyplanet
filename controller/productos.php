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

    function nuevo(){
        session_start();
    // Comprobamos que pueda acceder
    if(isset($_SESSION["rol"])){
        $productos = new model_productos("ecobabyplanet");        
        require_once getcwd()."/view/nuevo_producto.php";    
    }
    else{
        header( "Location: index.php");
    }

    }

    function guardar($parametros){
        session_start();
    // Comprobamos que pueda acceder
    if(isset($_SESSION["rol"])){
        $productos = new model_productos("ecobabyplanet");        
        $productos->set_producto($parametros);
        header("Location: index.php?metodo=productos&accion=ver");

    }
    else{
        header( "Location: index.php");
    }

    }

}
?>