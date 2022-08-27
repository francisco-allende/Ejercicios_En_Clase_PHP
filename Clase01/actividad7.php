<?php

    /*
    Aplicación No 7 (Mostrar impares)
    Generar una aplicación que permita cargar los primeros 10 números impares en un Array.
    Luego imprimir (utilizando la estructura for) cada uno en una línea distinta (recordar que el 
    salto de línea en HTML es la etiqueta <br/>). Repetir la impresión de los números utilizando
    las estructuras while y foreach.
    */
    $counter = 0;
    $arr = array();

    while(true)
    {
        if(!($counter % 2 == 0))
        {
            array_push($arr, $counter);
        }
        $counter++;
        if(count($arr) == 10)
        {
            break;
        }
    }

    foreach($arr as $value)
    {
        echo "$value <br>";
    }
    
    echo"<br>";

    $counter = count($arr) -1; #sizeof es una alias de count. es lo mismo
    while($counter >= 0)
    {
        echo "$arr[$counter] <br>";
        $counter--;
    }    
?>