<?php
   /*
   Aplicación No 1 (Sumar números)
    Confeccionar un programa que sume todos los números enteros desde 1 mientras la suma no
    supere a 1000. Mostrar los números sumados y al finalizar el proceso indicar cuantos números
    se sumaron.
   */

   $acumulador = 0;
   $numeros = 1;
   
   for(; ;)
   {
       $acumulador+=$numeros;
       $numeros++;
       if($acumulador >= 1000)
       {
           break;
       }
       echo "<br> $acumulador";
   }

   echo "<h3> EL total de numeros sumados son $numeros</h3>";
?>


