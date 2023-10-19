<?php
// echo $_POST['Nombre'];
// echo $_POST['Apellidos'];
// echo $_POST['Email'];
// echo $_POST['Telefono'];
if (!isset($_POST['submit'])) {
    echo 'Acceso no autolizado';
}else {
    var_dump($_POST);
}
