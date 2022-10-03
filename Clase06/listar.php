<?php
    /*
    Aplicación No 28 ( Listado BD)
    Archivo: listado.php
    método:GET
    Recibe qué listado va a retornar(ej:usuarios,productos,ventas)
    cada objeto o clase tendrán los métodos para responder a la petición
    devolviendo un listado <ul> o tabla de html <table>
    */

    error_reporting (E_ALL ^ E_NOTICE); 
    require_once "./usuario.php";

    if(isset($_GET['nombre']) && isset($_GET['apellido']) && isset($_GET['clave']) && isset($_GET['mail'])  &&      isset($_GET['localidad']) && isset($_GET['fechaRegistro']))
    {
        $user = new Usuario($_GET['nombre'], $_GET['apellido'], $_GET['clave'], $_GET['mail'], $_GET['localidad'], $_GET['fechaRegistro']);
        listByType($user);
    }

    function listByType($datos)
    {
        $str = "";
        
        switch(get_class($datos))
        {
            case "Usuario":
                $arr = listar("usuarios");
                userHTML($arr);
                break;

            case "Productos":
                break;

            case "Ventas":
                break;

            default:
                echo "Categoria incorrecta de datos";
                break;            
        }
      
        Usuario::print($str);
    }

    //Retorna un array asociativo con todos los objetos solicitados. SELECT * de SQL
    function listar($table)
    {
        try
        {
            //Me conecto a la base
            $conectionStr = "mysql:host=localhost; dbname=Clase06";
            $pdo = new PDO($conectionStr, 'root', ''); //accedo

            $str = 'SELECT * FROM '.$table.'';
                
            //Preparo la sentencia y ejecuto. No necesito bind params
            $sentencia = $pdo->prepare($str);
            $sentencia->execute();

            //Cargo lo que me devuelve el SELECT en un array asociativo. CLASS Usuario no me sirvio
            //no me devuelve un asociativo, sino un array de arrays
            $arrayMulti = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            $arrAsoc = $arrayMulti[0];

            foreach ($arrAsoc as $item => $value){
                echo "Clave: ".$item." - "."Valor: ".$value."".PHP_EOL;
            }

             //cargo el primer array, que es, lo que quiero en verdad: un asociativo como la gente
             /*
             for($i = 0; count($arrayMulti) - 1; $i++)
             {
                $x = $arrayMulti[$i];
             }
             var_dump($x);
             */
            
            


            $pdo = null;

            if($arrAsoc != null && count($arrAsoc) != 0)
            {
                //No es de tipo Usuario, es de tipo Array. 
                return $arrAsoc;
            }
            
        }
        catch(PDOException $ex)
        {
            echo "Error ".$ex.PHP_EOL;
        }
    }

    //Printeo en HTML cada usuario como array asociativo
    function userHTML($arrUser)
    {
        $str = "";
        
        //itero sobre array asociativo cada par key value
        foreach ($arrUser as $item => $value){
            echo "Clave: ".$item." - "."Valor: ".$value."".PHP_EOL;
        }
    

    }
?>