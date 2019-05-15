<?php


class compra
{
    private $id_usuario;
    private $id_suscripcion;
    private $fecha_compra;
    private $fecha_expiracion;

    /**
     * @return mixed
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    /**
     * @param mixed $id_usuario
     */
    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;
    }

    /**
     * @return mixed
     */
    public function getIdSuscripcion()
    {
        return $this->id_suscripcion;
    }

    /**
     * @param mixed $id_suscripcion
     */
    public function setIdSuscripcion($id_suscripcion)
    {
        $this->id_suscripcion = $id_suscripcion;
    }

    /**
     * @return mixed
     */
    public function getFechaCompra()
    {
        return $this->fecha_compra;
    }

    /**
     * @param mixed $fecha_compra
     */
    public function setFechaCompra($fecha_compra)
    {
        $this->fecha_compra = $fecha_compra;
    }

    /**
     * @return mixed
     */
    public function getFechaExpiracion()
    {
        return $this->fecha_expiracion;
    }

    /**
     * @param mixed $fecha_expiracion
     */
    public function setFechaExpiracion($fecha_expiracion)
    {
        $this->fecha_expiracion = $fecha_expiracion;
    }
}