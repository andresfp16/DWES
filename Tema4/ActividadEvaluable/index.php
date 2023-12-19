<?php
// Función para limpiar datos del formulario
function text_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function obtenerTareas($archivo = "config/tareas.txt") {
    $tareas = array();
    if (file_exists($archivo)) {
        $lineas = file($archivo, FILE_IGNORE_NEW_LINES);
        foreach ($lineas as $linea) {
            $datos = explode(",", $linea);
            $tarea = array(
                'dia' => intval($datos[0]),
                'mes' => intval($datos[1]),
                'anio' => intval($datos[2]),
                'texto' => $datos[3]
            );
            $tareas[] = $tarea;
        }
    }
    return $tareas;
}


// Iniciar sesión
session_start();
$diasMes;
$mes = "";
$anio = "";
$mostrarMes = false;

// Verificar permisos
if (!isset($_SESSION["permiso"])) {
    $_SESSION["permiso"] = false;
}

// Cerrar sesión
if (isset($_POST["cerrarSesion"])) {
    include("cerrarSesion.php");
}

$permiso = $_SESSION["permiso"];

// Mostrar el calendario
if (isset($_POST["submit"])) {
    $mostrarMes = true;
    $mes = $_POST["mes"];
    $anio = $_POST["anio"];

    if ($mes === "") {
        $mes = intval(date("m"));
    }
    if ($anio === "") {
        $anio = intval(date("Y"));
    }
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

// Definición de días festivos
$festivosNacionales = array(
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

$festivosComunidad = array(
    "28/02",
    "25/05",
    "01/06",
    "18/04",
    "19/04",
    "08/09",
    "24/10"
);

$festivosLocal = array(
    "05/07",
    "18/08"
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

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 5px;
            text-align: center;
        }

        .dia {
            color: #000;
            text-decoration: none;
        }

        .diaActual {
            background-color: #00FF00;
        }

        .festivoNacional {
            background-color: #FF0000;
        }

        .festivoComunidad {
            background-color: #0000FF;
        }

        .festivoLocal {
            background-color: #FFFF00;
        }

        .conTarea {
            font-weight: bold;
        }

        .color {
            width: 20px;
            height: 20px;
        }

        .colores {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .texto {
            margin: 10px;
        }

        .formTarea {
            display: flex;
        }

        .anadirtarea {
            margin: 20px auto;
        }
    </style>
</head>

<body>
    <main>
        <?php if (!$permiso) {
            include("lib/iniciarSesion.php");
        } else { ?>
            <form method="POST" action="">
                Selecciona un mes:
                <input type="text" name="mes" value="<?php echo $mes ?>">
                Selecciona un año:
                <input type="text" name="anio" value="<?php echo $anio ?>">
                <input type="submit" name="submit" value="Mostrar Calendario">
                <input type="submit" name="cerrarSesion" value="Cerrar Sesión">
            </form>
            <div class="colores">
                <p class="texto">Color dia actual
                    <div class="color diaActual"></div>
                </p>
                <p class="texto">Color festivos nacionales
                    <div class="color festivoNacional"></div>
                </p>
                <p class="texto">Color festivos comunidad
                    <div class="color festivoComunidad"></div>
                </p>
                <p class="texto">Color festivos locales
                    <div class="color festivoLocal"></div>
                </p>
            </div>
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

                $todasLasTareas = obtenerTareas();

                for ($dia = 1; $dia <= 31; $dia++) {
                    if ($dia > $diasMes) {
                        echo "<td></td>";
                    } else {
                        $clase = "";
                        if ($dia == intval(date("d")) && $mes == intval(date("m")) && $anio == intval(date("Y"))) {
                            $clase = "diaActual";
                        } elseif (in_array(sprintf("%02d/%02d", $dia, $mes), $festivosNacionales)) {
                            $clase = "festivoNacional";
                        } elseif (in_array(sprintf("%02d/%02d", $dia, $mes), $festivosComunidad)) {
                            $clase = "festivoComunidad";
                        } elseif (in_array(sprintf("%02d/%02d", $dia, $mes), $festivosLocal)) {
                            $clase = "festivoLocal";
                        }

                        $fechaActual = sprintf("%02d/%02d/%04d", $dia, $mes, $anio);
                        $esFechaConTarea = false;
                        foreach ($todasLasTareas as $tarea) {
                            if ($tarea['dia'] == $dia && $tarea['mes'] == $mes && $tarea['anio'] == $anio) {
                                $esFechaConTarea = true;
                                break;
                            }
                        }

                        if ($esFechaConTarea) {
                            echo "<td class='conTarea $clase'>";
                        } else {
                            echo "<td class='$clase'>";
                        }

                        echo "<a href='$fechaActual.php' class='dia'>$dia</a>";
                        echo "</td>";
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
                echo "<form class='formTarea' method='POST'>";
                echo "<input type='submit' class='anadirtarea' name='anadirtarea' formaction='lib/añadirTarea.php' value='Añadir Tarea'>";
                echo "</form>";
            }
        }
        ?>
    </main>
</body>

</html>
