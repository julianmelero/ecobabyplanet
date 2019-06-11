<?php

require_once getcwd() . "/model_db/compra.php";
require_once getcwd() . "/model_db/suscripcion.php";
require_once getcwd() . "/dao/suscripcionDAO.php";
require_once getcwd() . "/dao/compraDAO.php";
require_once getcwd() . "/dao/usuarioDAO.php";
require_once getcwd() . "/dao/datasource.php";

class carrito {

    function mostrar_carrito() {
        
        // Si no está logeado no hace nada 
        session_start();
        if(isset($_SESSION["email"])){
            try {

                $usuarioDAO = new usuarioDAO();
                $suscripcionDAO = new suscripcionDAO();
                $compraDAO = new compraDAO();

                $email = $_SESSION["email"];
                $usuario = $usuarioDAO->get_by_email($email);
                $suscripcion = $suscripcionDAO->get_suscripcion_by_id($_POST["id_suscripcion"]);
                $compra = $compraDAO->get_compra_by_id_usuario($usuario->getId());

                if (empty($compra)) {
                    require_once getcwd()."/view/carrito.php";

                } else {

                    $suscripcion = $suscripcionDAO->get_suscripcion_by_id($compra->getIdSuscripcion());
                    require_once getcwd()."/view/alerta_carrito.php";
                }


            } finally {
                datasource::get_instance()->close_connection();
            }
    }else{
        header( "Location:index.php?metodo=suscripcion&accion=listar_suscripciones");
    }

    }

    function comprar() {
        session_start();       
        try {
                    
                $email = $_SESSION["email"];


                $suscripcionDAO = new suscripcionDAO();
                $usuarioDAO = new usuarioDAO();
                $compraDAO = new compraDAO();
                $suscripcion = $suscripcionDAO->get_suscripcion_by_id($_POST["id_suscripcion"]);
                $usuario = $usuarioDAO->get_by_email($email);

                $compra = new compra();
                $compra->setIdSuscripcion($suscripcion->getIdSuscripcion());
                $compra->setIdUsuario($usuario->getId());
                $compra->setFechaExpiracion($suscripcion->generarFechaExpiracion());
                $compraDAO->insert_compra($compra);

                require_once getcwd()."/view/compra.php";           
            } finally {
                datasource::get_instance()->close_connection();
            }       
    }

}

?>