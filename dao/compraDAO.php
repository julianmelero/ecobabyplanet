<?php

require_once(__DIR__ . "/../dao/datasource.php");
require_once(__DIR__ . "/../model_db/suscripcion.php");
require_once(__DIR__ . "/../model_db/compra.php");


class compraDAO
{
    private $datasource;

    public function __construct()
    {
        $this->datasource = datasource::get_instance();
    }

    public function get_compra_by_id_usuario($id): ?Compra
    {
        $conn = $this->datasource->get_connection();
        $sql = "SELECT c.id_usuario, c.id_suscripcion, c.fecha_compra, c.fecha_expiracion
                FROM usuario_compra_suscripcion c
                WHERE c.id_usuario = ?";
        // Vincular variables a una instrucción preparada como parámetros
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('d', $id);
        $stmt->execute();
        $compra = $this->extract_single_result($stmt);
        $stmt->close();
        return $compra;
    }

    private function extract_single_result($stmt): ?Compra
    {
        $stmt->bind_result($id_usuario, $id_suscripcion, $fecha_compra, $fecha_expiracion);
        $compra = null;
        if ($stmt->fetch()) {

            $compra = new compra();
            $compra->setIdUsuario($id_usuario);
            $compra->setIdSuscripcion($id_usuario);
            $compra->setFechaCompra($fecha_compra);
            $compra->setFechaExpiracion($fecha_expiracion);

        }

        return $compra;
    }

    public function insert_compra($compra)
    {
        $conn = $this->datasource->get_connection();
        $sql = "INSERT INTO usuario_compra_suscripcion (id_usuario, id_suscripcion, fecha_compra, fecha_expiracion) VALUES (?,?,CURRENT_TIMESTAMP,?)";
        $stmt = $conn->prepare($sql);

        $id_usuario = $compra->getIdUsuario();
        $id_suscripcion = $compra->getIdSuscripcion();
        $fecha_expiracion = $compra->getFechaExpiracion();

        $stmt->bind_param('dds', $id_usuario, $id_suscripcion, $fecha_expiracion);
        if ($stmt->execute() === FALSE) {
            throw new Exception("No has podido realizar la compra." . $conn->error);
        }
        $stmt->close();
    }

    public function delete_compra($compra)
    {
        $conn = $this->datasource->get_connection();
        $sql = "DELETE FROM usuario_compra_suscripcion WHERE id_usuario = ?";
        $stmt = $conn->prepare($sql);
        $id_usuario = $compra->getIdUsuario();
        $stmt->bind_param('d', $id_usuario);
        if ($stmt->execute() === FALSE) {
            throw new Exception("No has podido eliminar la compra." . $conn->error);
        }
        $stmt->close();
    }
}