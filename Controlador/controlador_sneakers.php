<?php
	include '../Modelo/modelo_sneakers.php';

	$opcion = $_GET['op'];
	switch ($opcion) {
		case 1:
			$obj = new modelo_sneakers();
			$datos = $obj->listar_calzado();
			include '../Vista/shop.php';
			break;
		case 2:
			$obj = new modelo_sneakers();
			$id = $_GET['id'];
			$datos = $obj->detalles_calzado($id);
			include '../Vista/producto.php';
			break;
		case 3:
			# code...
			break;
		case 4:
			# code...
			break;
		default:
			# code...Create Read Update Delete || Crear Leer Actualiza Eliminar
			break;
	}
?>