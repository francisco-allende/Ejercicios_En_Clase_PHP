<?php
    /*accion va por param en el GET. Accion listar = entidad. 
    Esto es como funciona el postman a bajo nivel, gracias a postman me desentiendo de esto
    es un ejemplo de peticion de usuario   
    Ejemplo 
    http: //http://localhost/Clase06/index.php?listado=usuarios;
    */

    echo "testeo que funque el index";

    switch($_SERVER['REQUEST_METHOD'])
    {
        case "POST":
            switch($_POST['accion'])
            {
                //para cambiar esto, voy al postman o me hago otra peticion igual que solo cambie la accion, tambien desde index.
                case "registro": 
                    require_once "./usuario.php";
                    require_once "./registro.php";
                    break;
            }
            break;

        case "GET":
            switch($_GET['accion'])
            {
                case "listar":
                    require_once "./usuario.php";
                    require_once "./listar.php";
                    echo "".PHP_EOL."entre a listar";
                    break;
            }
            break;
    }


?>