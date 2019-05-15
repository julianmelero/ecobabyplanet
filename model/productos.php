<?php
include_once "model.php";
class model_productos extends model{
    function get_productos(){
        $sql= "select * from producto;";
        return $this->query($sql,array());
    }
    function get_producto($parametros){        
        $sql= "select * from producto where id_producto=?;";
        return $this->query($sql,array($parametros["id_producto"]));
    }

    function set_producto($parametros){
        $sql="insert into producto (nombre,descripcion) values (?,?);";
        return $this->query($sql,array($parametros["nombre"],$parametros["descripcion"]));
    }

}