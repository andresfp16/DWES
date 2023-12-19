<?php
session_start();
if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = array();
}
$postres = $_SESSION["productos"]["postres"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["volver"])) {
        header("Location: ../index.php");
    }
    foreach ($postres as $indice => $postre) {
        $nombrePost = 'añadirCarrito' . str_replace(' ', '', $postre["nombre"]);

        if (isset($_POST[$nombrePost])) {
            $cantidad = isset($_POST["cantidad_$indice"]) ? $_POST["cantidad_$indice"] : 0;

            if ($cantidad != 0) {
                $nombrePostre = $postre["nombre"];
                $precio = $postre["precio"];
                if (isset($_SESSION["carrito"])) {
                    $existePostre = false;

                    foreach ($_SESSION["carrito"] as $item) {
                        if ($item["nombre"] === $nombrePostre) {
                            $existePostre = true;
                            break;
                        }
                    }

                    if (!$existePostre) {
                        $itemCarrito = [
                            "nombre" => $nombrePostre,
                            "cantidad" => $cantidad,
                            "precio" => $precio,
                            "tipo" => "postre"
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
    <title>Bebidas</title>
</head>

<body>
    <h1>Bebidas</h1>
    <form action="" method="post">
        <?php
        foreach ($postres as $indice => $postre) {
            echo '<h2>' . $postre["nombre"] . '</h2>';
            echo '<img src="../img/' . $postre["imagen"] . '" alt="' . $postre["nombre"] . '">';
            echo '<p>Precio Individual: ' . $postre["precio"] . '</p>';

            echo '<label for="cantidad">Cantidad:</label>';
            echo '<input type="number" name="cantidad_' . $indice . '" value="0" min="0">';

            echo '<input type="submit" name="añadirCarrito' . str_replace(' ', '', $postre["nombre"]) . '" value="Añadir al Carrito">';

        }
        ?>
        </br>
        <input type="submit" name="volver" value="Volver a Menú">
    </form>
</body>

</html>