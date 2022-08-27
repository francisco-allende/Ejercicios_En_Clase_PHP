<?php

    /*
    Aplicación No 8 (Carga aleatoria)
    Imprima los valores del vector asociativo siguiente usando la estructura de control foreach:
    $v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';
    */

    $v[1]=90; $v[30]=7; $v['e']=99; $v['hola']= 'mundo';

    //La mejor forma es decirle al for each que es un array asociativo y directo accedo al valor
    foreach($v as $key => $value)
    {
        echo "$value <br>";
    }

    /*
    Gran resumen de lo que quise hacer y como se hace
        I was incorrectly using:
        
        foreach($array as $value)
        {
            $mykey = key($array);
        }

        and experiencing errors (the pointer of the array is already moved to the next item, so instead of getting the key for $value, you will get the key to the next value in the array)

        CORRECT:
        
        foreach($array as $key => $value)
        {
            $mykey = $key;
        }
    */

       
?>