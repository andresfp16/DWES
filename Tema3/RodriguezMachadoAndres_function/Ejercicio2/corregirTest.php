<?php

/**
 * @author Andres
 * En este archivo simplemente hago el mismo foreach que en el archivo anterior con el mismo if else.
 * y voy comparando la respuesta correcta con la del usuario y voy sumando y restando nota.
 */

if (isset($_POST["Corregir"])) {
    header("Location: index.php");
}

include("../config/config.php");

$nombre = $_POST["nombre"];
if (empty($_POST["idiomas"])) {
    $idiomas = [];
}else{
    $idiomas = $_POST["idiomas"];
}

$aciertos = 0;
$fallos = 0;
$nota = 0;
foreach ($tests as $clave => $test) {
    if ($test["Tipo"] == "text") {
        if ($_POST["$clave-respuesta"] == "" || $_POST["$clave-respuesta"] == null) {
            $respuestaUsuario = "-1";
        } else {
            $respuestaUsuario = $_POST["$clave-respuesta"];
        }
        if (in_array($respuestaUsuario, $test["Respuesta"])) {
            $aciertos++;
            $nota++;
        } else {
            $fallos++;
        }
    } else if ($test["Tipo"] == "Multiple-choice") {
        if (empty($_POST["$clave-respuesta"])) {
            $respuestaUsuario = "-1";
        } else {
            $respuestaUsuario = $_POST["$clave-respuesta"];
        }
        if ($respuestaUsuario == $test["Respuesta"]) {
            $aciertos++;
            $nota++;
        } else {
            $fallos++;
            $nota = $nota - 0.25;
        }
    }
}
echo "Hola $nombre</br>";
if (empty($idiomas)) {
    echo "No dominas ningún idioma";
} else {
    echo "Tus idiomas principales son:";
    foreach ($idiomas as $idioma) {
        echo $idioma . " ";
    }
}
echo "</br>Has tenido $aciertos aciertos y $fallos fallos</br>";
if ($nota < 0) {
    echo "Tu nota es 0 </br>";
}else{
    echo "Tu nota es $nota </br>";
}
