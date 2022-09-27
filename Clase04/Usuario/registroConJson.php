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

        //Ahora es con fread y no necesito validar que sea distinto de empty
        static function Leer()
        {
            $arr = array();
            $archivo = fopen('usuarios.json', 'r');

            if($archivo != null || $archivo != false)
            {
                while(!feof($archivo))
                {
                    $str = fread($archivo, filesize('usuarios.json'));
                    $row = explode(" ", $str); //csv separo con comas, aca con espacios
                    array_push($arr, new User($row[0], $row[1], $row[2], $row[3]));
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
            return $str.PHP_EOL;
        }

        static function Alta($user)
        {
            $archivo = fopen('usuarios.json', 'a'); 
            
            //Si ya existe no sobreescribo. Bugeadito
            if(file_exists('usuarios.json'))
            {
                //$arr = User::Leer();
                /*foreach($arr as $u)
                {
                    if(trim($u->_email) == trim($user->_email))
                    {
                        return false;
                    }
                }*/
            }

            if(fwrite($archivo, $user->Mostrar()) != false)
            {
                echo PHP_EOL."Alta de usuario exitosa!".PHP_EOL;   
            }
            else
            {
                echo PHP_EOL."Error. No se pudo realizar el alta de usuario".PHP_EOL;
            }
            
            fclose($archivo);
            return true;
        }

        static public function UploadPhoto()
        {
            //foto es la key en postman. Name un atributo de todos los files. error muy util para el debugging
            $destino = "Usuario/Fotos/" . $_FILES["foto"]["name"]; //destino = path + fileName 
            $esImagen = getimagesize($_FILES["foto"]["tmp_name"]); //retorna false si no es imagen. 
            $tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION); //retorna la extension

            //esto es cuando ya lo guardo, por eso va despues de esImagen y tipoArchivo. Deberia validar != false
            move_uploaded_file($_FILES["foto"]["tmp_name"], $destino);
            $exito = true;

            if($esImagen != false)
            {
                if($tipoArchivo != "jpg" && $tipoArchivo != "jpeg" && $tipoArchivo != "gif"
                    && $tipoArchivo != "png") 
                {
                    echo "Solo son permitidas imagenes con extension JPG, JPEG, PNG o GIF.";
                    $exito = false;
                }
            }  
            else
            {
                if($tipoArchivo != "doc" && $tipoArchivo != "txt" && $tipoArchivo != "rar") 
                {
                    echo "Solo son permitidos archivos con extension DOC, TXT o RAR.";
                    $exito = true;
                }
            }       
            
            return $exito;
        }

        public static function BuildHtml($arr)
        {
            if(count($arr) > 0)
            {
                $str = "<ul>";
                foreach($arr as $u)
                {
                    $str.="<li>".$u->_email." ".$u->_nombre."</li>"; 
                }
                $str .="</ul>";
                echo $str;
            }
            else
            {
                echo "No hay usuarios cargados!";
            }
        }
    }

    

    if(isset($_POST['nombre']) && isset($_POST['clave']) && isset($_POST['email']))
    {
        $user = User::Alta(new User($_POST['nombre'], $_POST['clave'], $_POST['email']));
        //User::Alta(new User('pipi', 123, 'pepe'));
        
    }
?>