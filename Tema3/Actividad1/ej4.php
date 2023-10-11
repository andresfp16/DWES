<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <main>
        <?php
        /**
         * @author Andres
         * 
         * Modifica la página inicial realizada, incluyendo una imagen de cabecera en función
         * de la estación del año en la que nos encontremos y un color de fondo en función de
         * la hora del día.
         */
        $mes = 11;
        $hora = 2;
        switch ($mes) {
            case 12:
            case 1:
            case 2:
                echo '<img src="img/invierno.png">';
                break;
            case 3:
            case 4:
            case 5:
                echo '<img src="img/primavera.png">';
                break;
            case 6:
            case 7:
            case 8:
                echo '<img src="img/verano.png">';
                break;
            case 9;
            case 10:
            case 11:
                echo '<img src="img/otoño.png">';
                break;
            default:
                echo "Error";
                break;
        }

        if ($hora > 0 && $hora < 12) {
            echo '<style>
                body{
                    background-color: #87CEEB;
                }
            </style>';
        } elseif ($hora > 12 && $hora <= 24) {
            echo '<style>
                body{
                    background-color: #001F3F;
                }
            </style>';
        }else{
            echo "Error Hora erronea";
        }
        ?>
    </main>
</body>

</html>