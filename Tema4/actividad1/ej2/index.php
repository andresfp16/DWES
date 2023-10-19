<?php
/**
 * @author Andres
 * 
 * Escriba una página que compruebe si el navegador permite crear cookies y se
 * lo diga al usuario (mediante una o más páginas)
 */
setcookie("prueba","Cookie de prueba", time()+3600,"/");
header("Location: verificacion.php");
?>