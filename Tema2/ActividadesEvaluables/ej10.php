<?php
$nombre ="Andrés";
$edad = 20;
$correo = "a21romaan@iesgrancapitan.org";

$heredoc= <<<INFO
Nombre = $nombre
</br>
Edad = $edad
</br>
correo = $correo
</br>
INFO;

print $heredoc;

echo "</br><a href=\"https://github.com/andresfp16/DWES/blob/main/Tema2/ActividadesEvaluables/ej10.php\">Enlace Github</a>";

?>