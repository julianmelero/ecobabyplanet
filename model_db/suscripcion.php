<?php


class suscripcion
{
    private $id_suscripcion;
    private $id_usuario;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $precio;
    private $divisa;

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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * @param mixed $imagen
     */
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    /**
     * @return mixed
     */
    public function getDivisa()
    {
        return $this->divisa;
    }

    /**
     * @param mixed $divisa
     */
    public function setDivisa($divisa)
    {
        $this->divisa = $divisa;
    }

    public function generarFechaExpiracion()
    {

        if (strtolower($this->getNombre()) == "mensual")
        {
            $date = date('Y-m-d', strtotime('+1 month'));
        }
        else if (strtolower($this->getNombre()) == "trimestral")
        {
            $date = date('Y-m-d', strtotime('+3 month'));
        }
        else if (strtolower($this->getNombre()) == "semestral")
        {
            $date = date('Y-m-d', strtotime('+6 month'));
        }
        else
        {
            $date = date('Y-m-d', strtotime('+1 year'));
        }

        return $date;
    }
}