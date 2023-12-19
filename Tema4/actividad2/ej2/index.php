<?php
session_start();

$puzle = array("A", "B", "C", "D");

// Verificar si ya existe una sesión para el puzle
if (!isset($_SESSION['puzleAletario'])) {
    shuffle($puzle);
    $_SESSION['puzleAletario'] = $puzle;
}

$puzleAletario = $_SESSION['puzleAletario'];

// Procesar el formulario cuando se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['puzleUsuario'])) {
        $seleccionesUsuario = $_POST['puzleUsuario'];

        // Actualizar el array del puzle cambiando cada letra por la siguiente en el array
        foreach ($seleccionesUsuario as $clave => $seleccion) {
            $posicion = array_search($seleccion, $puzle);
            $puzleAletario[$clave] = $puzle[($posicion + 1) % count($puzle)];
        }

        // Guardar el puzle actualizado en la sesión
        $_SESSION['puzleAletario'] = $puzleAletario;
    }

    // Verificar si el puzle es 'AAAA' al hacer clic en el botón "Corregir Puzle"
    if (isset($_POST['corregirPuzle']) && implode("", $puzleAletario) === 'AAAA') {
        echo "<p class='mensaje-completado'>¡Enhorabuena! Puzle resuelto.</p>";
    }else{
        echo "<p class='mensaje-completado'>No es correcto. Intentalo de nuevo.</p>";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Puzle</title>
</head>
<body>
    <form action="" method="post">
    <?php
        foreach ($puzleAletario as $clave => $pieza) {
            echo "<input type='submit' name='puzleUsuario[$clave]' value='$pieza'>";
        }
    ?>
        <br>
        <button type="submit" name="corregirPuzle">Corregir Puzle</button>
    </form>
</body>
</html>
