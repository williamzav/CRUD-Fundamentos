<?php


require_once __DIR__ . '/../../config/database.php';

class AlumnoModel {

    private $conn;

    public function __construct() {
        $this->conn = getConnection();
    }

    public function getAll() {
        $result = $this->conn->query("SELECT * FROM t_alumnos ORDER BY id DESC");
        $alumnos = [];
        while ($row = $result->fetch_assoc()) {
            $alumnos[] = $row;
        }
        return $alumnos;
    }

    public function getById($id) {
        $id = (int)$id;
        $result = $this->conn->query("SELECT * FROM t_alumnos WHERE id = $id");
        return $result->fetch_assoc();
    }

    public function create($nombre, $carrera, $edad) {
        $nombre  = $this->conn->real_escape_string(trim($nombre));
        $carrera = $this->conn->real_escape_string(trim($carrera));
        $edad    = (int)$edad;

        $sql = "INSERT INTO t_alumnos (nombre, carrera, edad) VALUES ('$nombre', '$carrera', $edad)";
        return $this->conn->query($sql);
    }

    public function update($id, $nombre, $carrera, $edad) {
        $id      = (int)$id;
        $nombre  = $this->conn->real_escape_string(trim($nombre));
        $carrera = $this->conn->real_escape_string(trim($carrera));
        $edad    = (int)$edad;

        $sql = "UPDATE t_alumnos SET nombre='$nombre', carrera='$carrera', edad=$edad WHERE id=$id";
        return $this->conn->query($sql);
    }

    public function delete($id) {
        $id = (int)$id;
        return $this->conn->query("DELETE FROM t_alumnos WHERE id=$id");
    }

    public function __destruct() {
        $this->conn->close();
    }
}
