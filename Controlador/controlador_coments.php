<?php 
	include_once '../Modelo/modelo_comentario.php';

	$id_pro = $_GET['id_p'];
	$id_usu = $_GET['id_usu'];
	$op = $_GET['op'];

	if($id_usu == 0){
		echo '<script>alert("No puedes comentar sin loguearte")</script>';
		echo '<script>window.location="controlador_sneakers.php?op=2&id='.$id_pro.'"</script>';
	}

	switch ($op) {
		case 2:
			insertarComentario();
			break;	
		default:
			# code...
			break;
	}

	function insertarComentario(){
		$produc = $_GET['id_p'];
		$id_usu = $_GET['id_usu'];
		$obj = new modelo_comentario();
		$comentario = $_POST['comen'];
		$estrellas = $_POST['star'];
		$obj->setComentario($comentario);
		$obj->setIdUsu($id_usu);
		$obj->setIdProd($produc);
		$obj->setStar($estrellas);
		$obj->insertarComentario();
		echo '<script>window.location="controlador_sneakers.php?op=2&id='.$produc.'"</script>';
	}
?>