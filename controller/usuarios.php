<?php
require_once(__DIR__."/../model/usuario.php");
require_once(__DIR__."/../model/rol.php");
require_once(__DIR__."/../dao/datasource.php");
require_once(__DIR__."/../dao/usuarioDAO.php");
require_once(__DIR__."/../dao/rolDAO.php");

class usuarios {   
    function registro(){
    // Llamamos a la página principal
        require_once getcwd()."/view/registro.php";
    }
    
    function alta($parametros){
        try {

            $usuario_dao = new usuarioDAO();
            $rol_dao = new rolDAO();

            $usuario = new usuario();
            $usuario->setNombre($parametros["nombre"]);
            $usuario->setApellidos($parametros["apellidos"]);
            $usuario->setMovil($parametros["movil"]);
            $usuario->setFechaNacimiento($parametros["fecha_nacimiento"]);
            $usuario->setEmail($parametros["email"]);
            $usuario->setContrasena($parametros["contrasena"]);
            $usuario->setDireccion($parametros["direccion"]);
            $usuario->setDni($parametros["dni"]);

            $rol = $rol_dao->get_by_name("registrado");
            $usuario->setRol($rol);

            $nuevo = true;

            try {
                $usuario_dao->insert($usuario);
            } catch (Exception $e) {
                $existe = false;
            }

            if ($nuevo) {
                require_once getcwd()."/view/index.php";
            }
            else{
                $_POST["existe"] = 1;
                require_once getcwd()."/view/registro.php";
            }


        } finally {
            // Hacer así para evitar que las conexiones se queden abiertas dando un pete a la larga
            datasource::get_instance()->close_connection();
        }
    }

    function login(){
        require_once getcwd()."/view/login.php";
    }

    function entrar($parametros){
        try {
            $usuario_dao = new usuarioDAO();

            if ($usuario_dao->are_valid_credentials($parametros["email"], $parametros["contrasena"])) {
                //Creo la sesión
                $usuario = $usuario_dao->get_by_email($parametros["email"]);
                $this->crear_sesion($usuario);
                header("Location: index.php?metodo=index&accion=principal");
            } else {
                $_POST["incorrecto"] = 1;
                require_once getcwd() . "/view/login.php";
            }

        } finally {
            // Hacer así para evitar que las conexiones se queden abiertas dando un pete a la larga
            datasource::get_instance()->close_connection();
        }
    }

    function modificar($parametros){
        session_start();

        try {

            $usuario_dao = new usuarioDAO();

            $usuario = new usuario();

            $usuario->setId($_SESSION["usuario_id"]);
            $usuario->setNombre($parametros["nombre"]);
            $usuario->setApellidos($parametros["apellidos"]);
            $usuario->setMovil($parametros["movil"]);
            $usuario->setFechaNacimiento($parametros["fecha_nacimiento"]);
            $usuario->setEmail($parametros["email"]);
            $usuario->setDireccion($parametros["direccion"]);
            $usuario->setDni($parametros["dni"]);

            $usuario_dao->update($usuario);
            //require_once getcwd()."/view/mis_datos.php";
            header("Location: index.php?metodo=usuarios&accion=mis_datos");

        } finally {
            // Hacer así para evitar que las conexiones se queden abiertas dando un pete a la larga
            datasource::get_instance()->close_connection();
        }

    }

    function mis_datos(){
        session_start();
        try {
            $usuario_dao = new usuarioDAO();
            $resultado = $usuario_dao->get_by_id($_SESSION["usuario_id"]);
            require_once getcwd()."/view/mis_datos.php";
        } finally {
            // Hacer así para evitar que las conexiones se queden abiertas dando un pete a la larga
            datasource::get_instance()->close_connection();
        }
    }

    /**
     * @param $usuario usuario
     */
    function crear_sesion($usuario){
        session_start();
        $_SESSION["email"] = $usuario->getEmail();
        $_SESSION["usuario_id"] = $usuario->getId();
        $_SESSION["rol"] = $usuario->getRol()->getId();
    }

    function cerrar_sesion($parametros){
        session_start();       
        session_destroy();        
        header("Location: index.php");
    }

}

?>