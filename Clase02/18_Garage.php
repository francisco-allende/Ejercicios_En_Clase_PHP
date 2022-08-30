<?php

    /*
    Aplicación No 18 (Auto - Garage)
    Crear la clase Garage que posea como atributos privados:

    _razonSocial (String)
    _precioPorHora (Double)
    _autos (Autos[], reutilizar la clase Auto del ejercicio anterior)

    Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

    i. La razón social.
    ii. La razón social, y el precio por hora.


    En testGarage.php, crear autos y un garage. Probar el buen funcionamiento de todos los
    métodos.
    */
    include_once "./17_Auto.php";
    
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

        /*
        Realizar un método de instancia llamado “MostrarGarage”, que no recibirá parámetros y
        que mostrará todos los atributos del objeto.
        */
        public function mostrarGarage()
        {
            $str = "Razon social: $this->_razonSocial";
            $str.= "- Precio por hora: $this->_precioPorHora<br>";

            foreach($this->_autos as $car)
            {
                Auto::mostrarAuto($car);
            }

            echo "DATOS DEL GARAGE: $str<br>";
        }

        /*
        Crear el método de instancia “Equals” que permita comparar al objeto de tipo Garaje con un
        objeto de tipo Auto. Sólo devolverá TRUE si el auto está en el garaje.
        */
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

        /*
        Crear el método de instancia “Add” para que permita sumar un objeto “Auto” al “Garage”
        (sólo si el auto no está en el garaje, de lo contrario informarlo).
        */
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

        /*
        Crear el método de instancia “Remove” para que permita quitar un objeto “Auto” del
        “Garage” (sólo si el auto está en el garaje, de lo contrario informarlo).
        El unset borra todo lo que le pasas. Si le paso un array, lo borra todo
        Lo que hay que hacer es usar el search que retorna el indice del x objeto en un array, y pasarle
        Al unset el array en ese indice del search (puedo validar que sea distinto de -1)
        */
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