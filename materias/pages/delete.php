<?php
require_once('../../usuarios/modelo/usuarios.php');
require_once('../modelo/materias.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validateSession();

$id = $_GET['Id'];
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
 <form action="../controladores/delete.php" method="post">
<fieldset>
<h1>Eliminar materia</h1>
<input type="hidden" name="id" value="<?php echo $id; ?>">
<h5>¿Estas seguro que deseas eliminar esta materia?</h5>
    <table border="1" align="center">
        <tbody>
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
            </tr>
            <?php
            $materias = $modelo->getById($id);
            if ($materias != null) {
                foreach ($materias as $materia) {
            ?>
                    <tr>
                        <td><?php echo $materia['ID_MATERIA'] ?></td>
                        <td><?php echo $materia['MATERIA'] ?></td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table><br>
<input type="submit" value="Eliminar materia">
<a href="../pages/index.php">Ir atras</a>
</fieldset>
</form>   
</body>
</html>