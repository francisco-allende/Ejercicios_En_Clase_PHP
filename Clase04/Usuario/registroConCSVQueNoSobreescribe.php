<?php
    /*
    Aplicación No 23 (Registro JSON)
    Archivo: registro.php
    método:POST
    Recibe los datos del usuario(nombre, clave,mail )por POST ,
    crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un dato
    con la fecha de registro , toma todos los datos y utilizar sus métodos para poder hacer
    el alta, guardando los datos en usuarios.json y subir la imagen al servidor en la carpeta
    Usuario/Fotos/.
    retorna si se pudo agregar o no.
    Cada usuario se agrega en un renglón diferente al anterior.
    Hacer los métodos necesarios en la clase usuario.
    */

    error_reporting (E_ALL ^ E_NOTICE); 
     
    class User
    {
        private $_nombre;
        private $_clave;
        private $_email;
        private $_id;
        private $_fechaRegistro;

        function __construct($nombre = "localhost", $clave, $email)
        {
            $this->_nombre = $nombre;
            $this->_clave = $clave;
            $this->_email = $email;
            $this->_id = rand(0, 10001);
            $this->_fechaRegistro = date('D-M-Y');
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
            $str.= $this->_id. " ";
            $str.= $this->_fechaRegistro. " ";
            return $str;
        }

        static function Alta($user)
        {
            $archivo = fopen('usuarios.csv', 'a'); 
            
            //Si ya existe no sobreescribo
            if(file_exists('usuarios.csv'))
            {
                foreach(User::Leer() as $u)
                {
                    if(trim($u->_email) == trim($user->_email))
                    {
                        return null;
                    }
                }
            }
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
            return $user;
        }
    }

    

    if(isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['email']))
    {
        //User::Vaciar();
        $user = User::Alta(new User($_POST['nombre'], $_POST['clave'], $_POST['email']));
        User::Alta(new User('pipi', 123, 'pepe'));

    }
?>