<?php

/**
 *    author = Andres;
 *    date = 27/09/2023;
 *
 */
$ano = 2024;
$mes = 11;
$dias = 31;
switch ($mes) {
    case 1:
    case 3:
    case 5:
    case 7:
    case 8:
    case 10:
    case 12:
        break;
    case 2:
        if (bisiesto($ano)) {
            $dias = 29;
        } else {
            $dias = 28;
        }
        break;
    case 4:
    case 6:
    case 9:
    case 11:
        $dias = 30;
        break;
    default:
        echo "Error";
        break;
}
function bisiesto($ano)
{
    return ($ano % 4 == 0 && $ano % 100 != 0) || ($ano % 400 == 0);
}

/**
 * VISTA
 */
printf("El mes %s y año %s tiene %s dias", $mes, $ano, $dias);
