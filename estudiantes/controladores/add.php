<?php

require_once('../modelo/estudiantes.php');

if ($_POST) {
    $modeloEstudiantes = new estudiantes();

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $documento = $_POST['documento'];
    $correo = $_POST['correo'];
    $materia = $_POST['materia'];
    $docente = $_POST['docente'];
    $promedio = $_POST['promedio'];
    $fecha = date('y-m-d');
    $modeloEstudiantes->add($nombre, $apellido, $documento, $correo, $materia, $docente, $promedio, $fecha);
} else {
    header('Location: ../../index.php');
}

?>