<?php

require_once('../modelo/estudiantes.php');

if ($_POST) {
    $modeloEstudiantes = new estudiantes();
    $id = $_POST['id'];
    $modeloEstudiantes->delete($id);
} else {
    header('Location: ../../index.php');
}

?>