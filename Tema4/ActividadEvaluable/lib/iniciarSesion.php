<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["comprobar"])) {
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    if (!verificarUsuarioContraseña($usuario, $contrasena)) {
        echo "Usuario o contraseña incorrectos. Inténtalo de nuevo.";
    }
}

function verificarUsuarioContraseña($usuario, $contrasena) {
    $lineas = file("config/usuarios.txt", FILE_IGNORE_NEW_LINES);
    foreach ($lineas as $linea) {
        list($usuario_guardado, $contrasena_guardada) = explode(",", $linea);
        if ($usuario == $usuario_guardado && $contrasena == $contrasena_guardada) {
            $_SESSION["permiso"] = true;
            header("Location: index.php");
        }
    }
    return false;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Inicio de Sesión</h1>
    <form action="" method="post">
        <label for="usuario">Dime tu nombre de usuario: </label>
        <input type="text" name="usuario">
        <label for="contrasena">Dime tu contraseña: </label>
        <input type="text" name="contrasena"></br>
        <input type="submit" value="Iniciar Sesión" name="comprobar">
    </form>
</body>
</html>