<?php

    /*
    Aplicación No 10 (Arrays de Arrays)
    Realizar las líneas de código necesarias para generar un Array asociativo y otro indexado que
    contengan como elementos tres Arrays del punto anterior cada uno. Crear, cargar y mostrar los
    Arrays de Arrays.
    */

    $lapicera1 = array(  "color"=>"azul", "verde", "rojo", 
    "marca"=> "bic", "simball", "bic", 
    "trazo" => "fino", "grueso", "fino", 
    "precio" => 100, 120, 99.99);

    $lapicera2 = array(  "color"=>"azul", "verde", "rojo", 
    "marca"=> "bic", "simball", "bic", 
    "trazo" => "fino", "grueso", "fino", 
    "precio" => 100, 120, 99.99);

    $lapicera3 = array(  "color"=>"azul", "verde", "rojo", 
    "marca"=> "bic", "simball", "bic", 
    "trazo" => "fino", "grueso", "fino", 
    "precio" => 100, 120, 99.99);

    $indexed = array($lapicera1, $lapicera2, $lapicera3);
    $associative = array(1 => $lapicera1, 2=> $lapicera2, 3=>$lapicera3);

    foreach($indexed as $value)
    {
        var_dump($value);
        echo "<br><br>";
    }

    foreach($associative as $key => $value)
    {
        var_dump($value);
        echo "<br><br>";
    }    
?>