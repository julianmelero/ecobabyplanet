<?php
require_once(__DIR__."/../dao/datasource.php");
require_once(__DIR__."/../model/rol.php");

class usuarioDAO
{
    private $datasource;

    public function __construct()
    {
        $this->datasource = datasource::get_instance();
    }

    public function get_by_id($id) {
        $conn = $this->datasource->get_connection();
        $sql = "SELECT id_usuario, nombre, apellidos, movil, fecha_nacimiento, email, contrasena, fecha_creacion, direccion, dni, r.idrol rol_id, r.rol rol_name 
            FROM usuario join rol r on usuario.rol_idrol = r.idrol WHERE id_usuario = ?";
        // Vincular variables a una instrucción preparada como parámetros
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('d', $id);
        $stmt->execute();
        $result = $this->extract_single_result($stmt);
        $stmt->close();
        return $result;
    }

    public function get_by_email($name) {
        $conn = $this->datasource->get_connection();
        $sql = "SELECT id_usuario, nombre, apellidos, movil, fecha_nacimiento, email, contrasena, fecha_creacion, direccion, dni, r.idrol rol_id, r.rol rol_name 
            FROM usuario join rol r on usuario.rol_idrol = r.idrol WHERE email = ?";
        // Vincular variables a una instrucción preparada como parámetros
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $name);
        $stmt->execute();
        $result = $this->extract_single_result($stmt);
        $stmt->close();
        return $result;
    }

    public function get_all() {
        $conn = $this->datasource->get_connection();
        $sql = "SELECT id_usuario, nombre, apellidos, movil, fecha_nacimiento, email, contrasena, fecha_creacion, direccion, dni, r.idrol rol_id, r.rol rol_name 
            FROM usuario join rol r on usuario.rol_idrol = r.idrol";
        // Vincular variables a una instrucción preparada como parámetros
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $this->extract_result_list($stmt);
        $stmt->close();
        return $result;
    }

    public function are_valid_credentials($email, $password){
        $conn = $this->datasource->get_connection();
        $sql = "SELECT 1 FROM usuario WHERE email = ? and contrasena = ?";
        $stmt = $conn->prepare($sql);

        $usuario = new usuario();
        $usuario->setContrasena($password);
        $pass = $usuario->getContrasena();
        $stmt->bind_param('ss', $email, $pass);
        $stmt->execute();
        $valid = $stmt->fetch();
        $stmt->close();
        return $valid;
    }

    /**
     * @param $usuario usuario
     * @throws Exception
     */
    public function insert($usuario ) {
        $conn = $this->datasource->get_connection();
        $sql = "INSERT INTO usuario (nombre, apellidos, movil, fecha_nacimiento, email, contrasena, fecha_creacion, direccion, dni, rol_idrol) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        $nombre = $usuario->getNombre();
        $apellidos = $usuario->getApellidos();
        $movil = $usuario->getMovil();
        $fecha_nacimiento = $usuario->getFechaNacimiento();
        $email = $usuario->getEmail();
        $contrasena = $usuario->getContrasena();
        $fecha_creacion = date("Y-m-d H:i:s");
        $direccion = $usuario->getDireccion();
        $dni = $usuario->getDni();
        $rol_id = $usuario->getRol()->getId();

        $stmt->bind_param('sssssssssd',
            $nombre,
            $apellidos,
            $movil,
            $fecha_nacimiento,
            $email,
            $contrasena,
            $fecha_creacion,
            $direccion,
            $dni,
            $rol_id
        );

        if ($stmt->execute() === FALSE) {
            throw new Exception("No has podido insertar el usuario." . $conn->error);
        }
        $stmt->close();
        $usuario->setId($conn->insert_id);
    }

    /**
     * @param $usuario usuario
     * @throws Exception
     */
    public function update($usuario) {
        $conn = $this->datasource->get_connection();
        $sql = "UPDATE usuario  
                SET nombre = ?, apellidos = ?, movil = ?, fecha_nacimiento = ?, email = ?, direccion = ?, dni = ?
                WHERE id_usuario= ?";

        $stmt = $conn->prepare($sql);

        $nombre = $usuario->getNombre();
        $apellidos = $usuario->getApellidos();
        $movil = $usuario->getMovil();
        $fecha_nacimiento = $usuario->getFechaNacimiento();
        $email = $usuario->getEmail();
        //$contrasena = $usuario->getContrasena();
        $direccion = $usuario->getDireccion();
        $dni = $usuario->getDni();
        //$rol_id = $usuario->getRol()->getId();
        $usuario_id = $usuario->getId();

        $stmt->bind_param('sssssssd',
            $nombre,
            $apellidos,
            $movil,
            $fecha_nacimiento,
            $email,
            //$contrasena,
            $direccion,
            $dni,
            //$rol_id,
            $usuario_id
        );

        if ($stmt->execute() === FALSE) {
            throw new Exception("No has podido actualizar el usuario." . $conn->error);
        }
        $stmt->close();
    }

    private function extract_single_result($stmt) {
        $stmt->bind_result(
            $id,
            $nombre,
            $apellidos,
            $movil,
            $fecha_nacimiento,
            $email,
            $contrasena,
            $fecha_creacion,
            $direccion,
            $dni,
            $rol_id,
            $rol_name
        );
        $result = new usuario();
        if ($stmt->fetch()) {
            $result->setId($id);
            $result->setNombre($nombre);
            $result->setApellidos($apellidos);
            $result->setMovil($movil);
            $result->setFechaNacimiento($fecha_nacimiento);
            $result->setEmail($email);
            $result->_setContrasena($contrasena);
            $result->setFechaCreacion($fecha_creacion);
            $result->setDireccion($direccion);
            $result->setDni($dni);

            $rol = new rol();
            $rol->setId($rol_id);
            $rol->setNombre($rol_name);

            $result->setRol($rol);
        }
        return $result;
    }

    private function extract_result_list($stmt): array
    {
        $stmt->bind_result(
            $id,
            $nombre,
            $apellidos,
            $movil,
            $fecha_nacimiento,
            $email,
            $contrasena,
            $fecha_creacion,
            $direccion,
            $dni,
            $rol_id,
            $rol_name
        );
        $results = [];
        while ($stmt->fetch()) {

            $result = new usuario();

            $result->setId($id);
            $result->setNombre($nombre);
            $result->setApellidos($apellidos);
            $result->setMovil($movil);
            $result->setFechaNacimiento($fecha_nacimiento);
            $result->setEmail($email);
            $result->_setContrasena($contrasena);
            $result->setFechaCreacion($fecha_creacion);
            $result->setDireccion($direccion);
            $result->setDni($dni);

            $rol = new rol();
            $rol->setId($rol_id);
            $rol->setNombre($rol_name);

            $result->setRol($rol);

            $results[] = $result;
        }
        return $results;
    }
}