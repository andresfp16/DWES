<?php
include("config/temas.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temas</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <nav>
        <ul>
            <?php
            foreach ($temas as $clave => $valor) {
                $enlace = "{$temas[$clave]['enlace']}/index.php";
                $nombre = $temas[$clave]['nombre'];
                echo "<li><a href='$enlace'>$nombre</a></li>";
            }
            ?>
        </ul>
    </nav>
</body>

</html>