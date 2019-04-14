<?php
 if (isset($_GET["metodo"])) {      
   if (isset($_GET["accion"])) {
      if(file_exists( getcwd()."/controller/".$_GET["metodo"].".php")){        
            require_once getcwd()."/controller/".$_GET["metodo"].".php";
            $controlador = new $_GET["metodo"];

            // Miramos si existe la accion
            $accion = $_GET["accion"];
            if (method_exists($controlador,$accion)){
               if (!isset($_POST)) {
                  $controlador->$accion();   
               }
               else{
                  $controlador->$accion($_POST);
               }
            }
            else{            
               require_once "404.php";   
            }
      } else{
         require_once "404.php";         
      }


   }
   else{
      require_once "404.php";  
   }
} 
 else{
   
    // Controlador por defecto
    require_once "controller/controller.php";
    $controlador = new controller("bd");    
 }

?>