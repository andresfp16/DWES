<?php

function conectadb()
{
    $dsn = "mysql:host=localhost;dbname=zoologico";
    try {
        $db = new PDO($dsn, "zoologico", "zoologico");
        $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, TRUE);
        $db->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES 'UTF8'");
        return $db;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit;
    }
}
$conexion = conectadb();

if (isset($_POST["insertar"])) {
    $sql = "INSERT INTO animales(nombre) VALUES('".$_POST['nombreAnimal']."')";
    $resultado = $conexion -> query($sql);
}

if (isset($_GET["action"]) && $_GET["action"]== "borrar") {
    $sql = "DELETE FROM animales WHERE id=". $_GET['id'];
    $resultado = $conexion -> query($sql);
}

// Hacer Select

$sql = 'SELECT * FROM animales';
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Esto no es una aplicación</h1>
    <form action="" method="post">
        <label for="nombreAnimal">Nombre Animal</label>
        <input type="text" name="nombreAnimal" id="nombreAnimal">
        <input type="submit" value="Insertar" name="insertar">
    </form>
    <h2>Lista de animales</h2>
    <?php
    foreach ($resultado as $key => $value) {
        echo $value['nombre']."<a href='index.php?action=borrar&id=".$value['id']."'>Borrar</a><a href='index.php?action=editar&id=".$value['id']."'>Editar</a></br>";
    }

    if (isset($_GET["action"]) && $_GET["action"]== "editar") {
        $sqlNombre = "SELECT nombre FROM animales WHERE id = ".$_GET['id'];
        $nombre = $conexion -> query($sql);
        $animal = $nombre->fetch(PDO::FETCH_ASSOC);
        $nombre_del_animal = $animal['nombre'];
        ?>
        
        <form action="" method="post">
        <label for="nuevoNombre">Dime el nuevo nombre de <?php echo $nombre_del_animal?> </label>
        <input type="text" name="nuevoNombre" id="nuevoNombre">
        <input type="submit" value="Editar" name="Editar">
        <?php
            if(isset($_POST["Editar"])){
                $sql = "UPDATE animales
        SET nombre = '" . $_POST["nuevoNombre"] . "'
        WHERE id = ".$_GET['id'];
                $resultado = $conexion -> query($sql);
            }
        ?>
    </form>
    <?php
    }
    ?>
</body>

</html>