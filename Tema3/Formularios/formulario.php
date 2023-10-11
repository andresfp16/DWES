<?php
/**
 * @author Andres
 * @version 0.1
 */

 $peticiones = ['Nombre', 'Apellidos', 'Email', 'Teléfono'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
    <main>
        <form action="procesoformulario.php" method="post">
        <?php 
            foreach ($peticiones as $valor) {
                echo "<input type=\"text\" name=\"$valor\" placeholder=\"$valor: \">";
                echo '</br>';
            }
            ?>
            <input type="submit" name="submit" value="Send">
            
        </form>
    </main>
</body>
</html>
