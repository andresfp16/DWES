<?php

#Ejercicio 1.
// El array horario es un array indexado asociativo, ya que es un array que contiene mas arrays, y esos arrays son asocioativos.
$horario = array(
    array(
        "grupo" => "2º DAW A",
        // Este array es un array asociativo
        "horario" => array(
            // Este array es un array asociativo
            "DWES" => array(
                "nombre" => "Desarrollo web en entorno servidor",
                "profesor" => "José Aguilera",
                // Este array es un array indexado
                "horas" => array(
                    // Este array es un array asociativo
                    array("Dia" => "Lunes", "Hora" => "1"),
                    array("Dia" => "Lunes", "Hora" => "2"),
                    array("Dia" => "Martes", "Hora" => "1"),
                    array("Dia" => "Martes", "Hora" => "2"),
                    array("Dia" => "Miercoles", "Hora" => "1"),
                    array("Dia" => "Miercoles", "Hora" => "2"),
                    array("Dia" => "Jueves", "Hora" => "1"),
                    array("Dia" => "Jueves", "Hora" => "2"),
                    array("Dia" => "Viernes", "Hora" => "1"),
                    array("Dia" => "Viernes", "Hora" => "2"),
                )
            ),
            "DWC" => array(
                "nombre" => "Desarrollo Web en entorno cliente",
                "profesor" => "José Aguilera",
                "horas" => array(
                    array("Dia" => "Lunes", "Hora" => "3"),
                    array("Dia" => "Lunes", "Hora" => "4"),
                    array("Dia" => "Martes", "Hora" => "3"),
                    array("Dia" => "Martes", "Hora" => "4"),
                    array("Dia" => "Miercoles", "Hora" => "3"),
                    array("Dia" => "Miercoles", "Hora" => "4"),
                    array("Dia" => "Jueves", "Hora" => "3"),
                    array("Dia" => "Jueves", "Hora" => "4"),
                    array("Dia" => "Viernes", "Hora" => "3"),
                    array("Dia" => "Viernes", "Hora" => "4"),
                )
            ),
            "HLC" => array(
                "nombre" => "Hora de libre configuración",
                "profesor" => "Andrés Rodríguez",
                "horas" => array(
                    array("Dia" => "Lunes", "Hora" => "5"),
                    array("Dia" => "Lunes", "Hora" => "6"),
                    array("Dia" => "Martes", "Hora" => "5"),
                    array("Dia" => "Martes", "Hora" => "6"),
                    array("Dia" => "Miercoles", "Hora" => "5"),
                    array("Dia" => "Miercoles", "Hora" => "6"),
                    array("Dia" => "Jueves", "Hora" => "5"),
                    array("Dia" => "Jueves", "Hora" => "6"),
                    array("Dia" => "Viernes", "Hora" => "5"),
                    array("Dia" => "Viernes", "Hora" => "6"),
                )
            )
        )
    ),
    array(
        "grupo" => "1º DAW A",
        // Este array es un array asociativo
        "horario" => array(
            // Este array es un array asociativo
            "Programacion" => array(
                "nombre" => "Desarrollo web en entorno servidor",
                "profesor" => "José Aguilera",
                // Este array es un array indexado
                "horas" => array(
                    // Este array es un array asociativo
                    array("Dia" => "Lunes", "Hora" => "1"),
                    array("Dia" => "Lunes", "Hora" => "2"),
                    array("Dia" => "Martes", "Hora" => "1"),
                    array("Dia" => "Martes", "Hora" => "2"),
                    array("Dia" => "Miercoles", "Hora" => "1"),
                    array("Dia" => "Miercoles", "Hora" => "2"),
                    array("Dia" => "Jueves", "Hora" => "1"),
                    array("Dia" => "Jueves", "Hora" => "2"),
                    array("Dia" => "Viernes", "Hora" => "1"),
                    array("Dia" => "Viernes", "Hora" => "2"),
                )
            ),
            "Sistemas" => array(
                "nombre" => "Desarrollo Web en entorno cliente",
                "profesor" => "José Aguilera",
                "horas" => array(
                    array("Dia" => "Lunes", "Hora" => "3"),
                    array("Dia" => "Lunes", "Hora" => "4"),
                    array("Dia" => "Martes", "Hora" => "3"),
                    array("Dia" => "Martes", "Hora" => "4"),
                    array("Dia" => "Miercoles", "Hora" => "3"),
                    array("Dia" => "Miercoles", "Hora" => "4"),
                    array("Dia" => "Jueves", "Hora" => "3"),
                    array("Dia" => "Jueves", "Hora" => "4"),
                    array("Dia" => "Viernes", "Hora" => "3"),
                    array("Dia" => "Viernes", "Hora" => "4"),
                )
            ),
            "FOL" => array(
                "nombre" => "Diseño de aplicaciones web",
                "profesor" => "José Aguilera",
                "horas" => array(
                    array("Dia" => "Lunes", "Hora" => "5"),
                    array("Dia" => "Lunes", "Hora" => "6"),
                    array("Dia" => "Martes", "Hora" => "5"),
                    array("Dia" => "Martes", "Hora" => "6"),
                    array("Dia" => "Miercoles", "Hora" => "5"),
                    array("Dia" => "Miercoles", "Hora" => "6"),
                    array("Dia" => "Jueves", "Hora" => "5"),
                    array("Dia" => "Jueves", "Hora" => "6"),
                    array("Dia" => "Viernes", "Hora" => "5"),
                    array("Dia" => "Viernes", "Hora" => "6"),
                )
            )
        )
    )

);

#Ejercicio 2.
#array de idiomas
// Es un array indexado, que contiene idiomas
$idiomas = array("Español", "Inglés", "Francés", "Aleman", "Italiano", "Portugués");

#array con el cuestionario.
// Es un array indexado que contiene arrays asociativos.
$tests = array(
    array(
        "pregunta" => "The room where secretaries work is called an .....",
        "Tipo" => "text",
        "Respuesta" => array("office"),
        "Acierto" => 1,
        "Fallo" => 0
    ),
    array(
        "pregunta" => "To go to the top of the building you can take the .....",
        "Tipo" => "text",
        "Respuesta" => array("lift", "elevator"),
        "Acierto" => 1,
        "Fallo" => 0
    ),
    array(
        "pregunta" => "I ..... tennis every Sunday morning.",
        "Tipo" => "Multiple-choice",
        "Opciones" => array("playing", "play", "am playing", "am play"),
        "Respuesta" => "play",
        "Acierto" => 1,
        "Fallo" => -0.25
    ),
    array(
        "pregunta" => "Don't make so much noise. Noriko ..... to study for her ESL test!",
        "Tipo" => "Multiple-choice",
        "Opciones" => array("try", "tries", "tried", "is trying"),
        "Respuesta" => "is trying",
        "Acierto" => 1,
        "Fallo" => -0.25
    ),
    array(
        "pregunta" => "Jun-Sik ..... his teeth before breakfast every morning.",
        "Tipo" => "Multiple-choice",
        "Opciones" => array("will cleaned", "is cleaning", "cleans", "clean"),
        "Respuesta" => "cleans",
        "Acierto" => 1,
        "Fallo" => -0.25
    ),
    array(
        "pregunta" => "Sorry, she can't come to the phone. She ..... a bath!",
        "Tipo" => "Multiple-choice",
        "Opciones" => array("is having", "having", "have", "has"),
        "Respuesta" => "is having",
        "Acierto" => 1,
        "Fallo" => -0.25
    ),
    array(
        "pregunta" => "	..... many times every winter in Frankfurt.",
        "Tipo" => "Multiple-choice",
        "Opciones" => array("It snows", "snowed", "It is snowing", "It is snow"),
        "Respuesta" => "It snows",
        "Acierto" => 1,
        "Fallo" => -0.25
    )
);
