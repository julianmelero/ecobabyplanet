<?php
require_once(__DIR__."/../dao/datasource.php");
require_once(__DIR__."/../model/rol.php");

class rolDAO
{
    private $datasource;

    public function __construct()
    {
        $this->datasource = datasource::get_instance();
    }

    public function get_by_id($id) {
        $conn = $this->datasource->get_connection();
        $sql = "SELECT idrol, rol FROM rol WHERE idrol = ?";
        // Vincular variables a una instrucción preparada como parámetros
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('d', $id);
        $stmt->execute();
        $result = $this->extract_single_result($stmt);
        $stmt->close();
        return $result;
    }

    public function get_by_name($name) {
        $conn = $this->datasource->get_connection();
        $sql = "SELECT idrol, rol FROM rol WHERE rol = ?";
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
        $sql = "SELECT idrol, rol FROM rol";
        // Vincular variables a una instrucción preparada como parámetros
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $this->extract_result_list($stmt);
        $stmt->close();
        return $result;
    }

    private function extract_single_result($stmt) {
        $stmt->bind_result($id, $rol_name);
        $result = new rol();
        if ($stmt->fetch()) {
            $result->setId($id);
            $result->setNombre($rol_name);
        }
        return $result;
    }

    private function extract_result_list($stmt): array
    {
        $stmt->bind_result($id, $rol_name);
        $results = [];
        while ($stmt->fetch()) {

            $result = new rol();
            $result->setId($id);
            $result->setNombre($rol_name);

            $results[] = $result;
        }
        return $results;
    }
}