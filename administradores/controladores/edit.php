<?php

require_once('../modelo/administradores.php');

if ($_POST) {
    $modeloAdministradores = new administradores();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['password'];
    $estado = $_POST['estado'];
    $modeloAdministradores->update($id, $nombre, $apellido, $usuario, $contrasena, $estado);
} else {
    header('Location: ../../index.php');
}

?>