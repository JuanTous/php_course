<?php

require_once('../../usuarios/modelo/usuarios.php');
require_once('../../metodos.php');


$modeloUsuarios = new usuarios();
$modeloUsuarios->validateSession();

$modeloMetodos = new metodos();

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
            <h1>Registrar estudiantes</h1>
            <label>Nombre <input type="text" name="nombre" placeholder="Ingrese el nombre" autocomplete="off" required></label>
            <label>Apellido <input type="text" name="apellido" placeholder="Ingrese el apellido" autocomplete="off" required></label>
            <label>Documento <input type="text" name="documento" placeholder="Ingrese el documento" autocomplete="off" required></label>
            <label>Correo <input type="email" name="correo" placeholder="Ingrese el correo" autocomplete="off" required></label>
            <label>Promedio <input type="number" name="promedio" placeholder="Ingrese el promedio" autocomplete="off" min="1" max="100" required></label>
            <br><br>
            <label>Materias
                <select name="materia" required>
                    <option selected disabled>Seleccione</option>
               <?php
               $materias = $modeloMetodos->getMaterias();
               if ($materias != null) {
                foreach ($materias as $materia) {
                    ?>
                    <option value="<?php echo $materia['MATERIA'];?>"> <?php echo $materia['MATERIA'];?> </option>
                    <?php
                   }
               }
               ?>
                </select>
            </label>
            &nbsp;
            <label>Docente
                <select name="docente" required>
                    <option value="0" selected disabled>Seleccione</option>
                    <?php
               $docentes = $modeloMetodos->getDocentes();
               if ($docentes != null) {
                foreach ($docentes as $docente) {
                    ?>
                    <option value="<?php echo $docente['NOMBRE'] . " " . $docente['APELLIDO'];?>"> <?php echo $docente['NOMBRE'] . " " . $docente['APELLIDO'];?> </option>
                    <?php
                   }
               }
               ?>
                </select>
            </label><br><br>
            <input type="submit" value="Registrar estudiante">
        </fieldset>
    </form>
</body>

</html>