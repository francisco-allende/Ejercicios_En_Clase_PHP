<?php

    /*
    Aplicación No 2 (Mostrar fecha y estación)
    Obtenga la fecha actual del servidor (función date) y luego imprímala dentro de la página con
    distintos formatos (seleccione los formatos que más le guste). Además indicar que estación del
    año es. Utilizar una estructura selectiva múltiple.
    */

    (int)$month = date('m');
    $fecha = date('d-m-y');

    if($month <= 3)
    {
        echo "<h3> Estamos en verano </h3>";
    }
    else if($month >= 3 &&  $month <= 6)
    {
        echo "<h3> Estamos en otoño </h3>";
    }
    else if($month >= 7 &&  $month <= 9)
    {
        echo "<h3> Estamos en invierno </h3>";
    }
    else if($month >= 10 &&  $month <= 12)
    {
        echo "<h3> Estamos en primavera </h3>";
    }


    echo "<h4>y la fecha es: $fecha</h4>";
?>