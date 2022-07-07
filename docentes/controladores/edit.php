<?php

require_once('../modelo/docentes.php');

if ($_POST) {
    $modeloDocentes = new docentes();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['password'];
    $estado = $_POST['estado'];
    $modeloDocentes->update($id, $nombre, $apellido, $usuario, $contrasena, $estado);
} else {
    header('Location: ../../index.php');
}

?>