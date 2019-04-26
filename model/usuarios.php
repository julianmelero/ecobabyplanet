<?php
include_once "model.php";
class model_usuarios extends model{

    function get_usuario($email){
        $sql= "select * from usuario where email=?";
        return $this->query($sql,array($email));
    }
    
    function alta($parametros){ 
        
        // Primero comprobamos que no esté el usuario

        $usuarios = $this->get_usuario($parametros["email"]);
        $cuantos=0;
        while($datos = $usuarios[0]->fetch()){
            $cuantos++;
        }
        if ($cuantos>0) {
            return 1;
        }
        else{

        $sql = "insert into usuario(nombre, apellidos, movil, fecha_nacimiento,email,contrasena,
         fecha_creacion,direccion,dni,id_rol, rol_idrol) VALUES (?,?,?,?,?,?,?,?,?,?,?)";         
        $fecha = date("Y-m-d H:i:s");        
        $hash = "eco";
        $pass = $parametros["contrasena"];
        $contrasena = hash( "sha256",$hash.$pass );              
        $this->query($sql,array($parametros["nombre"],$parametros["apellidos"],$parametros["movil"],$parametros["fecha_nacimiento"],$parametros["email"],
            $contrasena,$fecha,$parametros["direccion"],$parametros["dni"],2,2));        
        return 0;
        }

    }
    function get_usuario_login($parametros){
        $sql= "select * from usuario where email=? and contrasena=?";
        $hash = "eco";
        $pass = $parametros["contrasena"];
        $contrasena = hash( "sha256",$hash.$pass );          
        return $this->query($sql,array($parametros["email"],$contrasena));
    }
    function entrar($parametros){        
        $usuarios = $this->get_usuario_login($parametros);
        $cuantos=0;
        while($datos = $usuarios[0]->fetch()){
            $cuantos++;
        }
        if ($cuantos>0) {
            return 1;
        }
        else{
            return 0;
        }
    }
}


?>