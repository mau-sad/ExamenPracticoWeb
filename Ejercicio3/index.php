<?php
require_once 'database.php';
require_once 'PerfilController.php';

// Inicializa el controlador
$perfilController = new PerfilController($pdo);

// Controlador de las acciones
if ($_GET['action'] == 'index') {
    $perfilController->index();
} elseif ($_GET['action'] == 'create') {
    $perfilController->create($_POST['nombre_perfil']);
} elseif ($_GET['action'] == 'delete') {
    $perfilController->delete($_GET['id']);
}
?>
