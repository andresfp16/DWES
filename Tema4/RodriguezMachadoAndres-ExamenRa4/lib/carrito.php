<?php
session_start();
if (isset($_POST["volver"])) {
    header("Location: ../index.php");
} 
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["tramitarPedido"])) {  
    if (isset($_SESSION["carrito"]) && count($_SESSION["carrito"]) > 0) {
        $fechaHoraActual = date('Y-m-d_H-i-s');
        $ticket = '../ticket' . $fechaHoraActual . '.txt';
        $comanda = '../comanda' . $fechaHoraActual . 'pendiente.txt';

        $manejadorArchivoTicket = fopen($ticket, 'w');
        $manejadorArchivoComanda = fopen($comanda, 'w');

        if ($manejadorArchivoTicket !== false && $manejadorArchivoComanda !== false) {
            fwrite($manejadorArchivoTicket, "Nombre\tCantidad\tPrecio\n");
            fwrite($manejadorArchivoComanda, "Nombre\tCantidad\tTamaño\n");

            foreach ($_SESSION["carrito"] as $item) {
                $nombreImagen = str_replace(' ', '_', $item["nombre"]);
                $precio = $item["cantidad"] * $item["precio"];

                $lineaTicket = $item["nombre"] . "\t" . $item["cantidad"] . "\t" . $precio . "\n";
                fwrite($manejadorArchivoTicket, $lineaTicket);

                if ($item["tipo"] === "pizza") {
                    $lineaComanda = $item["nombre"] . "\t" . $item["cantidad"] . "\t" . $item["tamaño"]. "\n";
                    fwrite($manejadorArchivoComanda, $lineaComanda);
                }
            }

            fclose($manejadorArchivoTicket);
            fclose($manejadorArchivoComanda);
            echo 'Pedido tramitado. Se ha creado el archivo ' . $ticket . ' con los datos del carrito y la comanda ' . $comanda;
            include("cerrarSesion.php");
        } else {
            echo 'Error al abrir los archivos para escritura.';
        }
        
    } else {
        echo 'El carrito está vacío.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito</title>
</head>

<body>

    <?php
    if (isset($_SESSION["carrito"]) && count($_SESSION["carrito"]) > 0) {
        echo '<h2>Contenido del Carrito:</h2>';
        echo '<table border="1">';
        echo '<tr><th>Nombre</th><th>Cantidad</th><th>Precio</th></tr>';

        foreach ($_SESSION["carrito"] as $item) {
            $nombreImagen = str_replace(' ', '_', $item["nombre"]);
            $precio = $item["cantidad"] * $item["precio"];

            echo '<tr>';
            echo '<td>' . $item["nombre"] . '</td>';
            echo '<td>' . $item["cantidad"] . '</td>';
            echo '<td>' . $precio . '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo '<p>El carrito está vacío.</p>';
    }
    ?>
    
    <form action="" method="post">
        <input type="submit" name="tramitarPedido" value="Tramitar Pedido">
        <input type="submit" name="volver" value="Volver al inicio">
    </form>

</body>

</html>
