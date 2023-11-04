<?php
/**
 * @author Andres
 * 
 */
include("config/usuarios.php");
session_start();

if (!$_SESSION["auth"]) {
    header("Location: inicio.php");
}

$auth = $_SESSION["auth"];
$usuario = $_SESSION["user"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Autentificación básica</h1>
    <div>
    <?php
        if ($auth) {
            echo "Bienvenido ". $_SESSION["user"];
            echo "<a href='cierreSesion.php'>Cerrar sesion</a>";
        }else{
            include("include/forLoging.php");
        }
    ?>
    </div>
    <nav>
        <?php 
        if ($auth) {
            include("include/NavUsuarios.php");
        }else {
            include("include/navInvitado.php");
        }
        ?>
    </nav>
    <h2>Privado2</h2>
</body>
</html>