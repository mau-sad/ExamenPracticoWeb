<?php
require_once 'database.php';

class Permiso {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Crear permiso
    public function create($id_perfil, $id_acceso, $puede_crear, $puede_leer, $puede_actualizar, $puede_borrar) {
        $sql = "INSERT INTO Permisos (Id_perfil, Id_acceso, Puede_crear, Puede_leer, Puede_actualizar, Puede_borrar) 
                VALUES (:id_perfil, :id_acceso, :puede_crear, :puede_leer, :puede_actualizar, :puede_borrar)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id_perfil' => $id_perfil,
            'id_acceso' => $id_acceso,
            'puede_crear' => $puede_crear,
            'puede_leer' => $puede_leer,
            'puede_actualizar' => $puede_actualizar,
            'puede_borrar' => $puede_borrar
        ]);
    }

    // Obtener permisos por perfil
    public function getByPerfil($id_perfil) {
        $sql = "SELECT * FROM Permisos WHERE Id_perfil = :id_perfil";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_perfil' => $id_perfil]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Actualizar permisos
    public function update($id_perfil, $id_acceso, $puede_crear, $puede_leer, $puede_actualizar, $puede_borrar) {
        $sql = "UPDATE Permisos 
                SET Puede_crear = :puede_crear, Puede_leer = :puede_leer, Puede_actualizar = :puede_actualizar, 
                Puede_borrar = :puede_borrar 
                WHERE Id_perfil = :id_perfil AND Id_acceso = :id_acceso";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            'id_perfil' => $id_perfil,
            'id_acceso' => $id_acceso,
            'puede_crear' => $puede_crear,
            'puede_leer' => $puede_leer,
            'puede_actualizar' => $puede_actualizar,
            'puede_borrar' => $puede_borrar
        ]);
    }

    // Eliminar permisos
    public function delete($id_perfil, $id_acceso) {
        $sql = "DELETE FROM Permisos WHERE Id_perfil = :id_perfil AND Id_acceso = :id_acceso";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_perfil' => $id_perfil, 'id_acceso' => $id_acceso]);
    }
}
?>
