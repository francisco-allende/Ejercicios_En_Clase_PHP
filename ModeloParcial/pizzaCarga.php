<?php
     /*
    (1 pt.) PizzaCarga.php: (por GET)se ingresa Sabor, precio, Tipo (“molde” o “piedra”), cantidad( de unidades). Se
    guardan los datos en en el archivo de texto Pizza.json, tomando un id autoincremental como
    identificador(emulado) .Sí el sabor y tipo ya existen , se actualiza el precio y se suma al stock existente.
    */

    require_once "./pizza.php";

    if(isset($_GET['sabor']) && isset($_GET['tipo']) && isset($_GET['precio']) && isset($_GET['cantidad']))
    {
        $pizza = new Pizza($_GET['sabor'], $_GET['precio'], $_GET['tipo'], $_GET['cantidad']);
        Pizza::Alta($pizza);
    }
    

?>