<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["volver"])) {
        header("Location: ../index.php");
    }
    if (isset($_POST["cerrarSesion"])) {
        include("cerrarSesion.php");
    }
}

$directorio = '../';
$usuario = "andres";
$contrasena = "rodriguez";
if (!isset($_SESSION["permiso"])) {
    $_SESSION["permiso"] = false;
}
$permiso = $_SESSION["permiso"];
$comandasPendientes = [];

$archivos = scandir($directorio);
foreach ($archivos as $archivo) {
    if (strpos($archivo, 'comanda') !== false && strpos($archivo, 'pendiente.txt') !== false) {
        $rutaCompleta = $directorio . $archivo;

        $contenido = file($rutaCompleta, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $comanda = [];
        foreach ($contenido as $linea) {
            $datos = explode("\t", $linea);
            $comanda[] = [
                'nombre' => $datos[0],
                'cantidad' => $datos[1],
                'tamaño' => isset($datos[2]) ? $datos[2] : null,
            ];
        }

        $comandasPendientes[] = $comanda;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comandas Pendientes</title>
</head>

<body>
    <?php
    if (!$permiso) {
        include("permiso.php");
    } else {
        if (empty($comandasPendientes)) {
            echo '<p>No hay comandas pendientes.</p>';
        } else {
            echo '<h2>Comandas Pendientes:</h2>';
            foreach ($comandasPendientes as $index => $comanda) {
                echo '<h3>Comanda #' . ($index + 1) . '</h3>';
                echo '<table border="1">';
                echo '<tr><th>Nombre</th><th>Cantidad</th><th>Tamaño</th></tr>';

                foreach ($comanda as $item) {
                    echo '<tr>';
                    echo '<td>' . $item['nombre'] . '</td>';
                    echo '<td>' . $item['cantidad'] . '</td>';
                    echo '<td>' . ($item['tamaño'] ?? '-') . '</td>';
                    echo '</tr>';
                }

                echo '</table>';
            }
        }
    }
    ?>
    <form action="" method="post">
        <input type="submit" name="cerrarSesion" value="Cerrar Sesión">
        <input type="submit" name="volver" value="Volver al inicio">
    </form>
</body>

</html>