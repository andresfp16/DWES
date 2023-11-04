<?php

/**
 * @author Andres
 */

if (!isset($_POST["submit"])) {
    header("Location: inicio.php");
}

session_start();
include("config/usuarios.php");
include("lib/functions.php");

$user = text_input($_POST["name"]);
$passwrd = text_input($_POST["password"]);

$auth = false;

foreach ($usuarios as $clave => $valor) {
    if ($user == $usuarios[$clave]["user"] && $passwrd == $usuarios[$clave]["psw"]) {
        $auth = true;
    }
}
$_SESSION["auth"] = $auth;
$_SESSION["user"] = $user;
header("Location: inicio.php");
