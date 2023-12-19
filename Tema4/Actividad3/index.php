<?php

/**
 * @author Andres
 * 
 */
include("../config/ejercicios.php");
include("config/ejercicios.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 1</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <nav>
        <ul>
            <?php
            foreach ($carpetas as $clave => $valor) {
                $enlace = "../{$carpetas[$clave]['enlace']}/index.php";
                $nombre = $carpetas[$clave]['nombre'];
                if (!($nombre == "Actividad 3")) {
                    echo "<li><a href='$enlace'>$nombre</a></li>";
                }
            }
            ?>
        </ul>
    </nav>
    <main>
        <ul>
            <?php
            foreach ($ejercicios as $clave => $valor) {
                $enlace = "{$ejercicios[$clave]['enlace']}";
                $nombre = $ejercicios[$clave]['nombre'];
                echo "<li><a href='$enlace'>$nombre</a></li>";
            }
            ?>
        </ul>
    </main>
</body>

</html>