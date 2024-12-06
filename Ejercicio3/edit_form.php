<?php
// Iniciar sesión y conexión a la base de datos
session_start();
require_once 'database.php';
require_once 'Perfil.php';  // Modelo para el perfil

// Verificar si el parámetro 'id' está presente
if (isset($_GET['id'])) {
    $idPerfil = $_GET['id'];

    // Crear el modelo de perfil
    $perfilModel = new Perfil($pdo);

    // Obtener los datos del perfil
    $perfil = $perfilModel->getById($idPerfil);

    if ($perfil) {
        // Mostrar el formulario con los datos del perfil
        echo "<h1>Editar Perfil</h1>";
        ?>
        <form action="edit.php?id=<?php echo $perfil['Id_perfil']; ?>" method="POST">
            <label for="nombre">Nombre del Perfil:</label>
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($perfil['Nombre_perfil']); ?>" required>
            <input type="submit" value="Actualizar Perfil">
        </form>
        <?php
    } else {
        echo "<p>Perfil no encontrado.</p>";
    }
} else {
    echo "<p>ID de perfil no especificado.</p>";
}
?>
