<?php
require_once('../../usuarios/modelo/usuarios.php');

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
            <h1>Registrar docentes</h1>
            <label>Nombre <input type="text" name="nombre" placeholder="Ingrese el nombre" autocomplete="off" required></label>
            <label>Apellido <input type="text" name="apellido" placeholder="Ingrese el apellido" autocomplete="off" required></label>
            <label>Usuario <input type="text" name="usuario" placeholder="Ingrese el usuario" autocomplete="off" required></label>
            <label>Contraseña <input type="password" name="password" placeholder="Ingrese la contraseña" autocomplete="off" required></label>
            <br><br>
            <input type="submit" value="Registrar docente">
        </fieldset>
    </form>
</body>

</html>