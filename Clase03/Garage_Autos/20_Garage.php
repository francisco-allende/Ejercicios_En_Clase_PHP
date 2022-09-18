<?php

    /*
    Aplicación No 20
        Crear un método de clase para poder hacer el alta de un Garage y, guardando los datos en un
        archivo garages.csv.
        Hacer los métodos necesarios en la clase Garage para poder leer el listado desde el archivo
        garage.csv
        Se deben cargar los datos en un array de garage.
    */
    include_once "./19_Auto.php";
    
    class Garage
    {
        private $_razonSocial;
        private $_precioPorHora;
        public $_autos;

        public function __construct($razonSocial, $precioPorHora = 100)
        {
            $this->_razonSocial = $razonSocial;
            $this->_precioPorHora = $precioPorHora;
            $this->_autos = array(); //instancia el array siempre
        }

        public static function AltaGarage($miGarage, $rutaArchivo)
        {
            if(file_exists($rutaArchivo))
            {
                if(filesize($rutaArchivo) > 0 )
                {
                    $archivo = fopen($rutaArchivo, 'w');
                }
            }
            else
            {
                $archivo = fopen($rutaArchivo, 'w');
            }
            
            if($archivo != false && $miGarage != null)
            {
                fwrite($archivo, $miGarage->_razonSocial.PHP_EOL);
                fwrite($archivo, $miGarage->_precioPorHora.PHP_EOL);

                foreach($miGarage->_autos as $car)
                { 
                    $strCar = Auto::mostrarAuto($car);
                    fwrite($archivo, $strCar.PHP_EOL);
                }
                fclose($archivo);
            }
            else
            {
                die("Error al abrir archivo"); //exit 
            }
        }

        public static function LeerGarage()
        {
            $archivo = fopen('garage.csv', 'r');
            if($archivo != false)
            {
                while(($datos = fgetcsv($archivo))!== false)
                {
                    for($i = 0; $i < count($datos); $i++)
                    {
                        echo $datos[$i]."<br>";
                    }
                }
                
                fclose($archivo);
            }
            else
            {
                echo "<br>Error al leer garage.csv<br>";
            }
        }

        public static function CargarArrayDeDatos($rutaArchivo)
        {
            $arrayRetorno = array();
            $archivo = fopen($rutaArchivo, "r");
            $count = 0;
            while(!feof($archivo))
            {
                $str = fgets($archivo); //retorna un string linea a linea del archivo. Antes retornaba solo uno porque cerraba el archivo de una en vez de iterarlo
                
                if(!empty($str) && $count > 1) //sino valido esto, me toma la ultima fila vacia del csv y rompe el array push
                {
                    //leo linea por linea. Separo por comas el array. el explode pasa un string a un array, dependiendo el caracter que separe
                    $dataPorLinea = explode(",", $str); 
                    array_push($arrayRetorno, new Auto($dataPorLinea[0], $dataPorLinea[1], $dataPorLinea[2], $dataPorLinea[3]));
                }
                else
                {
                    array_push($arrayRetorno, $str);
                    $count++;
                }
            }
            fclose($archivo);

            return $arrayRetorno;
        }

        public function mostrarGarage()
        {
            $str = "";
            foreach($this->_autos as $car)
            {
                $str.= Auto::mostrarAuto($car); 
            }

            return $str;
        }

        public function equals($auto)
        {
            if(count($this->_autos) > 0)
            {
                foreach($this->_autos as $car)
                {
                    if($car == $auto)
                    {
                        return true;
                    }
                }

                return false; 
            }
        
            return false; 
        }

        public function Add($auto)
        {
            if(!$this->equals($auto))
            {
                array_push($this->_autos, $auto);
            }
            else
            {
                echo "<br>No se puede agregar, el auto ya se encuentra en el garage<br>";
            }
        }

        public function Remove($auto)
        {
            if($this->equals($auto))
            {
                $i = array_search($auto, $this->_autos);
                unset($this->_autos[$i]);
            }
            else
            {
                echo "<br>No se puede remover, el auto no se encuentra en el garage<br>";
            }
        }
    }
?>