<?php
/*
    Aplicación No 25 ( AltaProducto)
    Archivo: altaProducto.php
    método:POST
    Recibe los datos del producto(código de barra (6 sifras ),nombre ,tipo, stock, precio )por POST
    ,
    crea un ID autoincremental(emulado, puede ser un random de 1 a 10.000). crear un
    objeto y utilizar sus métodos para poder verificar si es un producto existente, si ya existe
    el producto se le suma el stock , de lo contrario se agrega al documento en un nuevo
    renglón
    Retorna un :
    “Ingresado” si es un producto nuevo
    “Actualizado” si ya existía y se actualiza el stock.
    “no se pudo hacer“si no se pudo hacer
    Hacer los métodos necesarios en la clase
*/
    include_once "./producto.php";

    if(isset($_POST["codigoBarra"]) && isset($_POST["nombre"]) && isset($_POST["tipo"]) 
        && isset($_POST["stock"]) && isset($_POST["precio"]))
    {
        $prod = new Producto($_POST["codigoBarra"], $_POST["nombre"], $_POST["tipo"], $_POST["stock"], $_POST["precio"]);
        $prod2 = new Producto(990000, "Lumilagro", "Termo", 670, 7999);
        $prod3 = new Producto(111111, "El Fueguino", "Termo", 455, 12000);
        Producto::Alta($prod);
        Producto::Alta($prod2);
        Producto::Alta($prod3);
        Producto::MsjUpdateStock(Producto::UpdateStock($prod3, 120));
    }                        



?>