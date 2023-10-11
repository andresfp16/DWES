<?php
/**
 * @author Andres
 * 
 * Creacion del cantidadTemas de temas
 */

 $cantidadTemas = 3;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Temas</title>
</head>

<body>
    <header>
        <h1>Temas de Desarrollo web en entorno servidor</h1>
    </header>
    <main>
        <ul>
            <?php
            for ($i=1; $i <= $cantidadTemas; $i++) { 
                echo "<li><a href= Tema".$i."/index.php>Tema ".$i."</a></li>";
            }
            ?>
        </ul>
    </main>
</body>

</html>