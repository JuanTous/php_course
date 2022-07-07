<?php

require_once('../../usuarios/modelo/usuarios.php');
require_once('../modelo/materias.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validateSessionAdministrador();

$modelo = new materias();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>

<body align="center">
    <h1>
        <a href="../../administradores/pages/index.php">Administradores</a> -
        <a href="../../docentes/pages/index.php">Docentes</a> -
        <a href="#">Materias</a> -
        <a href="../../estudiantes/pages/index.php">Estudiantes</a> -
        <a href="../../usuarios/controladores/salir.php">Salir</a>
    </h1>
    <h3><?php echo strtoupper($modeloUsuarios->getPerfil()) . ' - ' . strtoupper($modeloUsuarios->getNombre()) ?></h3>
    <table border="1" align="center">
        <tbody>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>ACCIONES</th>
            </tr>
            <?php
            $materias = $modelo->get();
            if ($materias != null) {
                foreach ($materias as $materia) {
            ?>
                    <tr>
                        <td><?php echo $materia['ID_MATERIA'] ?></td>
                        <td><?php echo $materia['MATERIA'] ?></td>
                        <td>
                            <a href="edit.php?Id=<?php echo $materia['ID_MATERIA'] ?>" target="blank">Editar</a>
                            <a href="delete.php?Id=<?php echo $materia['ID_MATERIA'] ?>" target="blank">Eliminar</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <td><a href="add.php" target="blank">Agregar materia</a></td>

</body>

</html>