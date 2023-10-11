<?php

/**
 * Creación del array con los ejercicios
 */
$ejs = [
    'actividad1' => ["ej1.php", "ej2.php", "ej3.php", "ej4.php", "ej5.php"],
    'actividad2' => ["ej1.php", "ej2.php", "ej3.php", "ej4.php", "ej5.php"],
    'actividad3' => ["ej1.php", "ej3.php", "ej4.php", "ej5.php"],
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios</title>
</head>

<body>
    <header>
        <h1>Ejercicios Tema 3</h1>
    </header>
    <main>
        <ul>
            <?php
            // Iterar sobre las actividades
            foreach ($ejs as $actividad => $ejercicios) {
                echo "<h3>$actividad</h3>";
                // Iterar sobre los ejercicios de cada actividad
                foreach ($ejercicios as $ejercicio) {
                    $nombre = pathinfo($ejercicio, PATHINFO_FILENAME);
                    $url = strtolower(str_replace(' ', '', $actividad)) . '/' . $ejercicio;
                    echo "<li><a href='$url'>$nombre</a></li>";
                }
            }
            ?>
        </ul>
    </main>
</body>

</html>
