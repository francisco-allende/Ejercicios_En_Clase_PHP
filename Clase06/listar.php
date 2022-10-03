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
        switch(get_class($datos))
        {
            case "Usuario":
                listar("usuarios");
                break;

            case "Productos":
                listar("productos");
                break;

            case "Ventas":
                listar("ventas");
                break;

            default:
                echo "Categoria incorrecta de datos";
                break;            
        }
    }

    //Retorna un array asociativo con todos los objetos solicitados. SELECT * de SQL
    function listar($table)
    {
        try
        {
            //Me conecto a la base
            $conectionStr = "mysql:host=localhost; dbname=Clase06";
            $pdo = new PDO($conectionStr, 'root', ''); //accedo

            $query = 'SELECT * FROM '.$table.'';
                
            //Preparo la sentencia y ejecuto. No necesito bind params
            $sentencia = $pdo->prepare($query);
            $sentencia->execute();

            //Cargo lo que me devuelve el SELECT en un array asociativo. CLASS Usuario no me sirvio
            //no me devuelve un asociativo, sino un array de arrays
            $arrayMulti = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            //cada indice del array de arrays es un array que representa un objeto de tipo Usuario
            //aunque no me toma el objeto. Por ende, lo itero como array indexado y mando cada parametro a una
            //funcion que printea y arma el html

            $htmlText = "";
            //$htmlText.= "<ul>";
            $htmlText.= "<table style='border: 1px solid black; border-collapse: collapse;'>";
            $htmlText.= Usuario::buildTableColumns($arrayMulti[0]);

            for($i = 0; $i < count($arrayMulti) - 1; $i++)
            {
                //$htmlText.= buildHtmlList($arrayMulti[$i]);
                $htmlText.= Usuario::buildTableRows($arrayMulti[$i]);
            }
            //$htmlText.= "<ul>";
            $htmlText.= "</table>";


            
            echo $htmlText;

            $pdo = null;   
        }
        catch(PDOException $ex)
        {
            echo "Error ".$ex.PHP_EOL;
        }
    }

    //Printeo en HTML cada usuario como array asociativo
    function buildHtmlList($arrUser)
    {
        $str = "";
        //itero sobre array asociativo cada par key value
        foreach ($arrUser as $item => $value){
            $str.= "<li>"."Clave: ".$item." - "."Valor: ".$value."</li>";
        }
        $str.="<br>";

        return $str;
    }
?>