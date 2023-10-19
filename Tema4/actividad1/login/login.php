<?php
/**
 * @author Andres
 */

$name = $password = "";

if (isset($_COOKIE["users"])) {
    $name = $_COOKIE["users"];
    $password = $_COOKIE["passwords"];
}

if (isset($_POST["submit"])) {
    if (isset($_POST["remindMe"])) {
        setcookie("users", $_POST["name"], time() + 3600);
        setcookie("passwords", $_POST["password"], time() + 3600);
        
        $name = $_POST["name"];
        $password = $_POST["password"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>

<body>
    <form method="post" action="">
        <label>Usuario: </label>
        <input type="text" name="name" value="<?php echo $name ?>">
        </br>
        </br>
        <label>Contraseña: </label>
        <input type="text" name="password" value="<?php echo $password ?>">
        </br>
        </br>
        <label>Recordarme: </label>
        <input type="checkbox" name="remindMe" id="remindMe">
        </br>
        </br>
        <input type="submit" name="submit" value="Enviar">
    </form>
</body>

</html>
