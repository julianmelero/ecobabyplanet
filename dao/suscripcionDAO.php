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

    /**
     * @param $id
     * @return suscripcion|null
     */
    public function get_suscripcion_by_id($id)
    {
        $conn = $this->datasource->get_connection();
        $sql = "SELECT id_suscripcion, nombre, descripcion, imagen, precio, divisa
                FROM suscripcion 
                WHERE id_suscripcion = ?";
        // Vincular variables a una instrucción preparada como parámetros
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('d', $id);
        $stmt->execute();
        $suscripcion = $this->extract_single_result($stmt);
        $stmt->close();
        return $suscripcion;
    }

    /**
     * @param $stmt
     * @return suscripcion|null
     */
    private function extract_single_result($stmt)
    {
        $stmt->bind_result($id_suscripcion, $nombre, $descripcion, $imagen, $precio, $divisa);
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