<?php
session_start();
require_once 'database.php';
require_once 'Perfil.php';

if (isset($_GET['id']) && isset($_POST['confirmar']) && $_POST['confirmar'] == 'si') {
    $idPerfil = $_GET['id'];

    // Crear el modelo de perfil
    $perfilModel = new Perfil($pdo);

    // Eliminar el perfil
    $perfilModel->delete($idPerfil);

    // Redirigir a la lista de perfiles
    header("Location: perfil.php");
    exit();
} else {
    echo "<p>Error al intentar eliminar el perfil. No se ha confirmado la eliminación.</p>";
}
?>
