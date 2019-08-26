<?php 
    include_once '../Modelo/modelo_carrito.php';

    $op = $_GET['op'];

    switch ($op){
        case 1:
            carritoProducto();
            break;
    }

    function carritoProducto(){
        $id= $_GET['id'];
        $obj = new modelo_carrito();
        $datos = $obj->listarCarrito($id);
        include_once '../Vista/carrito.php';
    }