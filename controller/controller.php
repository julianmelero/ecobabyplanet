<?php
class controller{
    public $modelo;
    function __construct(){
        // Modelo por defecto
        require_once getcwd()."/model/model.php";       
        $this->modelo = new model("bd");                       
        $this->index();        
    }

    function index(){

        $sql = ";";
        $consulta = $this->modelo->query($sql,array());
        // Eseñamos la página index por defecto
        require_once(getcwd()."/view/general.php");


    }
}


?>