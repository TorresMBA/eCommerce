<?php
	include_once '../Modelo/modelo_usuario.php';

	$user = new Usuario();
	$op = $_GET['op'];
	switch ($op) {
		case 1:
			if (isset($_SESSION['user'])) {
			$user->setUser($user->getCurrentUser());
				
			include_once '../Vista/index.php';
				//header('location:../index.php');
		}else{
			if (isset($_POST['username']) and isset($_POST['password'])) {
				$userForm = $_POST['username'];
				$passForm = $_POST['password'];
				if ($user->userExist($userForm, $passForm)) {
					$user->setCurrentUser($userForm);
					$user->setUser($userForm);
					include_once '../Vista/index.php';
				}else{
					$d = "nombre de usuario o password incorrecot";
					include_once '../Vista/login.php';
				}
			}else{
				include_once '../Vista/login.php';
			}
		}
			break;
		case 2:
			$user -> closeSession();
			header('location:../Vista/index.php');
			break;
		case 3:
			ingresarUsuario();
		default:
			# code...
			break;
	}

	function ingresarUsuario(){
		
	}	
?>