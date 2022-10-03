<?php
    /*
    Aplicación No 27 (Registro BD)
    Archivo: registro.php
    método:POST
    Recibe los datos del usuario( nombre,apellido, clave,mail,localidad )por POST ,
    crear un objeto con la fecha de registro y utilizar sus métodos para poder hacer el alta,
    guardando los datos la base de datos
    retorna si se pudo agregar o no.

    En resumen: 
    Cargo en el postman los datos de un usuario y lo envio
    PHP lo recibe, construye el objeto y lo añade a la BBDD de php My Admin (base Clase06, tabla usuarios);
    Hacer un index.php que haga las peticiones. 
    Con switch segun tipo archivos y eso modular tipo de peticion y q es. Estructura modular
    */

    error_reporting (E_ALL ^ E_NOTICE); 
    require_once "./usuario.php";

    if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['clave']) && isset($_POST['mail']) && isset($_POST['localidad']) && isset($_POST['fechaRegistro']))
    {
        $user = new Usuario($_POST['nombre'], $_POST['apellido'], $_POST['clave'], $_POST['mail'], $_POST['localidad'], $_POST['fechaRegistro']);
        Alta($user);
    }

    function alta($user)
    {
        try
        {
            //Me conecto a la base
            $conectionStr = "mysql:host=localhost; dbname=Clase06";
            $pdo = new PDO($conectionStr, 'root', ''); //esto para poder acceder, mi user y pas
                
            //Pre-prearo la sentencia
            $sentencia = $pdo->prepare('INSERT INTO usuarios(nombre, apellido, clave, mail, localidad, fechaRegistro) 
            VALUES (:nombre, :apellido, :clave, :mail, :localidad, :fechaRegistro)');

            //cargo los valores por referencia
            $sentencia->bindParam(':nombre',  $user->getNombre());
            $sentencia->bindParam(':apellido', $user->getApellido());
            $sentencia->bindParam(':clave', $user->getClave(), PDO::PARAM_STR);
            $sentencia->bindParam(':mail', $user->getMail());
            $sentencia->bindParam(':localidad', $user->getLocalidad());
            //no hay tipo date, la base lo hace solo asi que lo paso como string
            $sentencia->bindParam(':fechaRegistro', $user->getFechaRegistro(), PDO::PARAM_STR);

            //ejecuto
            $sentencia->execute();

            $pdo = null;
        }
        catch(PDOException $ex)
        {
            echo "Error ".$ex.PHP_EOL;
        }
    }
      
?>