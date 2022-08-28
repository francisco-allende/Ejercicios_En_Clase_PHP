<?php

    /*
    Aplicación No 9 (Arrays asociativos)
    Realizar las líneas de código necesarias para generar un Array asociativo $lapicera, que
    contenga como elementos: ‘color’, ‘marca’, ‘trazo’ y ‘precio’. Crear, cargar y mostrar tres
    lapiceras.
    */

    $lapicera = array(  "Color1"=>"azul", "Color2"=> "verde", "Color3"=> "rojo", 
                        "Marca1"=> "bic", "Marca2"=>"simball", "Marca3"=> "bic", 
                        "Trazo1" => "fino", "Trazo2" => "grueso", "Trazo3" =>"fino", 
                        "Precio1" => 100,  "Precio2"=> 120,  "Precio3" => 99.99);

    echo "Lapicera color ", $lapicera["Color1"]," - Marca: ", $lapicera["Marca1"], "- Trazo: "
        , $lapicera["Trazo1"],"- Precio: $", $lapicera["Precio1"], "<br><br>",
        
        "Lapicera color ", $lapicera["Color2"]," - Marca: ", $lapicera["Marca2"], "- Trazo: "
        , $lapicera["Trazo2"],"- Precio: $", $lapicera["Precio2"], "<br><br>",
        
        "Lapicera color ", $lapicera["Color3"]," - Marca: ", $lapicera["Marca3"], "- Trazo: "
        , $lapicera["Trazo3"],"- Precio: $", $lapicera["Precio3"], "<br><br>";       
?>