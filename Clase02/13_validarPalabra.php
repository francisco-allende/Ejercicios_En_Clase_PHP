<?php
   /*
   Aplicación No 13 (Listado palabra)
    Crear una función que reciba como parámetro un string ($palabra) y un entero ($max). La
    función validará que la cantidad de caracteres que tiene $palabra no supere a $max y además
    deberá determinar si ese valor se encuentra dentro del siguiente listado de palabras válidas:
    “Recuperatorio”, “Parcial” y “Programacion”. Los valores de retorno serán:
    1 si la palabra pertenece a algún elemento del listado.
    0 en caso contrario.
   */

   $palabra = "Parcial";
   $limite = 10;

   $result = validarPalabra($palabra, $limite);
   echo "$result";

   function validarPalabra($str, $max)
   {
       if(strlen($str) > $max)
       {
            return "Limite excedido";
       }
       else
       {
            $palabrasValidas = array("Recuperatorio", "Parcial", "Programacion");
            foreach($palabrasValidas as $word)
            {
                if($word == $str)
                {
                    return 1;
                }
            }

            return 0;
       }
   }
  

   
?>

