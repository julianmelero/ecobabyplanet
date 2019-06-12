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
            $this->crear_sesion($parametros);
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

    function modificar($parametros){
        session_start();        
        $usuarios = new model_usuarios("ecobabyplanet2");
        $usuarios->modificar($parametros);
        $resultado = $usuarios->get_usuario($_SESSION["email"]);
        //require_once getcwd()."/view/mis_datos.php";
        header("Location: index.php?metodo=usuarios&accion=mis_datos");
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
        $usuarios = new model_usuarios("ecobabyplanet");
        $resultado = $usuarios->get_usuario($_SESSION["email"]);
        while ($datos = $resultado[0]->fetch()) {
            $_SESSION["rol"] = $datos["rol_idrol"];
            $_SESSION["id_usuario"] = $datos["id_usuario"];
        }
        
    }
    function cerrar_sesion($parametros){ 
        session_start();       
        session_destroy();        
        header("Location: index.php");
    }

}

?>