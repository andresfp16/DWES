<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["iniciarSesion"])) {
        if ($_POST["usuario"] == $usuario && $_POST["contrasena"] == $contrasena) {
            $_SESSION["permiso"] =true;
        }
        echo "Usuario o contraseña incorrecta";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="usuario">
        <input type="text" name="contrasena">
        <input type="submit" value="Iniciar Sesión" name="iniciarSesion">
    </form>
</body>
</html>