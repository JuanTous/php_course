<?php

require_once('../modelo/materias.php');

if ($_POST) {
    $modelo = new materias();

    $nombre = $_POST['nombre'];
    $modelo->add($nombre);
} else {
    header('Location: ../../index.php');
}
