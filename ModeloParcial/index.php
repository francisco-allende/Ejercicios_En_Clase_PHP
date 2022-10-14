<?php

    switch($_SERVER['REQUEST_METHOD'])
    {
        case "POST":
            switch($_POST['accion'])
            {
                case "consultar": 
                    require_once "./pizza.php";
                    require_once "./pizzaConsultar.php";
                    break;
            }
            break;

        case "GET":
            switch($_GET['accion'])
            {
                case "cargar":
                    require_once "./pizza.php";
                    require_once "./pizzaCarga.php";
                    break;
            }
            break;
    }


?>