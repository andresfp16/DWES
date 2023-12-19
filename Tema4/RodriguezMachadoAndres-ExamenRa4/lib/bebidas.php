<?php
session_start();
if (!isset($_SESSION["carrito"])) {
    $_SESSION["carrito"] = array();
}     
$bebidas = $_SESSION["productos"]["bebidas"];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST["volver"])) {
        header("Location: ../index.php");
    }
    foreach ($bebidas as $indice => $bebida) {
        $nombrePost = 'añadirCarrito' . str_replace(' ', '', $bebida["nombre"]);
        
        if (isset($_POST[$nombrePost])) {
            $cantidad = isset($_POST["cantidad_$indice"]) ? $_POST["cantidad_$indice"] : 0;

            if ($cantidad != 0) {
                $nombreBebida = $bebida["nombre"];
                $precio = $bebida["precio"];
                if (isset($_SESSION["carrito"])) {
                    $existeBebida = false;

                    foreach ($_SESSION["carrito"] as $item) {
                        if ($item["nombre"] === $nombreBebida) {
                            $existeBebida = true;
                            break;
                        }
                    }

                    if (!$existeBebida) {
                        $itemCarrito = [
                            "nombre" => $nombreBebida,
                            "cantidad" => $cantidad,
                            "precio" => $precio,
                            "tipo" => "bebida"
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
        foreach ($bebidas as $indice => $bebida) {
            echo '<h2>' . $bebida["nombre"] . '</h2>';
            echo '<img src="../img/' . $bebida["imagen"] . '" alt="' . $bebida["nombre"] . '">';
            echo '<p>Precio Individual: ' . $bebida["precio"] . '</p>';

            echo '<label for="cantidad">Cantidad:</label>';
            echo '<input type="number" name="cantidad_' . $indice . '" value="0" min="0">';

            echo '<input type="submit" name="añadirCarrito' . str_replace(' ', '', $bebida["nombre"]) . '" value="Añadir al Carrito">';

        }
        ?>
        </br>
        <input type="submit" name="volver" value="Volver a Menú">
    </form>
</body>

</html>