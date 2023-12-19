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
    <title>Tema 2</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <ul>
            <?php
            foreach ($temas as $clave => $valor) {
                $enlace = "../{$temas[$clave]['enlace']}/index.php";
                $nombre = $temas[$clave]['nombre'];
                if (!($nombre == "Tema 2")) {
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
                $enlace = "ActividadesEvaluables/{$ejercicios[$clave]['enlace']}";
                $nombre = $ejercicios[$clave]['nombre'];
                echo "<li><a href='$enlace'>$nombre</a></li>";
            }
            ?>
        </ul>
    </main>
</body>

</html>