<?php
/**
*    author = Andres;
*    date = 27/09/2023;
*
*/

$num = 5;
$num2 = 16;
$num3 = 30;

if ($num > $num2) {
    if ($num2>$num3) {
        printf("%s > %s > %s", $num, $num2, $num3);
    }else{
        printf("%s > %s > %s", $num, $num3, $num2);
    }
}elseif ($num2>$num3) {
    if ($num3>$num) {
        printf("%s > %s > %s", $num2, $num3, $num);
    }else{
        printf("%s > %s > %s", $num2, $num, $num3);
    }
}elseif ($num3>$num) {
    if ($num>$num2) {
        printf("%s > %s > %s", $num3, $num, $num2);
    }else{
        printf("%s > %s > %s", $num3, $num2, $num);
    }
}

// $numeros = [$num, $num2, $num3];

// sort($numeros, SORT_NUMERIC);

// print_r($numeros);
