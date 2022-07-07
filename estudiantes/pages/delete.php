<?php
require_once('../../usuarios/modelo/usuarios.php');
require_once('../modelo/estudiantes.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validateSession();

$id = $_GET['Id'];
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
 <form action="../controladores/delete.php" method="post">
<fieldset>
<h1>Eliminar estudiante</h1>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<h5>¿Estas seguro que deseas eliminar este estudiante?</h5>
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
            </tr>
            <?php
            $estudiantes = $modelo->getById($id);
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

                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table><br><br>
    <input type="submit" value="Eliminar estudiante">
    <a href="../pages/index.php">Ir atras</a>
</fieldset>
</form>   
</body>
</html>