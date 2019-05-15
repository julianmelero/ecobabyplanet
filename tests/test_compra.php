<?php

require_once(__DIR__ . "/../dao/suscripcionDAO.php");
require_once(__DIR__ . "/../dao/usuarioDAO.php");
require_once(__DIR__ . "/../dao/compraDAO.php");
require_once(__DIR__ . "/../model_db/suscripcion.php");
require_once(__DIR__ . "/../model_db/usuario.php");
require_once(__DIR__ . "/../model_db/compra.php");

try {

    /**
     * test get_compra_by_id_usuario method
     */
    $suscripcionDAO = new suscripcionDAO();
    $usuarioDAO = new usuarioDAO();
    $compraDAO = new compraDAO();

    $compra = $compraDAO->get_compra_by_id_usuario(1);
    $suscripcion = $suscripcionDAO->get_suscripcion_by_id(1);

    echo "---------------------------<br>";
    echo "test get_compra_by_id_usuario method<br>";
    echo (ISSET($compra) ? 'existe' : 'no existe') . '<br>';
    echo $suscripcion->getNombre(). '<br>';
    echo $suscripcion->getDescripcion(). '<br>';
    echo $suscripcion->getPrecio(). '<br>';
    echo $suscripcion->getDivisa(). '<br>';
    echo $compra->getFechaExpiracion(). '<br>';


} finally {
    datasource::get_instance()->close_connection();
}
?>