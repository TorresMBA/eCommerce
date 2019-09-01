<?php 
	include_once '../Modelo/modelo_comentario.php';

	function listarComentarios($id){
		$obj = new modelo_comentario();
		$comen = $obj->listarComentarios($id);
		return $comen;
	}

	function cantidad($id){
		$obj = new modelo_comentario();
		$cantidad = $obj->cantComen($id);
		return $cantidad;
	}

	function listarComenPerso($inicio, $articulos, $id){
		$obj = new modelo_comentario();
		$cantidad = $obj->listarComenPerso($id, $inicio, $articulos);
		return $cantidad;
	}
?>