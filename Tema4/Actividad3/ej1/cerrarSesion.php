<?php
/**
 * @author Andres
 */
session_start();
if (!$_SESSION["autorizacion"]) {
    echo"No tienes una sesión iniciada.";
    die();
}
session_destroy();
header("Location: index.php");