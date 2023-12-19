<?php
session_start();
if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = array();
}     
$pizzas = $_SESSION["productos"]["pizzas"];
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["volver"])) {
        header("Location: ../index.php");
    }
    foreach ($pizzas as $indice => $pizza) {   
        $nombrePost = 'añadirCarrito' . str_replace(' ', '', $pizza["nombre"]);
        if (isset($_POST[$nombrePost])) {
            $cantidad = isset($_POST["cantidad_$indice"]) ? $_POST["cantidad_$indice"] : 0;

            if ($cantidad != 0) {
                $nombrePizza = $pizza["nombre"];
                $tamano = $_POST["tamaño"];

                if (isset($_SESSION["carrito"])) {
                    $existePizza = false;

                    foreach ($_SESSION["carrito"] as $item) {
                        if ($item["nombre"] === $nombrePizza) {
                            $existePizza = true;
                            break;
                        }
                    }

                    if (!$existePizza) {
                        $itemCarrito = [
                            "nombre" => $nombrePizza,
                            "cantidad" => $cantidad,
                            "tamaño" => $tamano,
                            "precio" => $pizza["precio"][$tamano],
                            "tipo" => "pizza"
                        ];

                        $_SESSION["carrito"][] = $itemCarrito;
                    }
                }
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzas</title>
</head>

<body>
    <h1>Pizzas</h1>
    <form action="" method="post">
        <?php
        foreach ($pizzas as $indice => $pizza) {
            echo '<h2>' . $pizza["nombre"] . '</h2>';
            echo '<img src="../img/' . $pizza["imagen"] . '" alt="' . $pizza["nombre"] . '">';
            echo '<p>Precio Individual: ' . $pizza["precio"]["individual"] . '</p>';
            echo '<p>Precio Media: ' . $pizza["precio"]["media"] . '</p>';
            echo '<p>Precio Familiar: ' . $pizza["precio"]["familiar"] . '</p>';

            echo '<label for="cantidad">Cantidad:</label>';
            echo '<input type="number" name="cantidad_' . $indice . '" value="0" min="0">';

            echo '<label for="tamaño">Tamaño:</label>';
            echo '<select name="tamaño">';
            echo '<option value="individual">Individual</option>';
            echo '<option value="media">Media</option>';
            echo '<option value="familiar">Familiar</option>';
            echo '</select>';

            echo '<input type="submit" name="añadirCarrito' . str_replace(' ', '', $pizza["nombre"]) . '" value="Añadir al Carrito">';
        }
        ?>
        </br>
        <input type="submit" name="volver" value="Volver a Menú">
    </form>
</body>

</html>