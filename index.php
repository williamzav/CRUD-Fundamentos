<?php

session_start();

require_once __DIR__ . '/app/controllers/AlumnoController.php';

$action = $_GET['action'] ?? 'index';

$controller = new AlumnoController();

switch ($action) {
    case 'create':
        $controller->create();
        break;
    case 'store':
        $controller->store();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'update':
        $controller->update();
        break;
    case 'delete':
        $controller->delete();
        break;
    default:
        $controller->index();
        break;
}