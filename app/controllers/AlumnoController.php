<?php


require_once __DIR__ . '/../models/AlumnoModel.php';

class AlumnoController {

    private $model;

    public function __construct() {
        $this->model = new AlumnoModel();
    }

    // Listar alumnos
    public function index() {
        $alumnos = $this->model->getAll();
        require __DIR__ . '/../views/alumnos/index.php';
    }

    // Mostrar formulario de creación
    public function create() {
        require __DIR__ . '/../views/alumnos/create.php';
    }

    // Guardar nuevo alumno
    public function store() {
        $nombre  = $_POST['nombre']  ?? '';
        $carrera = $_POST['carrera'] ?? '';
        $edad    = $_POST['edad']    ?? 0;

        if (empty($nombre) || empty($carrera) || $edad <= 0) {
            $_SESSION['alert'] = ['tipo' => 'danger', 'mensaje' => 'Todos los campos son obligatorios.'];
        } elseif ($this->model->create($nombre, $carrera, $edad)) {
            $_SESSION['alert'] = ['tipo' => 'success', 'mensaje' => ' Alumno registrado correctamente.'];
        } else {
            $_SESSION['alert'] = ['tipo' => 'danger', 'mensaje' => ' Error al registrar el alumno.'];
        }
        header('Location: index.php');
        exit;
    }

    // Mostrar formulario de edición
    public function edit() {
        $id     = $_GET['id'] ?? 0;
        $alumno = $this->model->getById($id);

        if (!$alumno) {
            $_SESSION['alert'] = ['tipo' => 'warning', 'mensaje' => 'Alumno no encontrado.'];
            header('Location: index.php');
            exit;
        }
        require __DIR__ . '/../views/alumnos/edit.php';
    }

    // Actualizar alumno
    public function update() {
        $id      = $_POST['id']      ?? 0;
        $nombre  = $_POST['nombre']  ?? '';
        $carrera = $_POST['carrera'] ?? '';
        $edad    = $_POST['edad']    ?? 0;

        if (empty($nombre) || empty($carrera) || $edad <= 0) {
            $_SESSION['alert'] = ['tipo' => 'danger', 'mensaje' => 'Todos los campos son obligatorios.'];
        } elseif ($this->model->update($id, $nombre, $carrera, $edad)) {
            $_SESSION['alert'] = ['tipo' => 'success', 'mensaje' => ' Alumno actualizado correctamente.'];
        } else {
            $_SESSION['alert'] = ['tipo' => 'danger', 'mensaje' => ' Error al actualizar el alumno.'];
        }
        header('Location: index.php');
        exit;
    }

    // Eliminar alumno
    public function delete() {
        $id = $_GET['id'] ?? 0;

        if ($this->model->delete($id)) {
            $_SESSION['alert'] = ['tipo' => 'success', 'mensaje' => ' Alumno eliminado correctamente.'];
        } else {
            $_SESSION['alert'] = ['tipo' => 'danger', 'mensaje' => ' Error al eliminar el alumno.'];
        }
        header('Location: index.php');
        exit;
    }
}
