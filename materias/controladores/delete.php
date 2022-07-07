<?php

require_once('../modelo/materias.php');

if ($_POST) {
    $modelo = new materias();
    $id = $_POST['id'];
    $modelo->delete($id);
} else {
    header('Location: ../../index.php');
}

?>