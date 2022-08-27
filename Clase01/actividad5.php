<?php

    /*
    Aplicación No 5 (Números en letras)
    Realizar un programa que en base al valor numérico de una variable $num, pueda mostrarse
    por pantalla, el nombre del número que tenga dentro escrito con palabras, para los números
    entre el 20 y el 60.
    Por ejemplo, si $num = 43 debe mostrarse por pantalla “cuarenta y tres”.
    */

    $num = 22;
    $msj = "";

    if($num >= 20 && $num <= 29)
    {
        $msj = "veinti ";

        if($num % 10 == 0)
        {
            $msj = "veinte";
        }
    }
    else if($num >= 30 && $num <= 39)
    {
        $msj = "treinta y ";
        
        if($num % 10 == 0)
        {
            $msj = "treinta";
        }
    }
    else if($num >= 40 && $num <= 49)
    {
        $msj = "cuarenta y ";

        if($num % 10 == 0)
        {
            $msj = "cuarenta";
        }
    }
    else if($num >= 50 && $num <= 59)
    {
        $msj = "cincueta y ";

        if($num % 10 == 0)
        {
            $msj = "cincuenta";
        }
    }
    else{
        echo "sesenta";
    }

    $num = $num / 10;
    $decena = (int)$num;
    $unidad = $num - $decena;
    $unidad = $unidad * 10;
    $unidad = round($unidad);
    
    switch($unidad)
    {
        case 1:
            $msj .= "uno";
            break;

        case 2:
            $msj .= "dos";
            break;

        case 3:
            $msj .= "tres";
            break;

        case 4:
            $msj .= "cuatro";
            break;

        case 5:
            $msj .= "cinco";
            break;

        case 6:
            $msj .= "seis";
            break;

        case 7:
            $msj .= "siete";
            break;

        case 8:
            $msj .= "ocho";
            break;

        case 9:
            $msj .= "nueve";
            break;
    } 

    echo $msj;
?>