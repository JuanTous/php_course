<?php
require_once('../../usuarios/modelo/usuarios.php');
require_once('../modelo/administradores.php');

$modeloUsuarios = new usuarios();
$modelo = new administradores();

$modeloUsuarios->validateSessionAdministrador();

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
        <a href="#">Administradores</a> -
        <a href="../../docentes/pages/index.php">Docentes</a> -
        <a href="../../materias/pages/index.php">Materias</a> -
        <a href="../../estudiantes/pages/index.php">Estudiantes</a> -
        <a href="../../usuarios/controladores/salir.php">Salir</a>
    </h1>
    <h3><?php echo strtoupper($modeloUsuarios->getPerfil()) . ' - ' . strtoupper($modeloUsuarios->getNombre()) ?></h3>
    <table border="1" align="center">
        <tbody>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>USUARIO</th>
                <th>PERFIL</th>
                <th>ESTADO</th>
                <th>ACCIONES</th>
            </tr>
            <?php
            $administradores = $modelo->get();
            if ($administradores != null) {
                foreach ($administradores as $administrador) {
            ?>
                    <tr>
                        <td><?php echo $administrador['ID_USUARIO'] ?></td>
                        <td><?php echo $administrador['NOMBRE'] ?></td>
                        <td><?php echo $administrador['APELLIDO'] ?></td>
                        <td><?php echo $administrador['USUARIO'] ?></td>
                        <td><?php echo $administrador['PERFIL'] ?></td>
                        <td><?php echo $administrador['ESTADO'] ?></td>
                        <td>
                            <a href="edit.php?Id=<?php echo $administrador['ID_USUARIO'] ?>" target="blank">Editar</a>
                            <a href="delete.php?Id=<?php echo $administrador['ID_USUARIO'] ?>" target="blank">Eliminar</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <td><a href="add.php" target="blank">Agregar administrador</a></td>

</body>

</html>