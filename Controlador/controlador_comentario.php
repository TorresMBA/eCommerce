<?php 
	include_once '../Modelo/modelo_comentario.php';

	function listarComentarios($id){
		$obj = new modelo_comentario();
		$comen = $obj->listarComentarios($id);
		return $comen;
	}
?>