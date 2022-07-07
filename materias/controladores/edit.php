<?php

require_once('../modelo/materias.php');

if ($_POST) {
    $modelo = new materias();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $modelo->update($id, $nombre);
} else {
     header('Location: ../../index.php');
}

?>