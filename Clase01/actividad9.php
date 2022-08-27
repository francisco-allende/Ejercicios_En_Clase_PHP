<?php

    /*
    Aplicación No 9 (Arrays asociativos)
    Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
    contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
    lapiceras.
    */

    $lapicera = array(  "color"=>"azul", "verde", "rojo", 
                        "marca"=> "bic", "simball", "bic", 
                        "trazo" => "fino", "grueso", "fino", 
                        "precio" => 100, 120, 99.99);

    foreach($lapicera as $key=>$value)
    {
        echo "$value<br>";
    }

   

       
?>