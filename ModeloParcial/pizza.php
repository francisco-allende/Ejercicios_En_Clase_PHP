<?php
  
  class Pizza
  {
        //SI O SI EN PUBLICO PARA PASAR A JSON. En el parcial van publicos
        public $_sabor;
        public $_precio;
        public $_tipo;
        public $_cantidad;
        
        public function __construct($sabor, $precio, $tipo, $cantidad)
        {
            $this->_sabor = $sabor;
            $this->_precio = $precio;
            $this->_tipo = $tipo;
            $this->_cantidad = $cantidad;
        }

        public static function Alta($p)
        {
            $archivo = fopen('Pizza.json', 'a'); 

            //tienen que ser publicos los atributos. Le paso mi array de una pizza que lo pasa a json y retorna este json en formato string
            $pizzaConvertedToJson = json_encode($p);

            //escribo el string en mi json. Al tener fromato correcto, si bien es string, lo escribe bien
            fwrite($archivo, $pizzaConvertedToJson);
            
            fclose($archivo);
        }

        public static function LeerJson()
        {
            //abro el archivo e instancio el array que retornare
            $arch = fopen('Pizza.json', 'a+');
            $arrayDePizzas = array();

            //el fgets me pasa todo a una sola linea de string
            $str =  fgets($arch);
                   
            //el decode paa jsons bien hechos a un object standard class o a un array de tipo standard class
            $myArray = json_decode($str, true); //el true es para que me retorne un array asociativo en vez de indexado
                   
            //retorna un array y lo itero. Instancio una pizza. Accedo a los valores del array asoc con el nombre de los atributos
            //al ser creado desde php, accedo por como estan mis atributos de la clase pizza
            foreach($myArray as $keyAndValue)
            {
                $p = new Pizza($keyAndValue['_sabor'], $keyAndValue['_precio'], $keyAndValue['_tipo'], $keyAndValue['_cantidad']);
                array_push($arrayDePizzas, $p);
            }
            
           fclose($arch);
                       
            return $arrayDePizzas;
        }

        public static function Consultar($sabor, $tipo)
        {
            $listado = Pizza::LeerJson(); 

            for($i = 0; $i <= count($listado)-1; $i++)
            {
                if(trim($listado[$i]->_sabor) == trim($sabor) || trim($listado[$i]->_tipo) == trim($tipo))
                {
                    return "Si hay";
                }
            }

            return "No hay";
        }
  }
?>