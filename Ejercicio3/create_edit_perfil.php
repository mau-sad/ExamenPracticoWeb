<?php
require_once 'database.php';
require_once 'Perfil.php';

// Iniciar sesión y verificar permisos
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

// Si estamos editando un perfil, obtenemos los datos del perfil
$perfilModel = new Perfil($pdo);
$perfil = null;
if (isset($_GET['id'])) {
    $perfil = $perfilModel->getById($_GET['id']);
    if (!$perfil) {
        header("Location: index.php?action=index"); // Redirige si no existe el perfil
        exit();
    }
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_perfil = $_POST['nombre_perfil'];

    if (isset($_GET['id'])) {
        // Si estamos editando un perfil
        $perfilModel->update($_GET['id'], $nombre_perfil);
    } else {
        // Si estamos creando un nuevo perfil
        $perfilModel->create($nombre_perfil);
    }

    // Redirigir a la página de perfiles después de crear/editar
    header("Location: index.php?action=index");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($perfil) ? 'Editar Perfil' : 'Crear Perfil'; ?></title>
</head>
<body>
    <h2><?php echo isset($perfil) ? 'Editar Perfil' : 'Crear Perfil'; ?></h2>
    <form method="POST" action="create_edit_perfil.php<?php echo isset($perfil) ? '?id=' . $perfil['Id_perfil'] : ''; ?>">
        <label for="nombre_perfil">Nombre del Perfil:</label>
        <input type="text" id="nombre_perfil" name="nombre_perfil" value="<?php echo isset($perfil) ? $perfil['Nombre_perfil'] : ''; ?>" required><br><br>
        
        <button type="submit"><?php echo isset($perfil) ? 'Actualizar Perfil' : 'Crear Perfil'; ?></button>
    </form>
    <br>
    <a href="index.php?action=index">Volver a la lista de perfiles</a>
</body>
</html>
