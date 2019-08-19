<?php 
	include_once '../Modelo/modelo_usuarios.php';

	$op = $_GET['op'];

	switch ($op) {
		case 1:
			insertarUsuario();
			header('location:../index.php');
			break;
		
		default:
			# code...
			break;
	}

	function insertarUsuario(){
		$obj = new Usuario();
		$nom = $_POST['Name'];
		$ape = $_POST['Ape'];
		$mail = $_POST['Email'];
		$cel = $_POST['Telephone'];
		$dirrecion = $_POST['Dirrecion'];
		$usu = $_POST['Usuario'];
		$pass = $_POST['Pass'];

		$obj->setNom($nom);
		$obj->setApe($ape);
		$obj->setMail($mail);
		$obj->setCel($cel);
		$obj->setDirrecion($dirrecion);
		$obj->setUsu($usu);
		$obj->setPass($pass);
		$obj->insertarUsu();		
	}
?>