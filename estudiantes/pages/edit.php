<?php

require_once('../../usuarios/modelo/usuarios.php');
require_once('../modelo/estudiantes.php');
require_once('../../metodos.php');

$modeloUsuarios = new usuarios();
$modeloUsuarios->validateSession();

$modelo = new estudiantes();
$id = $_GET['Id'];
$informacionEstudiante = $modelo->getById($id);

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
    <form action="../controladores/edit.php" method="post">
        <fieldset>
            <h1>Editar estudiantes</h1>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <?php
            if ($informacionEstudiante != null) {
                foreach ($informacionEstudiante as $estudiante) {
            ?>

                    <label>Nombre <input type="text" name="nombre" placeholder="Ingrese el nombre" autocomplete="off" value="<?php echo $estudiante['NOMBRE']; ?>" required></label>
                    <label>Apellido <input type="text" name="apellido" placeholder="Ingrese el apellido" autocomplete="off" value="<?php echo $estudiante['APELLIDO']; ?>" required></label>
                    <label>Documento <input type="text" name="documento" placeholder="Ingrese el documento" autocomplete="off" value="<?php echo $estudiante['DOCUMENTO']; ?>" required></label>
                    <label>Correo <input type="email" name="correo" placeholder="Ingrese el correo" autocomplete="off" value="<?php echo $estudiante['CORREO']; ?>" required></label>
                    <label>Promedio <input type="number" name="promedio" placeholder="Ingrese el promedio" autocomplete="off" value="<?php echo $estudiante['PROMEDIO']; ?>" required></label>
                    <br><br>
                    <label>Materias
                        <select name="materia" required>
                            <option value="<?php echo $estudiante['MATERIA'] ?>" selected><?php echo $estudiante['MATERIA'] ?></option>
                            <?php
                            $materias = $modeloMetodos->getMaterias();
                            if ($materias != null) {
                                foreach ($materias as $materia) {
                                    if ($estudiante['MATERIA'] != $materia['MATERIA']) {
                            ?>
                                        <option value="<?php echo $materia['MATERIA'] ?>"><?php echo $materia['MATERIA'] ?></option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select>
                    </label>
                    <label>Docente
                        <select name="docente" required>
                            <option value="<?php echo $estudiante['DOCENTE'] ?>" selected><?php echo $estudiante['DOCENTE'] ?></option>
                            <?php
                            $docentes = $modeloMetodos->getDocentes();
                            if ($docentes != null) {
                                foreach ($docentes as $docente) {
                                    if ($estudiante['DOCENTE'] != $docente['NOMBRE'] . " " . $docente['APELLIDO']) {
                            ?>
                                        <option value="<?php echo $docente['NOMBRE'] . " " . $docente['APELLIDO']; ?>"> <?php echo $docente['NOMBRE'] . " " . $docente['APELLIDO']; ?> </option>
                            <?php
                                    }
                                }
                            }
                            ?>
                        </select><br><br>
                    </label>
            <?php
                }
            }
            ?>
            <input type="submit" value="Editar estudiante">
            <a href="../pages/index.php">Ir atras</a>
        </fieldset>
    </form>
</body>

</html>