<?php

require_once('../../usuarios/modelo/usuarios.php');
require_once('../modelo/materias.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validateSession();

$modelo = new materias();

$id = $_GET['Id'];
$materias = $modelo->getById($id);

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de multas</title>
</head>

<body align="center">
    <form action="../controladores/edit.php" method="post">
        <fieldset>
            <h1>Editar materias</h1>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <?php
            if ($materias != null) {
                foreach ($materias as $materia) {
            ?>
                    <label>Nombre <input type="text" name="nombre" placeholder="Ingrese el nombre" autocomplete="off" value="<?php echo $materia['MATERIA']; ?>" required></label>
            <?php
                }
            }
            ?>
            <br><br>
            <input type="submit" value="Editar">
        </fieldset>
    </form>
</body>

</html>