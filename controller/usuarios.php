<?php
require_once getcwd()."/model/usuarios.php";
class usuarios {   
    function registro(){
    // Llamamos a la página principal
        require_once getcwd()."/view/registro.php";
    }
    
    function alta($parametros){                
        $usuarios = new model_usuarios("ecobabyplanet");
        $resultado = $usuarios->alta($parametros);
        // Si el resultado es 0 es correcto
        if ($resultado==0) {
            require_once getcwd()."/view/index.php";    
        }
        else{
            $_POST["existe"] = 1;            
            require_once getcwd()."/view/registro.php";    
        }        
    }

    function login(){
        require_once getcwd()."/view/login.php";
    }

}

?>