<?php
    class Producto
    {
        private $_codigoBarra;
        private $_nombre;
        private $_tipo;
        private $_stock;
        private $_precio;
        private $_id;

        public function __construct($codigoBarra, $nombre, $tipo, $stock, $precio)
        {
            $this->_codigoBarra = $codigoBarra;
            $this->_nombre = $nombre;
            $this->_tipo = $tipo;
            $this->_stock = $stock;
            $this->_precio = $precio;
            $this->_id = rand(0, 10001);
        }

        function ToString()
        {
            $p = "";
            $p.=strval($this->_codigoBarra)." ";
            $p.=strval($this->_nombre)." ";
            $p.=strval($this->_tipo)." ";
            $p.=strval($this->_stock)." ";
            $p.=strval($this->_precio)." ";
            $p.=strval($this->_id)." ";
            $p.=PHP_EOL;
            return $p;  
        }

        public static function Leer()
        {
            $arch = fopen("productos.json", "r");
            if($arch != null && $arch != null)
            {
                while(!feof($arch))
                {
                    $linea = fgets($arch);
                    echo $linea;
                }
            }
            fclose($arch);
        }

        public static function Alta($producto)
        {
            $arch = fopen("productos.json", "a");
            $altaExitosa = false;
            
            if($arch != null && $arch != null)
            {
                if(!Producto::Verificar($producto))
                {
                    fwrite($arch, $producto->ToString());
                    $altaExitosa = true;
                }
            }
            fclose($arch);
            return $altaExitosa;
        }

        public static function Verificar($p)
        {
            $arch = fopen("productos.json", "r");
            $estaEnBBDD = false;

            while (!feof($arch))
            {
                $linea = fgets($arch);
                $array_linea = explode(" ", $linea);
                $array_linea[0] = trim($array_linea[0]);

                if($array_linea[0] != "") 
                {
                    $codigoBarraRecuperado = trim($array_linea[0]);

                    if ($codigoBarraRecuperado == $p->_codigoBarra) 
                    {
                        $estaEnBBDD = true;
                        break;
                    } 
                }
            }

            echo $estaEnBBDD 
            ? "El {$p->_tipo} {$p->_nombre} con codigo de barras {$p->_codigoBarra} se encuentra en la BBDD" 
            : "El {$p->_tipo} {$p->_nombre} con codigo de barras {$p->_codigoBarra} NO se encuentra en la BBDD" ; 
            
            fclose($arch);
            return $estaEnBBDD;
        }

        public static function UpdateStock($p, $nuevoStock)
        {
            $arch = fopen("productos.json", "r+"); //con a no me deja por el fgets que es de lectura
            $counter = 0;
            $estadoRetono = -1; //-1 no se pudo, 0 nuevo, 1 actualizado

            if($arch != false && $arch != null && $p != null)
            {
                //array con cada linea del archivo. El 2do param evita agregar nuevas lineas, solo existentes
                $arrayLineas = file("productos.json", FILE_IGNORE_NEW_LINES);
                

                //reescribo el archivo con el nuevo stock, busco matchear si esta en la bbdd
                if(Producto::Verificar($p))
                {
                    while (!feof($arch))
                    {
                        $linea = fgets($arch);
                        $array_linea = explode(" ", $linea);
                        $array_linea[0] = trim($array_linea[0]);
        
                        if($array_linea[0] != "") 
                        {
                            $codigoBarraRecuperado = trim($array_linea[0]);
        
                            if ($codigoBarraRecuperado == $p->_codigoBarra) 
                            {
                                //indice de la lina a cambiar
                                $line_i_am_looking_for = $counter;
    
                                //array de lineas en el indice a cambiar, actualizo el stock 
                                $p->_stock = $nuevoStock; 
                                $arrayLineas[$line_i_am_looking_for] = $p->ToString();
    
                                //reescribo el archivo. Implode une un array por string segun el separador. 
                                //El espacio es perfecto, porque leemos lineas y es nuestro separador
                                //El 2do param es el array de todos los productos, con el que ya  esta actualizado inclusive
                                file_put_contents("productos.json", implode( "\n", $arrayLineas));
                                $estadoRetono = 1;
                                break;
                            } 
                        }
                        $counter++;
                    }
                    fclose($arch);
                }
                else //es nuevo, no esta en la bbdd
                {
                    fclose($arch);
                    if(Producto::Alta($p))
                    {
                        $estadoRetono = 0;
                    }
                }
            }
            return $estadoRetono;
        }

        public static function MsjUpdateStock($estado)
        {
            switch($estado)
            {
                case -1:
                    echo PHP_EOL."No se pudo hacer".PHP_EOL;
                    break;
                case 0:
                    echo PHP_EOL."Nuevo producto ingresado".PHP_EOL;
                    break;
                case 1:
                    echo PHP_EOL."Producto actualizado".PHP_EOL;
                    break;
            }
        }
       




    }


?>