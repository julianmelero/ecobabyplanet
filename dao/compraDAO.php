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
        $sql = "SELECT c.id_usuario, s.id_suscripcion, c.fecha_compra, c.fecha_expiracion, s.nombre, s.descripcion, s.precio, s.divisa
                FROM usuario_compra_suscripcion c
                JOIN usuario u USING (id_usuario) 
                JOIN suscripcion s ON c.id_suscripcion = s.id_suscripcion  
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
        $stmt->bind_result($id_usuario, $id_suscripcion, $fecha_compra, $fecha_expiracion, $nombre, $descripcion, $precio, $divisa);
        $compra = null;
        if ($stmt->fetch()) {

            $usuario = new usuario();
            $usuario->setId($id_usuario);

            $suscripcion = new suscripcion();
            $suscripcion->setIdSuscripcion($id_suscripcion);
            $suscripcion->setNombre($nombre);
            $suscripcion->setDescripcion($descripcion);
            $suscripcion->setPrecio($precio);
            $suscripcion->setDivisa($divisa);

            $compra = new compra();
            $compra->setFechaCompra($fecha_compra);
            $compra->setFechaExpiracion($fecha_expiracion);

        }

        return $compra;
    }

    public function insert_compra($compra)
    {
        $conn = $this->datasource->get_connection();
        $sql = "INSERT INTO usuario_compra_suscripcion (id_usuario, id_suscripcion, fecha_compra, fecha_expiracion) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);

        $id_usuario = $compra->getIdUsuario()->get_id();
        $id_suscripcion = $compra->getIdSuscripcion()->get_id();
        $fecha_compra = $compra->getFechaCompra();
        $fecha_expiracion = $compra->getFechaExpiracion();

        $stmt->bind_param('ddss', $id_usuario, $id_suscripcion, $fecha_compra, $fecha_expiracion);
        if ($stmt->execute() === FALSE) {
            throw new Exception("No has podido insertar la compra." . $conn->error);
        }
        $stmt->close();
        $compra->set_id($conn->insert_id);
    }

    //TO DO
    public function delete_game($game)
    {
        $conn = $this->datasource->get_connection();
        $sql = "DELETE FROM Game WHERE id_game = ?";
        $stmt = $conn->prepare($sql);
        $id = $game->get_id();
        $stmt->bind_param('d', $id);
        if ($stmt->execute() === FALSE) {
            throw new Exception("No has podido eliminar el juego." . $conn->error);
        }
        $stmt->close();
    }
}