<?php 
	include_once '../Modelo/modelo_usuAdmin.php';

	$op = $_GET['op'];

	switch ($op) {
		case 1:
			listarUsuario();
			break;
		case 2:
			insertarUsuario();			
			break;
		case 3:
			editarUsuario();
			break;
		case 4:
			actulizarUsuario();
			header('location:controlador_usuario.php?op=1');
			break;
	}

	function insertarUsuario(){
		$obj = new Admin();
		$id = $_POST['idrol'];
		$nom = $_POST['Name'];
		$ape = $_POST['Ape'];
		$mail = $_POST['Email'];
		$cel = $_POST['Telephone'];
		$dirrecion = $_POST['Dirrecion'];
		$usu = $_POST['Usuario'];
		$pass = $_POST['Pass'];
		$est = $_POST['est'];

		$obj->setId_rol($id);
		$obj->setNom($nom);
		$obj->setApe($ape);
		$obj->setMail($mail);
		$obj->setCel($cel);
		$obj->setDirrecion($dirrecion);
		$obj->setUsu($usu);
		$obj->setPass($pass);
		$obj->setEst($est);
		$obj->insertarUsu();
		header('location:../index.php');
	}

	function editarUsuario(){
		$obj = new Admin();
		$id = $_GET['id'];

		$datos = $obj->editarUsu($id);
		include '../Vista/usuarioAdmin.php';
	}

	function actulizarUsuario(){
		$id = $_POST['id'];
		$idrol = $_POST['idrol'];
		$nom = $_POST['Name'];
		$ape = $_POST['Ape'];
		$mail = $_POST['Email'];
		$cel = $_POST['Telephone'];
		$dirrecion = $_POST['Dirrecion'];
		$usu = $_POST['Usuario'];
		$pass = $_POST['Pass'];
		$est = $_POST['est'];

		$obj = new Admin();
		$obj->setId($id);
		$obj->setId_rol($idrol);
		$obj->setNom($nom);
		$obj->setApe($ape);
		$obj->setMail($mail);
		$obj->setCel($cel);
		$obj->setDirrecion($dirrecion);
		$obj->setUsu($usu);
		$obj->setPass($pass);
		$obj->setEst($est);
		$obj->actualizarUsu();
	}