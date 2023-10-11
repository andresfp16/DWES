<?php
/**
 * @author Andres
 */
include 'config/config.php';
$nombre = $datos['nombre'];
$correo = $datos['email'];
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta y título aquí -->
</head>

<body>
    <header>
        <h1><?php echo $nombre; ?></h1>
        <p>Contacto: <?php echo $correo; ?></p>
    </header>
    <footer>
    </footer>
</body>

</html>