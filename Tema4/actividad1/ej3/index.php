<?php
function text_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$nombre = $apellidos = $correo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = text_input($_POST["nombre"]);
    $apellidos = text_input($_POST["apellidos"]);
    $correo = text_input($_POST["email"]);

    if (isset($_POST["eliminar"])) {
        $nombre = "";
        $apellidos = "";
        $correo = "";

        setcookie("nombre", "", time() - 3600, '/');
        setcookie("apellidos", "", time() - 3600, '/');
        setcookie("email", "", time() - 3600, '/');
    } else if (isset($_POST["enviar"])) {
        setcookie("nombre", $nombre, time() + 3600, '/');
        setcookie("apellidos", $apellidos, time() + 3600, '/');
        setcookie("email", $correo, time() + 3600, '/');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Login</title>
</head>

<body>
    <form action="" method="post">
        <label for="nombre">Dame tu nombre:</label>
        <input type="text" name="nombre" value="<?php echo $nombre ?>">
        </br></br>
        <label for="apellidos">Dame tus apellidos:</label>
        <input type="text" name="apellidos" value="<?php echo $apellidos ?>">
        </br></br>
        <label for="email">Dame tu email:</label>
        <input type="email" name="email" value="<?php echo $correo ?>">
        </br></br>
        <input type="submit" name="enviar" value="Enviar">
        <input type="submit" name="eliminar" value="Borrar datos">
    </form>
</body>

</html>
