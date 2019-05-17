<?php

require_once(__DIR__ . "/../model_db/suscripcion.php");
require_once(__DIR__ . "/../dao/datasource.php");

class suscripcionDAO
{
    private $datasource;

    public function __construct()
    {
        $this->datasource = datasource::get_instance();
    }

    public function get_suscripcion_by_id($id): ?suscripcion
    {
        $conn = $this->datasource->get_connection();
        $sql = "SELECT id_suscripcion, id_usuario, s.nombre, s.descripcion, s.imagen, s.precio, s.divisa
                FROM suscripcion s JOIN usuario USING (id_usuario) 
                WHERE id_suscripcion = ?";
        // Vincular variables a una instrucción preparada como parámetros
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('d', $id);
        $stmt->execute();
        $suscripcion = $this->extract_single_result($stmt);
        $stmt->close();
        return $suscripcion;
    }

    private function extract_single_result($stmt): ?suscripcion
    {
        $stmt->bind_result($id_suscripcion, $id_usuario, $nombre, $descripcion, $imagen, $precio, $divisa);
        $suscripcion = null;
        if ($stmt->fetch()) {

            $suscripcion = new suscripcion();
            $suscripcion->setIdSuscripcion($id_suscripcion);
            $suscripcion->setNombre($nombre);
            $suscripcion->setDescripcion($descripcion);
            $suscripcion->setImagen($imagen);
            $suscripcion->setPrecio($precio);
            $suscripcion->setDivisa($divisa);
        }

        return $suscripcion;
    }
}
?>