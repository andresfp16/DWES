<?php
/**
 * @author Andres
 * 
 * Archivo de subida de documentos
*/
if (!isset($_POST["submit"])) {
    header("Location: index.php");
}
define("DIR_UPLOAD","upload/");
define("MAX_SIZE","200000");
$extensions = array("gif", "jpg", "png", "jpeg");
$formats = array("image/gif","image/jpg","image/png","image/jpeg");
$temp = explode(".", $_FILES["file"]["name"]);
$extensionFile = end($temp);

if ($_FILES["file"]["size"] <= MAX_SIZE && in_array($extensionFile, $extensions) && in_array($_FILES["file"]["type"], $formats)) {
    if ($_FILES["file"]["error"]) {
        echo "Se ha producido el error: ".$_FILES["files"]["error"];
    }else{
        $fileName = uniqid() .".". pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION);
        if (file_exists(DIR_UPLOAD . $fileName)) {
            echo "Este fichero ya existe";
        }else{
            move_uploaded_file($_FILES["file"]["tmp_name"], DIR_UPLOAD . $fileName);
        }
    }
}else{
    echo "Formato incorrecto";
}
echo "</br><a href='index.php'>Volver al inicio</a>";
?>