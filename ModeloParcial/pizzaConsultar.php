<?php
     /*
    (1pt.) PizzaConsultar.php: (por POST)Se ingresa Sabor,Tipo, si coincide con algún registro del archivo Pizza.json,
    retornar “Si Hay”. De lo contrario informar si no existe el tipo o el sabor.
    */

    require_once "./pizza.php";

    if(isset($_POST['sabor']) && isset($_POST['tipo']))
    {
        $pizza = new Pizza($_POST['sabor'], 0, $_POST['tipo'], 0);
        echo Pizza::Consultar($_POST['sabor'], $_POST['tipo']);
    }

    


?>