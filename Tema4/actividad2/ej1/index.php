<?php
/**
 * @author Andres
 * 
 * Crear una pequeña aplicación para gestionar una agenda de contactos.
 */
 session_start();
 
 // Inicializar la variable de sesión si aún no está definida
 if (!isset($_SESSION['contactos'])) {
     $_SESSION['contactos'] = array();
 }
 
 if(isset($_POST["submit"])){
     $_SESSION['contactos'][] = array("Nombre" => $_POST["nombre"], "Telefono" => $_POST["numerotlf"]);
 }
 
 if(isset($_POST["cerrarSesion"])){
     session_destroy();
 }
 
 $contactos = $_SESSION['contactos'];
 ?>
 
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Contactos</title>
 </head>
 <body>
     <form action="" method="post">
         <label for="nombre">Nombre del nuevo contacto:</label>
         <input type="text" name="nombre" required></br>
         <label for="numerotlf">Dime el numero de telefono:</label>
         <input type="text" name="numerotlf" required></br>
         <input type="submit" name="submit" value="Añadir">
     </form>
 
     <h2>Contactos</h2>
     <table>
         <tr>
             <th>Nombre</th>
             <th>Telefono</th>
         </tr>
         <?php
         foreach ($contactos as $contacto) {
             echo "<tr>";
             foreach ($contacto as $clave => $valor) {
                 echo "<td>$valor</td>";
             }
             echo "</tr>";
         }
         ?>
     </table>
 
     <form action="" method="post">
         <input type="submit" name="cerrarSesion" value="Cerrar Sesion">
     </form>
 </body>
 </html>
 