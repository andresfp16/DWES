<?php
if (!isset($_POST["anadirtarea"])) {
    header("Location: ../index.php");
}
function guardarTarea($dia, $mes, $anio, $texto, $archivo = "../config/tareas.txt") {
    $linea = "$dia,$mes,$anio,$texto\n";
    file_put_contents($archivo, $linea, FILE_APPEND);
}

if (isset($_POST["anadirtareas"])) {
    $dia = $_POST["dia"];
    $mes = $_POST["mes"];
    $anio = $_POST["anio"];
    $texto = $_POST["texto"];

    if (checkdate($mes, $dia, $anio)) {
        guardarTarea($dia, $mes, $anio, $texto);
    } else {
        echo "Fecha no válida. Introduce una fecha válida.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Tarea</title>
</head>

<body>
    <h1>Añadir Tarea</h1>
    <form method="post" action="">
        <label for="dia">Día:</label>
        <input type="text" name="dia" required>
        <label for="mes">Mes:</label>
        <input type="text" name="mes" required>
        <label for="anio">Año:</label>
        <input type="text" name="anio" required>
        <label for="texto">Tarea:</label>
        <input type="text" name="texto" required>
        <input type="submit" name="anadirtareas" value="Añadir Tarea">
    </form>
</body>

</html>
