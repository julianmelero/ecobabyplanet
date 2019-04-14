<?php
require_once getcwd()."/model/pruebas.php";
class pruebas {   
    function hola(){
        // Creamos el modelo pruebas        
        $pruebas = new model_pruebas("bd");
        $pruebas->pruebas();
    }

}

?>