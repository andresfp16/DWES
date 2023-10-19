<?php
function crearCookie($nombre, $valor, $duracionEnSegundos) {
    $tiempoExpiracion = time() + $duracionEnSegundos;
    setcookie($nombre, $valor, $tiempoExpiracion, '/');
}

function comprobarCookie($nombre) {
    return isset($_COOKIE[$nombre]) ? $_COOKIE[$nombre] : null;
}

function destruirCookie($nombre) {
    setcookie($nombre, '', time() - 3600, '/');
}

if (isset($_POST['crearCookie'])) {
    $nombreCookie = 'miCookie';
    $valorCookie = 'Hola, esta es mi cookie';
    $duracionEnSegundos = 3600;

    crearCookie($nombreCookie, $valorCookie, $duracionEnSegundos);
    echo "Cookie creada con éxito.";
}

$nombreCookie = 'miCookie';
$valorCookie = comprobarCookie($nombreCookie);

if (isset($_POST['destruirCookie'])) {
    destruirCookie($nombreCookie);
    echo "Cookie destruida con éxito.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Cookies</title>
</head>
<body>
    <h1>Gestión de Cookies</h1>

    <?php if ($valorCookie): ?>
        <p>Estado de la cookie: <?php echo $valorCookie; ?></p>
    <?php else: ?>
        <p>La cookie no existe o ha expirado.</p>
    <?php endif; ?>

    <form method="post" action="">
        <input type="submit" name="crearCookie" value="Crear Cookie">
        <input type="submit" name="destruirCookie" value="Destruir Cookie">
    </form>
</body>
</html>
