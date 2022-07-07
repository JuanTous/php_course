<?php

require_once('../../usuarios/modelo/usuarios.php');
require_once('../modelo/administradores.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validateSession();

$modelo = new administradores();
$id = $_GET['Id'];
$informacionAdmin = $modelo->getById($id);

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
            <h1>Editar administradores</h1>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <?php
            if ($informacionAdmin != null) {
                foreach ($informacionAdmin as $administrador) {
            ?>
                    <label>Nombre <input type="text" name="nombre" placeholder="Ingrese el nombre" autocomplete="off" value="<?php echo $administrador['NOMBRE']; ?>" required></label>
                    <label>Apellido <input type="text" name="apellido" placeholder="Ingrese el apellido" autocomplete="off" value="<?php echo $administrador['APELLIDO']; ?>" required></label>
                    <label>Usuario <input type="text" name="usuario" placeholder="Ingrese el usuario" autocomplete="off" value="<?php echo $administrador['USUARIO']; ?>" required></label>
                    <label>Contraseña <input type="password" name="password" placeholder="Ingrese la contraseña" autocomplete="off" value="<?php echo $administrador['PASSWORD']; ?>" required></label>
                    <label>Estado
                        <select name="estado" required>
                            <?php
                            if ($administrador['ESTADO'] == 'activo') {
                            ?>
                                <option value="<?php echo $administrador['ESTADO'] ?>" selected><?php echo $administrador['ESTADO'] ?></option>
                                <option value="inactivo">inactivo</option>
                            <?php
                            } else {
                            ?>
                                <option value="<?php echo $administrador['ESTADO'] ?>" selected><?php echo $administrador['ESTADO'] ?></option>
                                <option value="activo">activo</option>
                    <?php
                            }
                        }
                    }
                    ?>
                        </select>
                    </label> <br><br>
                    <input type="submit" value="Editar administrador">
        </fieldset>
    </form>
</body>

</html>