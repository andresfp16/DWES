<?php

/**
 * @author Andres
 * Crea una función que reciba como parámetro un dni y retorne un password generado del siguiente modo.
 * - Sumar los dígitos del dni.
 * - Calcular el resto de dividir la suma anterior por 7
 * - El password según el resto obtenido sería el siguiente:
 * • 0: array
 * • 1: for
 * • 2: while
 * • 3: foreach
 * • 4: if
 * • 5: function
 * • 6: echo
 * • 7: switch
 * - Crea un script con un formulario que permita introducir un dni y calcule su correspondiente password.
 * - Prueba el script con tu dni y calcula tu password.
 * 
 * Mi dni es 31897339, y me devuelve function
 */
$formEnviado = false;

// Esta funcion me devuelve el resto del dni que le paso.
function sumarCadenaYCalcularResto($dni)
{
    // Este if sirve para comprobar que el dni que me dan tiene la longitud correcta. 
    // Si es correcta creo un array con explode y sumo los numeros que contiene.
    // A esos numeros los divido entre 7 con % para que me de el resto
    if (strlen($dni) == 8) {
        $numeros = explode(',', $dni);
        $suma = array_sum($numeros);
        $resto = $suma % 7;
        return $resto;
    }
    return -1;
    

}

if (isset($_POST["numDni"])) {
    $dni = $_POST["numDni"];
    $claveDni = sumarCadenaYCalcularResto($dni);
    // En este switch cojo el valor que me devuelve la funcion y dependiendo del valor devuelvo una frase u otra.
    switch ($claveDni) {
        case 0:
            echo("Tu contraseña es array.");
            break;
        case 1:
            echo("Tu contraseña es for.");
            break;
        case 2:
            echo("Tu contraseña es while.");
            break;
        case 3:
            echo("Tu contraseña es foreach.");
            break;
        case 4:
            echo("Tu contraseña es if.");
            break;
        case 5:
            echo("Tu contraseña es function.");
            break;
        case 6:
            echo("Tu contraseña es echo.");
            break;
        case 7:
            echo("Tu contraseña es switch.");
            break;
        default:
            echo("Error: Dato introducido incorrecto");
            break;
    }
    $formEnviado = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clave Dni</title>
</head>

<body>
    <?php if (!$formEnviado) {?>
    <form action="" method="post">
        <label for="numDni">Dame el número de tu dni:</label>
        <input type="number" name="numDni" id="numDni">
        <input type="submit" value="Enviar">
    </form>
    <?php }?>
</body>

</html>