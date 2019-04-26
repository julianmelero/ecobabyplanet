<?php
require_once getcwd()."/model/usuarios.php";
class usuarios {   
    function registro(){
    // Llamamos a la página principal
        require_once getcwd()."/view/registro.php";
    }
    
    function alta($parametros){                
        $usuarios = new model_usuarios("ecobabyplanet");
        $usuarios->alta($parametros);
        require_once getcwd()."/view/index.php";

    }

}

?>