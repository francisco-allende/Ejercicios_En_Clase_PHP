<?php
    /*
    Aplicación No 17 (Auto)
    Realizar una clase llamada “Auto” que posea los siguientes atributos privados:

    _color (String)
    _precio (Double)
    _marca (String).
    _fecha (DateTime)

    Realizar un constructor capaz de poder instanciar objetos pasándole como parámetros:

    i. La marca y el color.
    ii. La marca, color y el precio.
    iii. La marca, color, precio y fecha.
    */
    class Auto
    {
        private $_color;
        private $_precio;
        private $_marca;
        private $_fecha;
    
        #Deberia poder hacer un date en fecha pero no se puede? 
        #No puedo tener mas de un constructor por clase, 
        #por ende, me agarro de los valores por default por si no los recibe
        public function __construct($marca, $color, $precio = 0.00, $fecha = "")
        {
            $this->_marca = $marca;
            $this->_color = $color;
            $this->_precio = $precio;
            $this->_fecha = $fecha;
        }

        //Realizar un método de instancia llamado “AgregarImpuestos”, que recibirá un doble por
        //parámetro y que se sumará al precio del objeto.
        public function agregarImpuestos($tax)
        {
            $this->_precio += $tax;
        }

        //Realizar un método de clase llamado “MostrarAuto”, que recibirá un objeto de tipo “Auto”
        //por parámetro y que mostrará todos los atributos de dicho objeto.
        public static function mostrarAuto($auto)
        {
            $str = "Marca: $auto->_marca";
            $str.= "- Color: $auto->_color";
            $str.= "- Precio: $auto->_precio";
            $str.= "- Fecha: $auto->_fecha";

            echo "DATOS DEL AUTO: $str<br>";
        }

        //Crear el método de instancia “Equals” que permita comparar dos objetos de tipo “Auto”. Sólo
        //devolverá TRUE si ambos “Autos” son de la misma marca.
        public function equals($segundoAuto)
        {
            if($this != null && $segundoAuto != null  
                &&  get_class($this) == get_class($segundoAuto) && $this->_marca == $segundoAuto->_marca)
            {
                return true;
            }

            return false;
        }

        /*
        Crear un método de clase, llamado “Add” que permita sumar dos objetos “Auto” (sólo si son
        de la misma marca, y del mismo color, de lo contrario informarlo) y que retorne un Double con
        la suma de los precios o cero si no se pudo realizar la operación.
        Ejemplo: $importeDouble = Auto::Add($autoUno, $autoDos);
        */
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