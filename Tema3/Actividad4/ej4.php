<?php
/**
 *@author Andres
 * Crear una aplicación que almacene información de países: nombre capital y
 * bandera. Diseñar un formulario que permita seleccionar un país y nos muestre el
 * nombre de la capital y la bandera.
 */
$paises = array(
    "espana" => array(
        "nombre" => "España",
        "capital" => "Madrid",
        "colores" => "Rojo y Amarillo"
    ),
    "francia" => array(
        "nombre" => "Francia",
        "capital" => "París",
        "colores" => "Azul, Blanco y Rojo"
    ),
    "italia" => array(
        "nombre" => "Italia",
        "capital" => "Roma",
        "colores" => "Verde, Blanco y Rojo"
    )
);
$mostrarPais = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $paisSeleccionado = $_POST['pais'];
    $mostrarPais = true;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Información de Países</title>
</head>

<body>
    <h1>Información de Países</h1>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="pais">Selecciona un país:</label>
        <select name="pais" id="pais">
            <?php
            foreach ($paises as $codigo => $info) {
                echo "<option value=\"$codigo\">{$info['nombre']}</option>";
            }
            ?>
        </select>
        <input type="submit" value="Mostrar Información">
    </form>
    <?php
    if ($mostrarPais) {
        if (isset($paises[$paisSeleccionado])) {
            $infoPais = $paises[$paisSeleccionado];
            echo "<h2>{$infoPais['nombre']}</h2>";
            echo "<p>Capital: {$infoPais['capital']}</p>";
            echo "<p>Colores de la Bandera: {$infoPais['colores']}</p>";
        }
    }
    ?>
</body>

</html>