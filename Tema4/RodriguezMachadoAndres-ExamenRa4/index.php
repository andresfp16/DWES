<?php
session_start();
include("config/config.php");

if (!isset($_SESSION["productos"])) {
    $_SESSION["productos"] = $productos;
}

if (isset($_POST["pizzas"])) {
    include("lib/pizzas.php");
} elseif (isset($_POST["bebidas"])) {
    include("lib/bebidas.php");
} elseif (isset($_POST["postres"])) {
    include("lib/postres.php");
} elseif (isset($_POST["carrito"])) {
    include("lib/carrito.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria FaMia</title>
</head>
<body>
    <h1>FaMia</h1>
    <form method="post" action="lib/pizzas.php">
        <input type="submit" name="pizzas" value="Pizzas">
    </form>
    
    <form method="post" action="lib/bebidas.php">
        <input type="submit" name="bebidas" value="Bebidas">
    </form>
    
    <form method="post" action="lib/postres.php">
        <input type="submit" name="postres" value="Postres">
    </form>
    
    <form method="post" action="lib/carrito.php">
        <input type="submit" name="carrito" value="Carrito">
    </form>
    <form method="post" action="lib/comandas.php">
        <input type="submit" name="comandas" value="Comandas">
    </form>
</body>
</html>
