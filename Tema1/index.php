<?php

/**
 * @author Andres
 * 
 * Creacion del array con los ejercicios
 */

$ejs = ["portfolio.php"];
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
        <h1>Ejercicios Tema 1</h1>
    </header>
    <main>
        <ul>
            <?php
            foreach ($ejs as $ejercicio) {
                $nombre = pathinfo($ejercicio, PATHINFO_FILENAME);
                echo "<li><a href= " . $ejercicio . ">" . $nombre . "</a></li>";
            }
            ?>
        </ul>
    </main>
</body>

</html>