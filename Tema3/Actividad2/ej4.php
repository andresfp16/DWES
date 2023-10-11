<?php
/**
 * @author Andres
 * 
 * Mostrar paleta de colores. Utilizar una tabla que muestre el color y el valor
 * hexadecimal que le corresponde. Cada celda será un enlace a una página que
 * mostrará un fondo de pantalla con el color seleccionado. ¿Puedes hacerlo con los
 * conocimientos que tienes?
 */
$color = 0;
echo "<table>";
for ($i = 0; $i < 3; $i++) {
    echo "<tr>";
    for ($j = 0; $j < 5; $j++) {
        if ($i==0) {
            $hexadecimal = rgbToHex($color,0,0);
            $nombreArchivo = substr($hexadecimal,1);
            echo "<td style='background-color: rgb($color,0,0);'><a href='./$nombreArchivo.php'>$hexadecimal</a></td>";
        }elseif ($i==1) {
            $hexadecimal = rgbToHex($color,0,0);
            $nombreArchivo = substr($hexadecimal,1);
            echo "<td style='background-color: rgb(0,$color,0);'><a href='./$nombreArchivo.php'>$hexadecimal</a></td>";
        }else {
            $hexadecimal = rgbToHex($color,0,0);
            $nombreArchivo = substr($hexadecimal,1);
            echo "<td style='background-color: rgb(0,0,$color);'><a href='./$nombreArchivo.php'>$hexadecimal</a></td>";
        }
        $color += 64;
    }
    echo "</tr>";
    $color = 0;
}
echo "</table>";

function rgbToHex($r, $g, $b) {
    $r = max(0, min(255, $r));
    $g = max(0, min(255, $g));
    $b = max(0, min(255, $b));

    $hex = sprintf("#%02x%02x%02x", $r, $g, $b);

    return $hex;
}