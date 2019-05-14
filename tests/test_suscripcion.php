<?php

require_once(__DIR__ . "/../dao/suscripcionDAO.php");
require_once(__DIR__ . "/../dao/usuarioDAO.php");
require_once(__DIR__ . "/../model_db/suscripcion.php");
require_once(__DIR__ . "/../model_db/usuario.php");

try {

    /**
     * test get_suscripcion_by_id method
     */
    $suscripcionDAO = new suscripcionDAO();
    $usuarioDAO = new usuarioDAO();

    $suscripcion = $suscripcionDAO->get_suscripcion_by_id(1);

    echo (ISSET($suscripcion) ? 'existe' : 'no existe') . '<br>';
    echo $suscripcion->getIdSuscripcion() . '<br>';
    echo $suscripcion->getNombre() . '<br>';
    echo $suscripcion->getDescripcion() . '<br>';
    echo $suscripcion->getImagen() . '<br>';
    echo $suscripcion->getPrecio() . '<br>';
    echo $suscripcion->getDivisa() . '<br>';


} finally {
    datasource::get_instance()->close_connection();
}
?>