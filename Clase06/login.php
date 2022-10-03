<?php
    /*
    Aplicación No 29( Login con bd)
    Archivo: Login.php
    método:POST
    Recibe los datos del usuario(clave,mail )por POST ,
    crear un objeto y utilizar sus métodos para poder verificar si es un usuario registrado en la
    base de datos,
    Retorna un :
    “Verificado” si el usuario existe y coincide la clave también.
    “Error en los datos” si esta mal la clave.
    “Usuario no registrado si no coincide el mail“
    Hacer los métodos necesarios en la clase usuario.
    */
    error_reporting (E_ALL ^ E_NOTICE); 
    require_once "./usuario.php";

    if(isset($_POST['mail']) && isset($_POST['clave']))
    {
        //$login = new LoginUser($_POST['mail'], $_POST['clave']);
        //echo LoginUser::Login($login);
        echo LoginUser::Login($_POST['mail'], $_POST['clave']);

    }

    class LoginUser
    {
        public $_mail;
        public $_clave;

        public function __contruct($mail, $clave)
        {
            $this->_mail = $mail;
            $this->_clave = $clave;
        }

        //Por algun motivo no me carga el objeto pero asi si sirve
        //IMPORTANTISIMO como acceder a los valores key value
        public static function Login($uMail, $uClave)
        {
            $listado = Usuario::Leer(); //retorna array asociativo con array que deberian ser usuarios

            for($i = 0; $i <= count($listado)-1; $i++)
            {
                if(trim($listado[$i]['mail']) == trim($uMail))
                {
                    if(trim($listado[$i]['clave']) == trim($uClave))
                    {
                        return "Verificado";
                    }

                    return "Error en los datos, clave incorrecta";
                }
            }

            return "Usuario no registrado. No se encontro ningun usuario con el mail indicado";
        }
    }


?>