<?php
$string = "Soy una cadena";
$integer = 33;
$double = 3.33;
$boolean = TRUE;
$null = NULL;

function mostrarTipo($variable) {
    $tipo = gettype($variable);
    echo "Valor es $tipo.</br>";
}

mostrarTipo($string);
mostrarTipo($integer);
mostrarTipo($double);
mostrarTipo($boolean);
mostrarTipo($null);

echo "</br><a href=\"https://github.com/andresfp16/DWES/blob/main/Tema2/ActividadesEvaluables/ej9.php\">Enlace Github</a>";

?>