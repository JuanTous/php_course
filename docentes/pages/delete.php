<?php
require_once('../../usuarios/modelo/usuarios.php');
require_once('../modelo/docentes.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validateSession();

$id = $_GET['Id'];
$modelo = new docentes();

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
 <form action="../controladores/delete.php" method="post">
<fieldset>
<h1>Eliminar docente</h1>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<h5>¿Estas seguro que deseas eliminar este docente?</h5>
<table border="1" align="center">
        <tbody>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>USUARIO</th>
                <th>PERFIL</th>
                <th>ESTADO</th>
            </tr>
            <?php
            $docentes = $modelo->getById($id);
            if ($docentes != null) {
                foreach ($docentes as $docente) {
            ?>
                    <tr>
                        <td><?php echo $docente['ID_USUARIO'] ?></td>
                        <td><?php echo $docente['NOMBRE'] ?></td>
                        <td><?php echo $docente['APELLIDO'] ?></td>
                        <td><?php echo $docente['USUARIO'] ?></td>
                        <td><?php echo $docente['PERFIL'] ?></td>
                        <td><?php echo $docente['ESTADO'] ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
<input type="submit" value="Eliminar docente">
</fieldset>
</form>   
</body>
</html>