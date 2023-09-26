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
?>