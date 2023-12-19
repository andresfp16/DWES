<?php

/**
 * @author Andres
 */

if (!isset($_POST["submit"])) {
    header("Location: index.php");
}
include("../config/config.php");

$grupo = $_POST["grupo"];
/**
 * En esta funcion le paso el array, el grupo y el dia que en este ejercicio los elijo yo manualmente el dia, 
 * ya que el array siempre sera el mismo y el grupo nos lo da el usuario en el archivo anterior.
 * 
 * Y dentro del foreach recorro el array horario. igualo el grupo al grupo que me da el usuario y cuando sean
 * iguales hago otro foreach para entrar en los detalles de cada asignatura y de cada hora para comparar los dias.
 * Cuando ya comprobemos que estamos en la posición requerida guardo en un array asociativo el nombre, el profesor y la hora
 */
function horarioDia($horario, $grupo, $dia)
{
    $modulos = array();

    foreach ($horario as $grupoHorario) {
        if ($grupoHorario['grupo'] === $grupo) {
            foreach ($grupoHorario['horario'] as $asignatura => $detalle) {
                foreach ($detalle['horas'] as $hora) {
                    if ($hora['Dia'] === $dia) {
                        $modulos[] = array(
                            'nombre' => $detalle['nombre'],
                            'profesor' => $detalle['profesor'],
                            'hora' => $hora['Hora']
                        );
                    }
                }
            }
        }
    }

    return $modulos;
}

$modulosLunes = horarioDia($horario, $grupo, "Lunes");
$modulosMartes = horarioDia($horario, $grupo, "Martes");
$modulosMiercoles = horarioDia($horario, $grupo, "Miercoles");
$modulosJueves = horarioDia($horario, $grupo, "Jueves");
$modulosViernes = horarioDia($horario, $grupo, "Viernes");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horario de <?php echo $curso ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <h2>Horario Semanal - <?php echo $grupo; ?></h2>

    <table>
        <tr>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
        </tr>
        <?php
        foreach (range(1, 6) as $hora) {
            echo "<tr>";
            foreach (['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes'] as $dia) {
                echo "<td>";
                $modulo = buscarModulo(${'modulos' . $dia}, $hora);
                if ($modulo) {
                    echo "{$modulo['nombre']}";
                }
                echo "</td>";
            }
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    function buscarModulo($modulosDia, $hora)
    {
        foreach ($modulosDia as $modulo) {
            if ($modulo['hora'] == $hora) {
                return $modulo;
            }
        }
        return null;
    }
    ?>
</body>

</html>