<?php
include_once "model.php";
class model_usuarios extends model{
    
    function alta($parametros){        
        $sql = "insert into usuario(nombre, apellidos, movil, fecha_nacimiento,email,contrasena,
         fecha_creacion,direccion,dni,id_rol, rol_idrol) VALUES (?,?,?,?,?,?,?,?,?,?,?)";         
        $fecha = date("Y-m-d H:i:s");        
        $hash = "eco";
        $pass = $parametros["contrasena"];
        $contrasena = hash( "sha256",$hash.$pass );
        echo $contrasena;        
        $this->query($sql,array($parametros["nombre"],$parametros["apellidos"],$parametros["movil"],$parametros["fecha_nacimiento"],$parametros["email"],
            $contrasena,$fecha,$parametros["direccion"],$parametros["dni"],2,2));        

    }
}


?>