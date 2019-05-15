<?php
include_once "model.php";
class model_productos extends model{
    function get_productos(){
        $sql= "select * from producto;";
        return $this->query($sql,array());
    }

    function set_producto($parametros){
        $sql="insert into producto (nombre,descripcion) values (?,?) where id_producto=?;";
        return $this->query($sql,array($parametros["nombre"],$parametros["descripcion"],$parametros["id_producto"]));
    }

}