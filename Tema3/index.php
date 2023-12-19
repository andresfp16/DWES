<?php

/**
 * @author Andres
 * 
 */
include("../config/temas.php");
include("config/ejercicios.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <ul>
            <?php
            foreach ($temas as $clave => $valor) {
                $enlace = "../{$temas[$clave]['enlace']}/index.php";
                $nombre = $temas[$clave]['nombre'];
                if (!($nombre == "Tema 3")) {
                    echo "<li><a href='$enlace'>$nombre</a></li>";
                }
            }
            ?>
        </ul>
    </nav>
    <main>
        <ul>
            <?php
            foreach ($carpetas as $clave => $valor) {
                $enlace = "{$carpetas[$clave]['enlace']}/index.php";
                $nombre = $carpetas[$clave]['nombre'];
                echo "<li><a href='$enlace'>$nombre</a></li>";
            }
            ?>
        </ul>
    </main>
</body>

</html>