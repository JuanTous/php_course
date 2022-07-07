<?php
require_once('../../usuarios/modelo/usuarios.php');
require_once('../modelo/administradores.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validateSession();

$id = $_GET['Id'];
$modelo = new administradores();

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
<h1>Eliminar administrador</h1>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<h5>¿Estas seguro que deseas eliminar este administrador?</h5>
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
            $administradores = $modelo->getById($id);
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
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
<input type="submit" value="Eliminar administrador">
</fieldset>
</form>   
</body>
</html>