<?php

/**
 * @author Andres
 * 
 * Creacion del array con los ejercicios
 */

$ejs = ["ej1.php","ej2.php","ej3.php","ej4.php","ej5.php","ej6.php","ej7.php","ej8.php","ej9.php","ej0.php"];
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
        <h1>Ejercicios Tema 2</h1>
    </header>
    <main>
        <ul>
            <?php
            foreach ($ejs as $ejercicio) {
                $nombre = pathinfo($ejercicio, PATHINFO_FILENAME);
                echo "<li><a href= ActividadesEvaluables/" . $ejercicio . ">" . $nombre . "</a></li>";
            }
            ?>
        </ul>
    </main>
</body>

</html>