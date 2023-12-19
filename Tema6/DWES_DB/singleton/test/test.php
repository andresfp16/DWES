<?php
include("../app/models/Animales.php");

$datos = array("nombre" => "Morsa", "peso" => 9);

echo "Clases sin instanciar<br>";
$sh_sing1 = Animales::getInstancia();
$datos = $sh_sing1->get(18);
$sh_sing1->set();
$sh_sing1->setID(20);
$sh_sing1->setNombre("mono");
