<?php
class model{  
  public $mysql;
  function __construct($db_name){    
    require_once("credenciales.php");
    try {
      $cadena = "mysql:host=".HOST.";dbname=".$db_name;
      $this->mysql = new PDO("$cadena",USER,PASS);
      $this->mysql->exec("SET CHARACTER SET utf8");
      $this->mysql->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (Exception $e) {      
      require_once(getcwd()."/404.php");
      exit();
    }
  }

  function query($sql,$args){
    $resultados = array();
    try{
      $consulta = $this->mysql->prepare($sql);
      if (empty($args)) {
          $consulta->execute();
      }
      else{
        $consulta->execute($args);
        $id = $this->mysql->lastInsertId();
        $resultados[1]= $id;
      }
      $resultados[0]= $consulta;      
      return $resultados;
    }catch (PDOException $e){
      return 1;
    }
  }
}



?>