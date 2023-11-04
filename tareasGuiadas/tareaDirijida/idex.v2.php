<?php

/**
 * Funcion para limpiar datos de entrada
 * Parametro: cadena procedente de un formulario
 * return: cadena limpia
 */
function text_input($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// Definimos las variables tipo text con valor inicial.
$name = $email = $gender = $comment = $website = "";
//Declarar variables error para las restricciones
$nameErr = $emailErr = "";

// Para el género trabajaremos con un array
$genero = array("Hombre", "Mujer");
//Mensaje de error
$genderErr = "";

// Variables de movilidad
// array de opciones
$vehiculos = array('Bike', 'car', 'motorbike');
// Array de opciones seeccionadas
$VehiculosSeleccionados = array();

//opciones con valor y literal
$opciones = array(
    array("valor" => 1, "literal" => "opcion 1"),
    array("valor" => 2, "literal" => "opcion 2"),
    array("valor" => 3, "literal" => "opcion 3"),
    array("valor" => 4, "literal" => "opcion 4"),
);

$opcionesSeleccionadas;

//Variables de marcas de coches
$cars = array("Mercedes", "BMW", "Porche", "Ford");
// Coche seleccionados

$carsSeleccionados = array();

$lprocesaFormulario = false;
$lerror = false;
//Detectamos el error en la validacion de los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lprocesaFormulario = true;

    //Validacion del nombre
    if (empty($_POST["name"])) {
        $nameErr = "El nombre es obligatorio";
        $lerror = true;
        $lprocesaFormulario = false;
    } else {
        $name = text_input($_POST["name"]);
    }

    //Validacion del email
    if (empty($_POST["email"])) {
        $emailErr = "El email es obligatorio";
        $lerror = true;
        $lprocesaFormulario = false;
    } else {
        $email = text_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email incorrecto";
            $lerror = true;
        }
    }
    //Validad url
    if (isset($_POST["website"])) {
        $website = text_input($_POST["website"]);
    }

    //Validad comentario
    if (isset($_POST["comment"])) {
        $comment = text_input($_POST["comment"]);
    }

    //validar genero
    if (empty($_POST["gender"])) {
        $genderErr = "El genero es obligatorio";
        $lerror = true;
        $lprocesaFormulario = false;
    } else {
        $gender = $_POST["gender"];
    }

    //validar vehiculos
    if (isset($_POST["vehiculos"])) {
        $VehiculosSeleccionados = $_POST["vehiculos"];
    }

    //validar opciones
    if (isset($_POST["opciones"])) {
        $opcionesSeleccionadas = $_POST["opciones"];
    }
    
    //Validar coches
    if (isset($_POST["cars"])) {
        $carsSeleccionados = $_POST["cars"];
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
        <h1>Validacion de formulario. PHP</h1>
        <p><span class="error">* Campos Requeridos...</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            Nombre:<input type="text" name="name" value="<?php echo $name ?>">
            <span class="error">* <?php echo $nameErr ?></span></br></br>
            Email:<input type="text" name="email" value="<?php echo $email ?>">
            <span class="error">* <?php echo $emailErr ?></span></br></br>
            URL:<input type="url" name="website" value="<?php echo $website ?>"></br></br>
            Comentario:</br>
            <textarea name="comment" rows="5" cols="40" value="<?php echo $comment ?>"><?php echo $comment ?></textarea></br></br>
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
            Transporte:</br>
            <?php
            foreach ($vehiculos as $valor) {
                $selected = (in_array($valor, $VehiculosSeleccionados)) ? 'checked' : '';
                echo "<input type=\"checkbox\" name=\"vehiculos[]\" value=\"" . $valor . "\" $selected>" . $valor;
            }
            ?>
            </br></br>
            Selecciona una opción:</br>
            <select name="opciones" id="opciones">
                <?php
                foreach ($opciones as $opcion) {
                    $selected = ($opcion["valor"] == $opcionesSeleccionadas) ? 'selected' : '';
                    echo "<option value=\"{$opcion['valor']}\" $selected>{$opcion['literal']}</option>";
                }
                ?>
            </select>
            </br></br>
            Coches:</br>
            <?php
            foreach ($cars as $valor) {
                $selected = (in_array($valor, $carsSeleccionados)) ? 'checked' : '';
                echo "<input type=\"checkbox\" name=\"cars[]\" value=\"" . $valor . "\" $selected>" . $valor;
            }
            ?>
            </br></br>

            <input type="submit" name="submit" value="Enviar">
        </form>
    <?php 
    }else {
        echo "<h1>Formulario procesado con éxito.</h1>";
        echo "<p>Nombre: $name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>URL: $website</p>";
        echo "<p>Comentario: $comment</p>";
        echo "<p>Género: $gender</p>";
        echo "<p>Transporte: " . implode(", ", $VehiculosSeleccionados) . "</p>";
        echo "<p>Opción seleccionada: $opcionesSeleccionadas</p>";
        echo "<p>Coches seleccionados: " . implode(", ", $carsSeleccionados) . "</p>";
    }
    ?>

</body>

</html>