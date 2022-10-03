<?php

error_reporting (E_ALL ^ E_NOTICE); 

    class Usuario
    {
        private $_nombre;
        private $_apellido;
        private $_clave;
        private $_mail;
        private $_localidad;
        private $_fechaRegistro;

        public function __construct($nombre, $apellido, $clave, $mail, $localidad, $fechaRegistro = "")
        {
            $this->_nombre = $nombre;
            $this->_apellido = $apellido;
            $this->_clave = $clave;
            $this->_mail = $mail;
            $this->_localidad = $localidad;
            $this->_fechaRegistro = $fechaRegistro;
        }

        public static function List($u)
        {
            return $u->_nombre;
        }

        public function getNombre()
        {
            return $this->_nombre;
        }
        public function getApellido()
        {
            return $this->_apellido;
        }
        public function getClave()
        {
            return $this->_clave;
        }
        public function getMail()
        {
            return $this->_mail;
        }
        public function getLocalidad()
        {
            return $this->_localidad;
        }
        public function getFechaRegistro()
        {
            return $this->_fechaRegistro;
        }

        public static function print($str)
        {
            echo $str;
        }

    }
?>