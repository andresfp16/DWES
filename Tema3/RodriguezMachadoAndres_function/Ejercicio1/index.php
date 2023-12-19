<?php

/**
 * @author Andres
 * 
 * • Crea un array utilizando como base la estructura del fichero de
 * configuración, que contiene el horario de los grupos de las enseñanzas
 * del Departamento de Informática.
 * Completa el horario de al menos dos grupos:
 * Sustituye los comentarios incluidos en el fichero de configuración.
 * Pon tu nombre como profesor de HLC.
 * Los módulos y carga horaria deben ser reales.
 * Estable a tu criterio el día y hora en la que se imparte cada módulo.
 * Crea un script que muestre una lista desplegable con los grupos
 * disponibles y muestre el horario del grupo seleccionado.
 * Utiliza una tabla html con estilos para mostrar el horario. La
 * visualización de las horas de un módulo deben utilizar el mismo
 * estilo.
 * Incluye leyendas para mostrar el nombre de los módulos y los
 * profesores o profesoras que los imparten.
 * Utiliza una función horarioDia que reciba como parámetro de entrada
 * el día de la semana y grupo y retorne un array con los módulos
 * impartidos ese día. 
 */

include("../config/config.php");


$grupos = array();
// En este foreach recorro el array horario para sacar todos los grupos y hacer mas tarde un select.
foreach ($horario as $grupo) {
    $nombreGrupo = $grupo["grupo"];
    if (!in_array($nombreGrupo, $grupos)) {
        $grupos[] = $nombreGrupo;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos</title>
</head>

<body>
    <form action="buscarHorario.php" method="post">
        Elige grupo:
        <select id="opcion" name="grupo">
            <?php
            foreach ($grupos as $clave => $grupo) {
                echo "<option value='$grupo'>$grupo</option>";
            }
            ?>
        </select>
        <input type="submit" value="Buscar Horario" name="submit">
    </form>

</body>

</html>