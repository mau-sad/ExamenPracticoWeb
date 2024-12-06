<?php
require_once 'database.php';

class Usuario {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Verificar si el nombre de usuario existe y obtener sus datos
    public function getByUsername($nombre_usuario) {
        $sql = "SELECT * FROM Usuarios WHERE Nombre_usuario = :nombre_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['nombre_usuario' => $nombre_usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // Retorna un array con los datos del usuario
    }

    // Crear un nuevo usuario
    public function create($nombre_usuario, $contraseña, $id_perfil) {
        // Encriptar la contraseña antes de almacenarla
        $hashed_password = password_hash($contraseña, PASSWORD_DEFAULT);

        $sql = "INSERT INTO Usuarios (Nombre_usuario, Contraseña, Id_perfil) 
                VALUES (:nombre_usuario, :contraseña, :id_perfil)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'nombre_usuario' => $nombre_usuario,
            'contraseña' => $hashed_password,
            'id_perfil' => $id_perfil
        ]);
    }

    // Actualizar la contraseña de un usuario
    public function updatePassword($id_usuario, $nueva_contraseña) {
        $hashed_password = password_hash($nueva_contraseña, PASSWORD_DEFAULT);

        $sql = "UPDATE Usuarios SET Contraseña = :contraseña WHERE Id_usuario = :id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id_usuario' => $id_usuario,
            'contraseña' => $hashed_password
        ]);
    }

    // Obtener un usuario por su ID
    public function getById($id_usuario) {
        $sql = "SELECT * FROM Usuarios WHERE Id_usuario = :id_usuario";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_usuario' => $id_usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
