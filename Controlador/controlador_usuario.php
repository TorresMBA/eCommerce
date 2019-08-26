<?php 
	include_once '../Modelo/modelo_usuarios.php';

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
			
			break;
		case 5:
			eliminarUsuario();
			listarUsuario();
			break;
	}

	function listarUsuario(){
		$obj = new Usuario();
		$datos = $obj->listarUsu();
		include_once '../Vista/listaUsuario.php';
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
		//$est = $_POST['est'];

		$obj->setNom($nom);
		$obj->setApe($ape);
		$obj->setMail($mail);
		$obj->setCel($cel);
		$obj->setDirrecion($dirrecion);
		$obj->setUsu($usu);
		$obj->setPass($pass);
		$obj->setEst('A');
		$obj->insertarUsu();
		echo '<script>alert("Usuario Ingresado Correctamente")</script>';
		echo '<script>window.location="../index.php"</script>';
	}

	function editarUsuario(){
		$obj = new Usuario();
		$id = $_GET['id'];

		$datos = $obj->editarUsu($id);
		include '../Vista/usuario.php';
	}

	function actulizarUsuario(){
		$id = $_POST['id'];
		$nom = $_POST['Name'];
		$ape = $_POST['Ape'];
		$mail = $_POST['Email'];
		$cel = $_POST['Telephone'];
		$dirrecion = $_POST['Dirrecion'];
		$usu = $_POST['Usuario'];
		$pass = $_POST['Pass'];

		$obj = new Usuario();
		$obj->setId($id);
		$obj->setNom($nom);
		$obj->setApe($ape);
		$obj->setMail($mail);
		$obj->setCel($cel);
		$obj->setDirrecion($dirrecion);
		$obj->setUsu($usu);
		$obj->setPass($pass);
		$obj->actualizarUsu();

		echo '<script>alert("Modificado Correctamente")</script>';
		echo '<script>window.location="Controlador/controlador_usuario.php?op=3"</script>';
	}

	function eliminarUsuario(){		
		$id = $_GET['id'];

		$obj = new Usuario();
		$obj->setId($id);
		$obj->eliminarUsu();
	}
?>