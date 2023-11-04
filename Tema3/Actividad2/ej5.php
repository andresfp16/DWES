<?php

/**
 * @author Andres
 * 
 * Dado el mes y año almacenados en variables, escribir un programa que muestre el
 * calendario mensual correspondiente. Marcar el díaActual en verde y los festivos
 * en rojo.
 */
$diasMes;
$mes;
$anio = 2023;
$mostrarMes = false;
function text_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST["submit"])) {
    $mostrarMes = true;
    $mes = $_POST["mes"];
    $mes = sprintf("%02d", $mes);
    
    switch ($mes) {
        case "01":
        case "03":
        case "05":
        case "07":
        case "08":
        case "10":
        case "12":
            $diasMes = 31;
            break;
    
        case "02":
            if (($anio % 4 == 0 && $anio % 100 != 0) || ($anio % 400 == 0)) {
                $diasMes = 29;
            } else {
                $diasMes = 28;
            }
            break;
    
        case "04":
        case "06":
        case "09":
        case "11":
            $diasMes = 30;
            break;
    
        default:
            echo "Dato no valido";
            $mostrarMes = false;
            break;
    }
}

$festivos = array(
    "06/01",
    "07/04",
    "01/05",
    "15/08",
    "12/10",
    "01/11",
    "06/12",
    "08/12",
    "25/12"
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario</title>
    <style>
        table {
            border-collapse: collapse;
            width: 50%;
            margin: 0 auto;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 5px;
            text-align: center;
        }

        .diaActual {
            background-color: green;
        }

        .vacaciones {
            background-color: red;
        }
    </style>
</head>

<body>
    <main>
        <form method="POST" action="">
            <label for="mes">Selecciona un mes:</label>
            <input type="number" name="mes" min="1" max="12" required>
            <input type="submit" name="submit" value="Mostrar Calendario">
        </form>

        <?php
        if ($mostrarMes) {
            echo "<h2>Calendario de $mes/$anio</h2>";

            echo "<table>";
                echo "<tr>";
                    echo "<th>Lunes</th>";
                    echo "<th>Martes</th>";
                    echo "<th>Miércoles</th>";
                    echo "<th>Jueves</th>";
                    echo "<th>Viernes</th>";
                    echo "<th>Sábado</th>";
                    echo "<th>Domingo</th>";
                echo "</tr>";

                $primer_dia_mes = strtotime("$anio-$mes-01");
                $dia_inicio_semana = date("N", $primer_dia_mes);

                // Agregar celdas vacías para los días previos al primer día del mes
                echo "<tr>";
                    for ($i = 1; $i < $dia_inicio_semana; $i++) {
                        echo "<td></td>";
                    }

                    for ($dia = 1; $dia <= 31; $dia++) {
                        if ($dia > $diasMes) {
                            echo "<td></td>"; // Celdas vacías para los días después del último día del mes.
                        } else {
                            $clase = "";
                            if ($dia == intval(date("d")) && $mes == intval(date("m"))) {
                                $clase = "diaActual";
                            } elseif (in_array(sprintf("%02d/%02d", $dia, $mes), $festivos)) {
                                $clase = "vacaciones";
                            }
                            echo "<td class='$clase'>$dia</td>";
                        }

                        if ($dia_inicio_semana == 7) {
                            echo "</tr><tr>";
                            $dia_inicio_semana = 1;
                        } else {
                            $dia_inicio_semana++;
                        }
                    }

                    // Completar la última semana con celdas vacías si es necesario
                    while ($dia_inicio_semana <= 7) {
                        echo "<td></td>";
                        $dia_inicio_semana++;
                    }

                echo "</tr>";
            echo "</table>";
        }
        ?>
    </main>
</body>

</html>