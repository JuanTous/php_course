<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de notas</title>
</head>
<body align="center">
<form action="usuarios/controladores/login.php" method="post">
<fieldset>
    <h1>Inicio de sesion</h1>
<label>Usuario <input type="text" name="usuario" placeholder="Ingrese su usuario" autocomplete="off" required></label>
&nbsp;
<label>Contraseña <input type="password" name="password" placeholder="Ingrese su contraseña" autocomplete="off" required></label>
<br><br>
<input type="submit" value="Iniciar sesión">
<br><br>
</fieldset>
</form>
</body>
</html>