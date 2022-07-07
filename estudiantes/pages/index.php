<?php
require_once('../../usuarios/modelo/usuarios.php');
require_once('../modelo/estudiantes.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validateSession();

$modelo = new estudiantes();

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
    <?php
    if ($modeloUsuarios->getPerfil() == 'docente') {
    ?>
        <h1>
            <a href="#">Estudiantes</a> -
            <a href="../../usuarios/controladores/salir.php">Salir</a>
        </h1>
    <?php
    } else {
    ?>
        <h1>
            <a href="../../administradores/pages/index.php">Administradores</a> -
            <a href="../../docentes/pages/index.php">Docentes</a> -
            <a href="../../materias/pages/index.php">Materias</a> -
            <a href="#">Estudiantes</a> -
            <a href="../../usuarios/controladores/salir.php">Salir</a>
        </h1>
    <?php
    }
    ?>
    <h3><?php echo strtoupper($modeloUsuarios->getPerfil()) . ' - ' . strtoupper($modeloUsuarios->getNombre()) ?></h3>
    <table border="1" align="center">
        <tbody align="center">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>DOCUMENTO</th>
                <th>CORREO</th>
                <th>MATERIA</th>
                <th>DOCENTE</th>
                <th>PROMEDIO</th>
                <th>FECHA DE REGISTRO</th>
                <th>ACCIONES</th>
            </tr>
            <?php
            $estudiantes = $modelo->get();
            if ($estudiantes != null) {
                foreach ($estudiantes as $estudiante) {
            ?>
                    <tr>
                        <td><?php echo $estudiante['ID_ESTUDIANTE'] ?></td>
                        <td><?php echo $estudiante['NOMBRE'] ?></td>
                        <td><?php echo $estudiante['APELLIDO'] ?></td>
                        <td><?php echo $estudiante['DOCUMENTO'] ?></td>
                        <td><?php echo $estudiante['CORREO'] ?></td>
                        <td><?php echo $estudiante['MATERIA'] ?></td>
                        <td><?php echo $estudiante['DOCENTE'] ?></td>
                        <td><?php echo $estudiante['PROMEDIO'] ?>%</td>
                        <td><?php echo $estudiante['FECHA_REGISTRO'] ?></td>
                        <td>
                            <a href="edit.php?Id=<?php echo $estudiante['ID_ESTUDIANTE'] ?>" target="blank">Editar</a>
                            <a href="delete.php?Id=<?php echo $estudiante['ID_ESTUDIANTE'] ?>" target="blank">Eliminar</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <td><a href="add.php" target="blank">Agregar estudiante</a></td>

</body>

</html>