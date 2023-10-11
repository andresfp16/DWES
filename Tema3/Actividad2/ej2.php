<?php
 /**
 * @author Andres
 * 
 * 2. Sumar los 3 primeros números pares.
 */
$suma = 0;  
 $num = 2;
for ($i=0; $i!=3;) { 
    if ($num%2==0) {
        $suma += $num;
        $i++;
    }
    $num++;
}
print($suma);


