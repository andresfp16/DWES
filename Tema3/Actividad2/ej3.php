<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablas Multiplicar</title>
    <style>
        table {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        td {
            border: 3px solid black;
            padding: 10px;
        }
        tr:nth-child(1){
            background-color: red;
        }
        td:nth-child(1){
            background-color: red;
        }
    </style>
</head>

<body>
    <main>
        <table>
            <?php
            echo '<tr>';
            for ($i = 1; $i <= 10; $i++) {
                
                for ($x = 1; $x <= 10; $x++) {
                    echo '<td>';
                    printf("%03d", $i * $x);
                    echo '</td>';
                }
                echo '</tr>';
            }
            ?>
        </table>
    </main>
</body>

</html>
