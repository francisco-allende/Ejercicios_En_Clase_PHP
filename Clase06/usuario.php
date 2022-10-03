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

        public static function Leer()
        {
            $conectionStr = "mysql:host=localhost; dbname=Clase06";
            $pdo = new PDO($conectionStr, 'root', ''); //accedo

            $query = 'SELECT * FROM usuarios';
                
            //Preparo la sentencia y ejecuto. No necesito bind params
            $sentencia = $pdo->prepare($query);
            $sentencia->execute();

            //Cargo lo que me devuelve el SELECT en un array asociativo. CLASS Usuario no me sirvio
            //no me devuelve un asociativo, sino un array de arrays
            $arrayMulti = $sentencia->fetchAll(PDO::FETCH_ASSOC);
            return $arrayMulti; 
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

        public static function buildTableColumns($u)
        {
            $str = "<tr>";
            foreach ($u as $column => $value){
                $str.= "<th style='border: 1px solid black; padding: 5px 10px;
                text-align: center;'> $column </th>";
            }
            $str.="</tr>";

            return $str;
        }

        public static function buildTableRows($u)
        {
            $str="<tr>";
            foreach ($u as $column => $value){
                $str.= "<td style='border: 1px solid black; padding: 5px 10px;
                text-align: center;'> $value </td>";
            }
            $str.="</tr>";
            return $str;
        }

    }
?>