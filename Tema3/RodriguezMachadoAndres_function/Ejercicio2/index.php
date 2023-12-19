<?php

/**
 * @author Andres
 * 
 * Utilizando los arrays del ejercicio, crea una aplicación que muestre un
 * formulario que permita al usuario introducir su nombre, idiomas y las
 * preguntas del cuestionario. En respuesta al formulario el sistema mostrará
 * los datos introducidos y las respuestas seleccionadas, las correctas y un
 * resumen con la calificación obtenida.
 */
include("../config/config.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test</title>
</head>

<body>
    <form action="corregirTest.php" method="post">
        <label for="nombre">Dime tu nombre</label>
        <input type="text" name="nombre" id="nombre">
        </br></br>

        <label for="idioma">Dime el idioma:</label>
        </br></br>
        <?php
        foreach ($idiomas as $clave => $idioma) {
            echo "<input type='checkbox' name='idiomas[]' value='" . $idioma . "'>" . $idioma."</br>";
        }
        ?>
        </br>
        </br>
        <?php
        /**
         * Con este foreach recorro el array tests. Primero hago un if para comprobar el tipo d epregunta para saber cque html ponerle.
         * y en el caso de la elección multiple hago otro foreach para recorrer las opciones y mostrarselas como checkbox
         */

        foreach ($tests as $clave => $test) {
            if ($test["Tipo"] == "text") {
                echo ("<label for='pregunta'>{$test['pregunta']}</label>");
                echo ("<input type='text' name='$clave-respuesta' id='respuesta'>");
                echo ("</br>");
                echo ("</br>");
            } else if ($test["Tipo"] == "Multiple-choice") {
                echo ("<label for='pregunta'>{$test['pregunta']}</label>");
                echo ("</br>");
                foreach ($test["Opciones"] as $opcion) {
                    echo "<input type='radio' name='$clave-respuesta' value='$opcion'>" . $opcion;
                    echo ("</br>");
                }
                echo ("</br>");
            }
        }
        ?>
        <input type="submit" value="Corregir">
    </form>
</body>

</html>