<?php
    /*En testAuto.php:

    ● Crear dos objetos “Auto” de la misma marca y distinto color.
    ● Crear dos objetos “Auto” de la misma marca, mismo color y distinto precio.
    ● Crear un objeto “Auto” utilizando la sobrecarga restante.
    */
    
    include_once "./17_Auto.php"; //asi vinculo mis phps, muy parecido a html 
    include_once "./18_Garage.php";

    $miAuto1 = new Auto("Fiat", "Rojo", 300000.00, date('d-m-y'));
    $miAuto2 = new Auto("Fiat", "Verde", 280000.99, date('d-m-y'));
    $miAuto3 = new Auto("Ford", "Blanco", 800000.00, date('d-m-y'));
    $miAuto4 = new Auto("Ford", "Blanco", 900000.00, date('d-m-y'));
    $miAuto5 = new Auto("Chevi", "Negro");

    /* Utilizar el método “AgregarImpuesto” en los últimos tres objetos, agregando $ 1500
    al atributo precio.*/
    $miAuto1->agregarImpuestos(1500);
    $miAuto2->agregarImpuestos(1500);
    $miAuto3->agregarImpuestos(1500);

    /* Obtener el importe sumado del primer objeto “Auto” más el segundo y mostrar el
    resultado obtenido.
    */
    $precioSumado = Auto::add($miAuto3, $miAuto4);
    echo "<br> $precioSumado";

    #Comparar el primer “Auto” con el segundo y quinto objeto e informar si son iguales o no
    //si es falso no muestra nada
    $sonIguales = $miAuto1->equals($miAuto2);
    echo "<br> El 1er auto y el 2do "; var_dump($sonIguales);
    $sonIguales = $miAuto1->equals($miAuto5);
    echo "<br> El 1er auto y el 5to "; var_dump($sonIguales); echo "<br><br>";
    
    # Utilizar el método de clase “MostrarAuto” para mostrar cada los objetos impares (1, 3, 5)
    Auto::mostrarAuto($miAuto1);
    Auto::mostrarAuto($miAuto3);
    Auto::mostrarAuto($miAuto5);

    #EJERCICIO 4autoGarage.php
    echo "<br><br><h2>Ejercicio del garage</h2>";

    $garage = new Garage("Parking Flores", 120);
    $garage->Add($miAuto1);
    $garage->Add($miAuto2);

    //Tiene que saltar que ya esta
    $garage->Add($miAuto2);

    //Tiene que saltar que no se encuentra
    $garage->Remove($miAuto5);

    //Tiene que mostrar un unico fiat verde
    $garage->Remove($miAuto1);
    $garage->mostrarGarage();

?>