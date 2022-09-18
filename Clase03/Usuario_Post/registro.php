<?php
    /*
    Aplicación No 20 (Registro CSV)
    Archivo: registro.php
    método:POST
    Recibe los datos del usuario(nombre, clave,mail )por POST ,
    crear un objeto y utilizar sus métodos para poder hacer el alta,
    guardando los datos en usuarios.csv.
    retorna si se pudo agregar o no.
    Cada usuario se agrega en un renglón diferente al anterior.
    Hacer los métodos necesarios en la clase usuario
    */

    //Esto pisa el servidor en runtime y le dice que no me muestre el notice:undefined index

use function PHPSTORM_META\type;

    error_reporting (E_ALL ^ E_NOTICE); 
    class User
    {
        private $_nombre;
        private $_clave;
        private $_email;

        function __construct($nombre = "localhost", $clave, $email)
        {
            $this->_nombre = $nombre;
            $this->_clave = $clave;
            $this->_email = $email;
        }

        static function Leer()
        {
            $arr = array();
            $archivo = fopen('usuarios.csv', 'r');
            if($archivo != null || $archivo != false)
            {
                while(!feof($archivo))
                {
                    $str = fgets($archivo);
                    if(!empty($str)) 
                    {
                        $row = explode(",", $str); 
                        array_push($arr, new User($row[0], $row[1], $row[2], $row[3]));
                    }
                } 
            }
            fclose($archivo);
            return $arr;
        }

        public function Mostrar()
        {
            $str = $this->_nombre." ";
            $str.= $this->_clave." ";
            $str.= $this->_email. " ";
            return $str;
        }

        static function Alta($user)
        {
            if(file_exists('usuarios.csv') && filesize('usuarios.csv') > 0)
            {
                $archivo = fopen('usuarios.csv', 'a');  
            }
            else
            {
                $archivo = fopen('usuarios.csv', 'a');     
            }
            //$array = json_decode(json_encode($user), true); me retorna un array vacio
            $userArr = (array) $user;
            if(fputcsv($archivo, $userArr) != false)
            {
                echo PHP_EOL."Alta de usuario exitosa!".PHP_EOL;
            }
            else
            {
                echo PHP_EOL."Error. No se pudo realizar el alta de usuario".PHP_EOL;
            }
            
            fclose($archivo);
        }

        //Los problemas del login es que el del post tenia un spaces adicional y tenia 24 y 25 letras
        //trim elimina los spaces que un email nunca deben existir. strcmp es buena para esto
        public static function Login($user)
        {
            $listado = User::Leer();

            for($i = 0; $i <= count($listado)-1; $i++)
            {
                if(trim($listado[$i]->_email) == trim($user->_email))
                {
                    if(trim($listado[$i]->_clave) == trim($user->_clave))
                    {
                        return "Verificado";
                    }

                    return "Error en los datos";
                }
            }

            return "Usuario no registrado";
        }
    }

    #Valido con isset que no sea null
    if(isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['email']))
    {
        $user = new User($_POST['nombre'], $_POST['clave'], $_POST['email']);
        $user2 = new User("pepe", 123, "pepin@gmail");
        $user3 = new User("pepa", 456, "pepina@gmail");
        //echo $user->Mostrar();
        //User::Alta($user);
        //User::Alta($user2);
        //User::Alta($user3);
    }
?>