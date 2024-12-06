<?php
require_once 'database.php';

class Perfil {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Crear un perfil
    public function create($nombre_perfil) {
        $sql = "INSERT INTO Perfiles (Nombre_perfil) VALUES (:nombre_perfil)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['nombre_perfil' => $nombre_perfil]);
    }

    // Obtener todos los perfiles
    public function getAll() {
        $sql = "SELECT * FROM Perfiles";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un perfil por su ID
    public function getById($id_perfil) {
        $sql = "SELECT * FROM Perfiles WHERE Id_perfil = :id_perfil";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_perfil' => $id_perfil]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un perfil
    public function update($id_perfil, $nombre_perfil) {
        $sql = "UPDATE Perfiles SET Nombre_perfil = :nombre_perfil WHERE Id_perfil = :id_perfil";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_perfil' => $id_perfil, 'nombre_perfil' => $nombre_perfil]);
    }

    // Eliminar un perfil
    public function delete($id_perfil) {
        $sql = "DELETE FROM Perfiles WHERE Id_perfil = :id_perfil";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_perfil' => $id_perfil]);
    }
}
?>
