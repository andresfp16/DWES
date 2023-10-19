<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $letras = $_SESSION['letras'];

    $inputUsuario = array(
        $_POST['letra1'],
        $_POST['letra2'],
        $_POST['letra3'],
        $_POST['letra4']
    );

    if ($inputUsuario === array('A', 'A', 'A', 'A')) {
        echo "<p class='mensaje-completado'>¡Puzle completado!</p>";
    } else {
        echo "<p class='mensaje-error'>¡Inténtalo de nuevo!</p>";
    }
}

$letras = array('A', 'B', 'C', 'D');
shuffle($letras);

$_SESSION['letras'] = $letras;
?>

<form method="post" action="">
    <?php
    $contador = 1;
    foreach ($letras as $letra) : 
         echo "<input type='submit' name='letra$contador' value='$letra' readonly>";
         $contador++;
endforeach; ?>
    <br>
    <br>
    <button type="submit" name="corregir">Corregir Puzle</button>
</form>

<?php
if (isset($_POST['corregir'])) {
    $inputLetras = implode('', $inputUsuario);
    echo '<script>
            document.getElementById("input-letras").value = "' . $inputLetras . '";
          </script>';
}
?>
