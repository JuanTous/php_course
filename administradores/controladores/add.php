<?php

require_once('../modelo/administradores.php');

if ($_POST) {
    $modeloAdministradores = new administradores();

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['password'];
    $modeloAdministradores->add($nombre, $apellido, $usuario, $contrasena);
} else {
    header('Location: ../../index.php');
}

?>