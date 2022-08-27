<?php
    /*
    Aplicación No 3 (Obtener el valor del medio)
    Dadas tres variables numéricas de tipo entero $a, $b y $c realizar una aplicación que muestre
    el contenido de aquella variable que contenga el valor que se encuentre en el medio de las tres
    variables. De no existir dicho valor, mostrar un mensaje que indique lo sucedido.
    Ejemplo 1: $a = 6; $b = 9; $c = 8; => se muestra 8.
    Ejemplo 2: $a = 5; $b = 1; $c = 5; => se muestra un mensaje “No hay valor del medio”
    */

    $a = 6;
    $b = 9;
    $c = 8;

    if($a == $b || $a == $c || $b == $c)
    {
        echo "No hay numero del medio";
    }
    else if($a > $b && $a > $c) #a es el mayor
    {
        if($b > $c)
        {
            echo $b;
        }
        else
        {
            echo $c;
        }
    }
    else if($b > $a && $b > $c) #b es el mayor
    {
        if($a > $c)
        {
            echo $a;
        }
        else
        {
            echo $c;
        }
    }
    else #el mayor es c
    {
        if($a > $b)
        {
            echo $a;
        }
        else
        {
            echo $b;
        }
    }
?>