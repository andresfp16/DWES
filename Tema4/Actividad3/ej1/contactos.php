<?php
session_start();

if (!isset($_SESSION["autorizacion"])) {
    $_SESSION["autorizacion"] = false;
    $_SESSION["usuario"] = "invitado";
}


$autorizacion = $_SESSION["autorizacion"];
$usuario = $_SESSION["usuario"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autentificación</title>
</head>

<body>
    <h1>Contactos</h1>
    <header>
        <?php
        if ($autorizacion) {
            echo "Bienvenido $usuario";
            echo "</br><a href='cerrarSesion.php'>Cerrar Sesión</a>";
        } else {
            include("include/inicioSesion.php");
        }
        ?>
    </header>
    <nav>
    <?php
        if ($autorizacion) {
            include("include/navUsuario.php");
        } else {
            include("include/navInvitado.php");
        }
        ?>
    </nav>
</body>

</html>