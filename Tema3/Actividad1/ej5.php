<?php

/**
 * @author Andres
 *
 * Script que muestre una lista de enlaces en función del perfil de usuario:
 * Perfil Administrador: Pagina1, Pagina2, Pagina3, Pagina4
 * Perfil Usuario: Pagina1, Pagina2
 */

$perfilUsuario = 'usuario';

$perfilAdmin = array('Pagina1', 'Pagina2', 'Pagina3', 'Pagina4');
$perfilUser = array('Pagina1', 'Pagina2');

if ($perfilUsuario == "administrador") {
    foreach ($perfilAdmin as $pagina) {
        echo $pagina . "</br>";
    };
} elseif ($perfilUsuario == "usuario") {
    foreach ($perfilUser as $pagina) {
        echo $pagina . "</br>";
    };
} else {
    echo "ERROR";
}
