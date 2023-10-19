<?php
/**
 * @author Andres
 * Incorpora a tu servidor un mensaje que indique al usuario el tiempo transcurrido
 * desde su último acceso y un mensaje personalizado en función de éste.
 */

$nombreCookie = 'ultimoAcceso';

if (isset($_COOKIE[$nombreCookie])) {
    $ultimoAcceso = $_COOKIE[$nombreCookie];

    $tiempoTranscurrido = time() - $ultimoAcceso;
    $minutosTranscurridos = floor($tiempoTranscurrido / 60);

    if ($minutosTranscurridos < 1) {
        $mensaje = "¡Bienvenido de nuevo! Hace menos de un minuto que estuviste aquí.";
    } else {
        $mensaje = "¡Hola de nuevo! Han pasado {$minutosTranscurridos} minutos desde tu último acceso.";
    }
} else {
    $mensaje = "¡Bienvenido! Es la primera vez que visitas nuestro sitio.";
}

// Almacena la nueva marca de tiempo del último acceso
setcookie($nombreCookie, time(), time() + 3600, '/');
echo $mensaje;
?>
