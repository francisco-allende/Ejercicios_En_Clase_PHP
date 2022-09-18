<?php
    include_once "./registro.php";
    /*
    Recibe los datos del usuario(clave,mail )por POST ,
    crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado,
    Retorna un :
    “Verificado” si el usuario existe y coincide la clave también.
    “Error en los datos” si esta mal la clave.
    “Usuario no registrado" si no coincide el mail
    Hacer los métodos necesarios en la clase usuario
    */
    
    error_reporting (E_ALL ^ E_NOTICE); 
    

    
    if(isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['email']))
    {
        $user = new User($_POST['nombre'], $_POST['clave'], $_POST['email']);
        echo User::Login($user);
    }

?>