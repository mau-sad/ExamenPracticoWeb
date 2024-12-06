<?php
require_once 'database.php';

class Acceso {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Crear un acceso
    public function create($nombre_acceso) {
        $sql = "INSERT INTO Accesos (Nombre_acceso) VALUES (:nombre_acceso)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['nombre_acceso' => $nombre_acceso]);
    }

    // Obtener todos los accesos
    public function getAll() {
        $sql = "SELECT * FROM Accesos";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Obtener un acceso por su ID
    public function getById($id_acceso) {
        $sql = "SELECT * FROM Accesos WHERE Id_acceso = :id_acceso";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_acceso' => $id_acceso]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar un acceso
    public function update($id_acceso, $nombre_acceso) {
        $sql = "UPDATE Accesos SET Nombre_acceso = :nombre_acceso WHERE Id_acceso = :id_acceso";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_acceso' => $id_acceso, 'nombre_acceso' => $nombre_acceso]);
    }

    // Eliminar un acceso
    public function delete($id_acceso) {
        $sql = "DELETE FROM Accesos WHERE Id_acceso = :id_acceso";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_acceso' => $id_acceso]);
    }
}
?>
