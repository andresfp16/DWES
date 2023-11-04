<?php

/**
 * 3. Formulario para crear un currículum que incluya: Campos de texto, grupo de
 * botones de opción, casilla de verificación, lista de selección única, lista de
 * selección múltiple, botón de validación, botón de imagen, botón de reset, etc.
 */
function text_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$name = $surnames = $gender = $experiencia = "";
$nameErr = $surnamesErr = $experienciaErr = "";

$genero = array("Hombre", "Mujer");
$genderErr = "";

$experienciaArray = array('No', '- 1 año', '+ 1 año');

$opciones = array(
    array("valor" => 1, "literal" => "ESO"),
    array("valor" => 2, "literal" => "Bachiller"),
    array("valor" => 3, "literal" => "Licenciatura"),
    array("valor" => 4, "literal" => "Maestría"),
    array("valor" => 5, "literal" => "Doctorado"),
);
$opcionesSeleccionadas;

$lprocesaFormulario = false;
$lerror = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lprocesaFormulario = true;

    if (isset($_POST["reset"])) {
        $name = $surnames = $gender = $experiencia = "";
        $nameErr = $surnamesErr = $experienciaErr = "";
        $opcionesSeleccionadas;
        $lprocesaFormulario = false;
        $lerror = false;
    } else {
        if (empty($_POST["name"])) {
            $nameErr = "El nombre es obligatorio";
            $lerror = true;
            $lprocesaFormulario = false;
        } else {
            $name = text_input($_POST["name"]);
        }

        if (empty($_POST["surnames"])) {
            $surnamesErr = "El apellido es obligatorio";
            $lerror = true;
            $lprocesaFormulario = false;
        } else {
            $surnames = text_input($_POST["surnames"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "El genero es obligatorio";
            $lerror = true;
            $lprocesaFormulario = false;
        } else {
            $gender = $_POST["gender"];
        }

        if (empty($_POST["experiencia"])) {
            $experienciaErr = "La experiencia es obligatoria";
            $lerror = true;
            $lprocesaFormulario = false;
        } else {
            $experiencia = $_POST["experiencia"];
        }

        if (isset($_POST["opciones"])) {
            $opcionesSeleccionadas = $_POST["opciones"];
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error {
            color: red;
        }
    </style>
</head>

<body>
    <?php
    if (!$lprocesaFormulario) { ?>
        <h1>Curriculum</h1>
        <p><span class="error">* Campos Requeridos...</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Nombre:<input type="text" name="name" value="<?php echo $name ?>">
            <span class="error">* <?php echo $nameErr ?></span></br></br>
            Apellidos:<input type="text" name="surnames" value="<?php echo $surnames ?>">
            <span class="error">* <?php echo $surnamesErr ?></span></br></br>
            ¿Tiene experiencia laboral?</br>
            <?php
            foreach ($experienciaArray as $clave => $valor) {
                $check = "";
                if ($experiencia == $valor) {
                    $check = "checked";
                }
                echo "<input type=\"radio\" name=\"experiencia\" value= \"$valor\" $check>$valor";
            }
            echo "<span class=\"error\"> * $experienciaErr</span>";
            ?> </br><br>
            Género:
            <?php
            foreach ($genero as $clave => $valor) {
                $check = "";
                if ($gender == $valor) {
                    $check = "checked";
                }
                echo "<input type=\"radio\" name=\"gender\" value= \"$valor\" $check>$valor";
            }
            echo "<span class=\"error\"> * $genderErr</span></br></br>";
            ?>
            Estudio más alto:</br>
            <select name="opciones" id="opciones">
                <?php
                foreach ($opciones as $opcion) {
                    $selected = ($opcion["valor"] == $opcionesSeleccionadas) ? 'selected' : '';
                    echo "<option value=\"{$opcion['valor']}\" $selected>{$opcion['literal']}</option>";
                }
                ?>
            </select>
            </br></br>
            Subir foto:
            <input type="file" name="foto" accept="image/*">
            </br><br>
            <input type="submit" name="submit" value="Enviar">
            <input type="submit" name="reset" value="Resetear">
        </form>
    <?php
    } else {
        echo "<h1>Formulario procesado con éxito.</h1>";
        echo "<p>Nombre: $name</p>";
        echo "<p>Apellidos: $surnames</p>";
        echo "<p>Género: $gender</p>";
        echo "<p>Experiencia: $experiencia</p>";
        foreach ($opciones as $opcion) {
            if ($opcion["valor"] == $opcionesSeleccionadas) {
                echo "<p>Estudios : {$opcion['literal']} </p>";
            }
        }
    }
    ?>

</body>

</html>