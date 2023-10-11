<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección Aleatoria de Alumnos</title>
</head>

<body>
    <header>
        <h1>Selección Aleatoria de Alumnos</h1>
    </header>
    <main>
        <form method="post">
            <button type="submit" name="seleccionar">Seleccionar Alumno</button>
        </form>

        <div id="alumno-info">
            <?php
            $alumnos = [
                ['nombre' => 'Alumno 1'],
                ['nombre' => 'Alumno 2'],
                ['nombre' => 'Alumno 3'],
            ];

            if (isset($_POST['seleccionar'])) {
                // Seleccionar un alumno aleatorio
                $alumnoSeleccionado = $alumnos[array_rand($alumnos)];

                // Mostrar el nombre en la interfaz de usuario
                echo '<h2>' . $alumnoSeleccionado['nombre'] . '</h2>';
            }
            ?>
        </div>
    </main>
</body>

</html>
