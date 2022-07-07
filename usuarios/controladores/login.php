<?php

require_once('../modelo/usuarios.php');

if ($_POST) {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['password'];
    $modelo = new usuarios();
    if ($modelo->login($usuario, $contrasena)) {
        header("Location: ../../estudiantes/pages/index.php");
    } else {
        header("Location: ../../index.php");
    }
} else {
    header("Location: ../../index.php");
}

?>