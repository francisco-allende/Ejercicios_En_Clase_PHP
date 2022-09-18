<?php    
    include_once "./19_Auto.php"; 
    include_once "./20_Garage.php";


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

    //mi array es el atributo autos de garage. 
    $arr = array($miAuto1, $miAuto2, $miAuto3, $miAuto4, $miAuto5);

    //Doy de alta. Creo el archivo si no existe, sino sobreescribo. Le paso el array directo
    Auto::AltaAutos($arr, "autos.csv");

    //Lee el csv de autos y lo imprime en pantalla
    Auto::LeerAuto("autos.csv");

    //Carga los datos del csv a un array y lo retorna
    $listaAutos = Auto::CargarArrayDeDatos("autos.csv");
    foreach($listaAutos as $car)
    {
        echo Auto::mostrarAuto($car)."<br>";
    } 

    $miGarage = new Garage("random namee", 100);
    $miGarage->Add($miAuto1);
    $miGarage->Add($miAuto2);
    $miGarage->Add($miAuto3);
    $miGarage->Add($miAuto4);
    $miGarage->Add($miAuto5);
    
    echo "<h1> 20 </h1>";
    Garage::AltaGarage($miGarage, "garage.csv");
    Garage::LeerGarage();
    Garage::CargarArrayDeDatos("garage.csv");
?>