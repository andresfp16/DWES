<?php

/**
 * @author Andres
 */

if (!isset($_POST["submit"])) {
    header("Location: index.php");
}

session_start();
include("config/usuarios.php");
include("lib/funciones.php");

$nombreUser = text_input($_POST["nombre"]);
$contraseñaUser = text_input($_POST["contraseña"]);
$autorizacion = false;

foreach ($usuarios as $clave => $valor) {
    if ($nombreUser == $usuarios[$clave]["usuario"] && $contraseñaUser == $usuarios[$clave]["contraseña"]) {
        $autorizacion = true;
    }
}
$_SESSION["autorizacion"] = $autorizacion;
$_SESSION["usuario"] = $nombreUser;
header("Location: index.php");
