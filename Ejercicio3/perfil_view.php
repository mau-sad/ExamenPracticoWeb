<h1>Perfiles</h1>
<a href="create_edit_perfil.php">Crear Nuevo Perfil</a>
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($perfiles as $perfil): ?>
            <tr>
                <td><?php echo $perfil['Id_perfil']; ?></td>
                <td><?php echo $perfil['Nombre_perfil']; ?></td>
                <td>
    <a href="show.php?id=<?php echo $perfil['Id_perfil']; ?>">Ver</a>
    <a href="edit_form.php?id=<?php echo $perfil['Id_perfil']; ?>">Editar</a>
    <a href="javascript:void(0);" onclick="confirmarEliminar(<?php echo $perfil['Id_perfil']; ?>)">Eliminar</a>
</td>
            </tr>
        <?php endforeach; ?>
    </tbody>

    <script type="text/javascript">
    function confirmarEliminar(id) {
        // Mostrar un cuadro de confirmación
        if (confirm("¿Estás seguro de que deseas eliminar este perfil?")) {
            // Si el usuario confirma, redirigimos a delete.php con el id del perfil
            window.location.href = "delete.php?id=" + id;
        }
    }
</script>
</table>

