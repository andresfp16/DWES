<?php

/**
 * @author Andres
 * 
 * Definir un array que permita almacenar y mostrar la siguiente información.
 * a. Meses del año.
 * b. Tablero para jugar al juego de los barcos.
 * c. Nota de los alumnos de 2o DAW para el módulo DWES.
 * d. Verbos irregulares en inglés.
 * e. Información sobre continentes, países, capitales y banderas.
 */

// Meses del año.

$info = [
    'meses' => [
        'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
        'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
    ],
    'tablero' =>  ['[]', '[]', '[]', '[]', '[]', '[]', '[]', '[]', '[]'],
    'notasDWES' => [
        'alumno1' => 8,
        'alumno2' => 7,
        'alumno3' => 9,
    ],
    'verbos' => [
        'be', 'have', 'do', 'say', 'go', 'know', 'get', 'make', 'see', 'come'
    ],
    'paises' => [
        'Asia' => [
            'China' => ['Capital' => 'Beijing', 'bandera' => ['Rojo', 'Amarillo']],
            'India' => ['Capital' => 'Nueva Delhi', 'bandera' => ['Naranja', 'Blanco', 'Verde']],
        ],
        'Europa' => [
            'Francia' => ['Capital' => 'París', 'bandera' => ['Azul', 'Blanco', 'Rojo']],
            'Alemania' => ['Capital' => 'Berlín', 'bandera' => ['Negro', 'Rojo', 'Amarillo']],
            'España' => ['Capital' => 'Madrid', 'bandera' => ['Rojo', 'Amarillo']],
        ],
        'América' => [
            'Estados Unidos' => ['Capital' => 'Washington, D.C.', 'bandera' => ['Rojo', 'Blanco', 'Azul']],
            'Brasil' => ['Capital' => 'Brasilia', 'bandera' => ['Verde', 'Amarillo', 'Azul', 'Blanco']],
        ],
        'África' => [
            'Nigeria' => ['Capital' => 'Abuja', 'bandera' => ['Verde', 'Blanco', 'Verde']],
            'Egipto' => ['Capital' => 'El Cairo', 'bandera' => ['Negro', 'Rojo', 'Blanco']],
        ],
        'Oceanía' => [
            'Australia' => ['Capital' => 'Canberra', 'bandera' => ['Verde', 'Oro']],
        ],
    ],
];

foreach ($info["meses"] as $mes) {
    echo $mes . '</br>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table>
        <?php
        $movimiento = 0;
        for ($fila = 0; $fila < 3; $fila++) {
            echo '<tr>';
            for ($columna = 0; $columna < 3; $columna++) {
                echo '<td>';
                echo $info["tablero"][$movimiento];
                echo '</td>';
                $movimiento++;
            }
            echo '</tr>';
        }
        ?>
    </table>
</body>

</html>

<?php

foreach ($info['notasDWES'] as $alumno => $nota) {
    echo $alumno . ': ' . $nota . '<br>';
}

foreach ($info["verbos"] as $verbo) {
    echo $verbo . '<br>';
}

foreach ($info["paises"] as $continente => $paises_continente) {
    echo '<strong>' . $continente . '</strong><br>';
    foreach ($paises_continente as $pais => $detalles) {
        echo ' - ' . $pais . ': Capital - ' . $detalles['Capital'] . ', bandera - ' . implode(', ', $detalles['bandera']) . '<br>';
    }
    echo '<br>';
}
