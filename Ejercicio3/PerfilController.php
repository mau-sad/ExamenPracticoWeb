<?php
require_once 'Perfil.php';

class PerfilController {
    private $perfilModel;

    public function __construct($pdo) {
        $this->perfilModel = new Perfil($pdo);
    }

    public function index() {
        $perfiles = $this->perfilModel->getAll();
        include 'perfil_view.php';
    }

    public function create($nombre_perfil) {
        $this->perfilModel->create($nombre_perfil);
        header('Location: index.php?action=index');
    }

    public function show($id_perfil) {
        $perfil = $this->perfilModel->getById($id_perfil);
        include 'create_edit_perfil.php';
    }

    public function update($id_perfil, $nombre_perfil) {
        $this->perfilModel->update($id_perfil, $nombre_perfil);
        header('Location: index.php?action=index');
    }

    public function delete($id_perfil) {
        $this->perfilModel->delete($id_perfil);
        header('Location: index.php?action=index');
    }
}
?>
