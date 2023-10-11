<?php

/**
 * @author Andres
 * 
 * Dado el mes y año almacenados en variables, escribir un programa que muestre el
 * calendario mensual correspondiente. Marcar el día actual en verde y los festivos
 * en rojo.
 */
$dias = 30;
$mes = 7;
$anio = 2024;
if (($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0)) {
    if ($mes == 2) {
        $dias = 29;
    }
} else {
    if ($mes == 2) {
        $dias = 28;
    }
}

if ($mes == 1 || $mes == 3 || $mes == 5 || $mes == 7 || $mes == 8 || $mes == 10 || $mes == 12) {
    $dias = 31;
}

$numactual = rand(1, $dias);

$festivos = array();
$numFestivos = 5;

while (count($festivos) < $numFestivos) {
    $numFestivo = rand(1, $dias);
    if ($numFestivo != $numactual && !in_array($numFestivo, $festivos)) {
        $festivos[] = $numFestivo;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario Mensual</title>
    <style>
        .diaActual {
            color: green;
        }

        .festivo{
            color: red;
        }
    </style>
</head>

<body>
    <main>
        <table>
            <?php
            $diasSemana = array("L", "M", "X", "J", "V", "S", "D");

            foreach ($diasSemana as $dia) {
                echo '<th>' . $dia . '</th>';
            }

            $numdia = 0;
            for ($i = 1; $i <= 5; $i++) {
                echo '<tr>';
                for ($x = 1; $x <= 7; $x++) {
                    echo '<th';
                    if ($numdia == $numactual) {
                        echo ' class="diaActual"';
                    }elseif (in_array($numdia, $festivos)) {
                        echo ' class="festivo"';
                    }
                    echo '>';
                    if ($numdia < $dias) {
                        printf("%02d", ++$numdia);
                    }
                    echo '</th>';
                }
                echo '</tr>';
            }
            ?>
        </table>
        </table>
    </main>
</body>

</html>