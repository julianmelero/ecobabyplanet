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


    function entrar($parametros){
        $usuarios = new model_usuarios("ecobabyplanet");
        $resultado = $usuarios->entrar($parametros);
        // Si el resultado es 0 es correcto
        if ($resultado==0) {
            //Creo la sesión
            $this->crear_sesion($parametros);
            header("Location: index.php?metodo=index&accion=principal");    
        }
        else{
            $_POST["incorrecto"] = 1;            
            require_once getcwd()."/view/login.php";    
        }        
    }

    function mis_datos(){
        session_start();
        $usuarios = new model_usuarios("ecobabyplanet");
        $resultado = $usuarios->get_usuario($_SESSION["email"]);
        require_once getcwd()."/view/mis_datos.php";
    }

    function crear_sesion($parametros){        
        session_start();
        $_SESSION["email"] = $parametros["email"];
    }
    function cerrar_sesion($parametros){ 
        session_start();       
        session_destroy();
        require_once getcwd()."/view/index.php";
    }

}

?>