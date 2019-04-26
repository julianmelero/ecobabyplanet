<?php
include_once "model.php";
class model_usuarios extends model{
    
    function alta($parametros){
        $sql = "INSERT INTO 'usuario'('nombre', 'apellidos', 'movil', 'fecha_nacimiento', 'email', 'contrasena',
         'fecha_creacion', 'direccion', 'dni', 'id_rol', 'rol_idrol') VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $fecha = date("Y-m-d");
        $hash = "eco";
        $pass = $parametros["password"];
        $contrasena = password_hash($hash.$pass, "md5" );
        try{
            $this->query($sql,array($parametros["nombre"],$parametros["apellidos"],$parametros["movil"],$parametros["fecha_nacimiento"],$parametros["email"],
            $parametros["contrasena"],$fecha,$contrasena),$fecha,$parametros["direccion"],$parametros["email"],
            $parametros["dni"],3,3);
        }
        catch(Exception $e){
            echo $e->message;
        }

    }
}


?>