<?php
include('config/config.php');
include('lib/functions.php');

// carvgamos valores
$valoresActuales = array();

$numerosAleatorios = array();

$procesaFormulario = false;
$numAciertos = 0;
$iconoRespuesta = '';
$claseRespuesta = '';

if (isset($_POST['send'])) {
    $procesaFormulario = true;
    foreach ($_POST['num'] as $f => $v1) {
        foreach ($v1 as $c => $v2) {
            $numerosAleatorios[] = array('f' => $f, 'c' => $c);
            $valoresActuales[$f][$c] = $v2;
            if ($valoresActuales[$f][$c] == $f * $c) {
                $numAciertos++;
            }
        }
    }
} else {
    // Generamos num aleatorios
    for ($i = 0; $i < NUMINPUTS; $i++) {
        do {
            $f = mt_rand(1, NUMTABLAS);
            $c = mt_rand(1, NUMTABLAS);
        } while (existeCoordenada($f, $c, $numerosAleatorios));
        $numerosAleatorios[] = array('f' => $f, 'c' => $c);
        $valoresActuales[$f][$c] = '';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <h1>Completa la tabla</h1>
    <form action="" method="post">
        <table>
            <?php
            echo "<tr>";
            echo "<td class=\"cabecera\"></td>";
            for ($i = 1; $i <= NUMTABLAS; $i++) {
                echo "<td class=\"cabecera\">$i</td>";
            }
            echo "</tr>";

            for ($f = 1; $f <= NUMTABLAS; $f++) {
                echo "<tr>";
                echo "<td class=\"cabecera\">$f</td>";
                for ($c = 1; $c <= NUMTABLAS; $c++) {
                    if (existeCoordenada($f, $c, $numerosAleatorios)) {
                        if ($procesaFormulario) {
                            $iconoRespuesta = $valoresActuales[$f][$c] == $f * $c ? '&#128512' : '&#128534';
                            $claseRespuesta = $valoresActuales[$f][$c] == $f * $c ? 'acierto' : 'fallo';
                        }
                        echo "<td><input class=\"$claseRespuesta\" title=\"" . $f . 'x' . $c . "\" type= \"text\" name= \"num[".$f."][".$c."]\"
                                   value= \"" . $valoresActuales[$f][$c] . "\">" . $iconoRespuesta . "</td>";
                    } else {
                        echo "<td>" . $f * $c . "</td>";
                    }
                }
                echo "</tr>";
            }
            ?>
            </tr>
        </table>
        <input type="submit" name="send" value="Enviar" class="enviar">
    </form>
</body>

</html>