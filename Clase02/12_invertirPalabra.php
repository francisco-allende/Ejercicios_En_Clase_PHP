<?php
   /*
   Aplicación No 12 (Invertir palabra)
    Realizar el desarrollo de una función que reciba un Array de caracteres y que invierta el orden
    de las letras del Array.
    Ejemplo: Se recibe la palabra “HOLA” y luego queda “ALOH”.
   */

   $palabra = array("H", "O", "L", "A");
   $palabraInvertida = invertirPalabra($palabra);
   echo "$palabraInvertida";

   function invertirPalabra($arr)
   {
        $aux = "";
        for($i = count($arr) -1; $i >= 0; $i--)
        {
            $aux .= $arr[$i];
  
        }

        return $aux;
   }
  

   
?>


