<?php

require_once('../modelo/administradores.php');

if ($_POST) {
    $modeloAdministradores = new administradores();
    $id = $_POST['id'];
    $modeloAdministradores->delete($id);
} else {
    header('Location: ../../index.php');
}

?>