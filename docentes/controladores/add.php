<?php

require_once('../modelo/docentes.php');

if ($_POST) {
    $modeloDocentes = new docentes();

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['password'];
    $modeloDocentes->add($nombre, $apellido, $usuario, $contrasena);
} else {
    header('Location: ../../index.php');
}

?>