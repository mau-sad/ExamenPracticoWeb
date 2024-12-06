<?php
session_start();
require_once 'database.php';
require_once 'Usuarios.php';

// Manejo del login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Crear objeto Usuario
    $usuarioModel = new Usuario($pdo);

    // Verificar si el usuario existe
    $usuarioData = $usuarioModel->getByUsername($usuario);

    // Si el usuario existe, verificamos la contraseña de forma directa
    if ($usuarioData && $usuarioData['Contraseña'] === $password) {
        // Usuario encontrado y contraseña verificada
        $_SESSION['usuario'] = $usuarioData['Nombre_usuario'];
        $_SESSION['perfil'] = $usuarioData['Id_perfil'];
        header("Location: index.php?action=index");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <form method="POST" action="login.php">
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required><br><br>
        
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
