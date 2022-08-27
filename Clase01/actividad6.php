<?php

    /*
    Aplicación No 6 (Carga aleatoria)
    Definir un Array de 5 elementos enteros y asignar a cada uno de ellos un número (utilizar la
    función rand). Mediante una estructura condicional, determinar si el promedio de los números
    son mayores, menores o iguales que 6. Mostrar un mensaje por pantalla informando el
    resultado.
    */

    $arr = array(1, 2, 3, 4, 5);
    $len = count($arr);
    for ($i=0; $i <= $len-1; $i++) 
    { 
        $ran = rand(0, 100);
        $arr[$i] = $ran;
        echo "$arr[$i]<br>";
    }
?>