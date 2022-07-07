<?php

require_once('../modelo/docentes.php');

if ($_POST) {
    $modeloDocentes = new docentes();
    $id = $_POST['id'];
    $modeloDocentes->delete($id);
} else {
    header('Location: ../../index.php');
}

?>