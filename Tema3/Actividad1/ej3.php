<?php
/**
 * author: Andrés
 * date: 27/09/2023
 */
$dia = 26;
$mes = 10;
$ano = 2000;

$diahoy = date("d");
$meshoy = date("m");
$anohoy = date("Y");

$edad = $anohoy - $ano;
if($mes>$meshoy){
    $edad--;
}elseif($mes==$meshoy && $dia>$diahoy){
    $edad--;
}

echo $edad;
?>