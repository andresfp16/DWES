<?php
$numInputs = 0;
function crearFormulario()
{
    echo '<form action="" method="post">';
    echo '<label for="numeroInput">Dime un número de inputs: </label>';
    echo '<input type="number" name="numeroInput"></br>';
    echo '<input type="submit" name="submit" value="Enviar">';
    echo '</form>';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <style>
        .numError {
            color: red;
            margin: 0;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (isset($_POST["submit"])) {
            if ($_POST["numeroInput"] > 0) {
                $numInputs = $_POST["numeroInput"];

                echo '<form action="" method="post">';
                echo '<h2>Suma de todos los inputs</h2>';
                for ($i = 0; $i < $numInputs; $i++) {
                    echo '<label for="numerosArray">Dime un número: </label></br>';
                    echo "<input type='number' name='valores[]' id='input_$i' required><br>";
                }
                echo '<input type="submit" name="sumaSubmit" value="Sumar">';
                echo '</form>';
            } else {
                echo "<p class=\"numError\">El valor dado es incorrecto</p>";
                crearFormulario();
            }
        } elseif (isset($_POST['sumaSubmit'])) {
            $valores = $_POST['valores'];
            echo 'La suma de todos los números es = ' . array_sum($valores);
        } else {
            crearFormulario();
        }
    } else {
        crearFormulario();
    }
    ?>
</body>

</html>
