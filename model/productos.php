<?php
include_once "model.php";
class model_productos extends model{
    function get_productos(){
        $sql= "select * from producto;";
        return $this->query($sql,array());
    }

}