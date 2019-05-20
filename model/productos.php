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

    function guardar($parametros){
        $sql="update producto set nombre=?,descripcion=? where id_producto=?;";
        return $this->query($sql,array($parametros["nombre"],$parametros["descripcion"],$parametros["id_producto"]));
    }
    function get_producto_suscripcion($id){        
        $sql= "select * from producto where id_producto=?;";
        return $this->query($sql,array($id));
    }

    function get_productos_no_suscripcion($id_suscripcion){
        $sql= "SELECT * FROM producto p WHERE p.id_producto NOT IN (SELECT id_producto FROM suscripcion_tiene_producto WHERE id_suscripcion=?);";
        return $this->query($sql,array($id_suscripcion));
    }


}