<?php
    /*
    Aplicación No 19 (Auto)
    Crear un método de clase para poder hacer el alta de un Auto, guardando los datos en un
    archivo autos.csv. 
    Hacer los métodos necesarios en la clase Auto para poder leer el listado desde el archivo
    autos.csv 
    Se deben cargar los datos en un array de autos.
    */
    class Auto
    {
        private $_color;
        private $_precio;
        private $_marca;
        private $_fecha;
    
        public function __construct($marca, $color, $precio = 0.00, $fecha = "")
        {
            $this->_marca = $marca;
            $this->_color = $color;
            $this->_precio = $precio;
            $this->_fecha = $fecha;
        }
/*
        public static function AltaAuto($listaAutos, $rutaArchiva)
        {
            $archivo = fopen($rutaArchiva, "w"); //si no existe, lo crea
            foreach($listaAutos as $auto)
            {
                //Le escribo el auto pasado a string digamos, en C# seria $auto.ToStirng()+"\n"
                $autoToStirng = Auto::mostrarAuto(($auto));
                fwrite($archivo, $autoToStirng.PHP_EOL); //el eol agrega un salto de linea    
            }
            fclose($archivo);
        }
  */      
        public static function AltaAutos($autos)
        {
            if(file_exists('autos.csv'))
            {
                if(filesize('autos.csv') > 0 )
                {
                    $archivo = fopen('autos.csv', 'w');
                }
            }
            else
            {
                $archivo = fopen('autos.csv', 'w');
            }
            
            if(is_array($autos) && $archivo != false)
            {
                foreach($autos as $car)
                { 
                    //fputscsv escribe en el archivo. get objet retorna cada objeto como array
                    fputcsv($archivo, get_object_vars($car));
                }
                fclose($archivo);
            }
            else
            {
                die("Error al abrir archivo"); //exit 
            }
        }

        //Aca uso todas cosas de csv. Para feof me tiraba lios. Deberia usar el implode aca
        //fgets Returns an indexed array containing the fields read on success, or false on failure. 
        //Por eso hago while != false, porque termina de leer, como un feof 
        public static function LeerAuto()
        {
            $archivo = fopen('autos.csv', 'r');
            if($archivo != false)
            {
                echo "<h3>Los datos de los autos son:</h3>"; 
         
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
                echo "<br>Error al leer autos.csv<br>";
            }
        }

        public static function CargarArrayDeDatos($rutaArchivo)
        {
            $arrayRetorno = array();
            $archivo = fopen($rutaArchivo, "r");
            
            while(!feof($archivo))
            {
                $str = fgets($archivo); //retorna un string linea a linea del archivo. Antes retornaba solo uno porque cerraba el archivo de una en vez de iterarlo
                if(!empty($str)) //sino valido esto, me toma la ultima fila vacia del csv y rompe el array push
                {
                    //leo linea por linea. Separo por comas el array. el explode pasa un string a un array, dependiendo el caracter que separe
                    $dataPorLinea = explode(",", $str); 
                    array_push($arrayRetorno, new Auto($dataPorLinea[0], $dataPorLinea[1], $dataPorLinea[2], $dataPorLinea[3]));
                }
            }
            fclose($archivo);

            return $arrayRetorno;
        }

        public function agregarImpuestos($tax)
        {
            $this->_precio += $tax;
        }

        public static function mostrarAuto($auto)
        {
            $str = "$auto->_marca,";
            $str.= "$auto->_color,";
            $str.= "$auto->_precio,";
            $str.= "$auto->_fecha";

            return $str;
        }

        public function equals($segundoAuto)
        {
            if($this != null && $segundoAuto != null  
                &&  get_class($this) == get_class($segundoAuto) && $this->_marca == $segundoAuto->_marca)
            {
                return true;
            }

            return false;
        }

        public static function add($auto1, $auto2)
        {
            if($auto1->equals($auto2) && $auto1->_color == $auto2->_color)
            {
                return $auto1->_precio + $auto2->_precio;
            }
            else
            {
                return 0;
            }
        }
    }
?>