<?php
    /*
    Recibe qué listado va a retornar(ej:usuarios,productos,vehículos,...etc),por ahora solo tenemos
    usuarios).
    En el caso de usuarios carga los datos del archivo usuarios.json.
    se deben cargar los datos en un array de usuarios.
    Retorna los datos que contiene ese array en una lista
    <ul>
    <li>apellido, nombre,foto</li>
    <li>apellido, nombre,foto</li>
    </ul>
    Hacer los métodos necesarios en la clase usuario
    */

    include_once "./registroConJson.php";

 
    
    if(isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['email']))
    {
        $usuarios = User::Leer();
        User::BuildHtml($usuarios);
    }



?>