<?php
require_once('../../usuarios/modelo/usuarios.php');
require_once('../modelo/materias.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validateSession();

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
    <form action="../controladores/add.php" method="post">
        <fieldset>
            <h1>Registrar materias</h1>
            <label>Nombre <input type="text" name="nombre" placeholder="Ingrese el nombre" autocomplete="off" required></label>
            <br><br>
            <input type="submit" value="Registrar">
        </fieldset>
    </form>
</body>

</html>