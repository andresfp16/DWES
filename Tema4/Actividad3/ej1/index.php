<?php

/**
 * Crea un sistema básico de autenticación en PHP. El objetivo es permitir que los
 * usuarios se autentiquen con un nombre de usuario y una contraseña para acceder al
 * área protegida.
 * Utiliza un array de configuración para almacenar los usuarios registrados en el
 * sistema.
 * Si no estamos autenticados en el sistema, la página de inicio mostrará: formulario de
 * login, información pública de inicio y menú de navegación por la zona pública.
 * Si estamos autenticados en el sistema, la página de inicio mostrará: información de
 * usuario con opción de cierre de sesión, hora de inicio de sesión, información pública
 * de inicio y menú de navegación por la zona pública y privada.
 * Las páginas de la aplicación solo deben mostrar un mensaje indicando si son públicas
 * o privadas.
 * 
 * @author Andres
 */
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