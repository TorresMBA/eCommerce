<?php
	session_start();
	include_once '../Modelo/modelo_usuarios.php';

	$op = $_GET['op'];
	switch ($op) {
		case 1:
			validar();
			break;
		case 2:
			cerrarSesion();
			header('location:../index.php');
			break;
		case 3:
			break;
		default:
			header('location:../index.php');
			break;
	}

	function validar(){
		$nom = $_POST['username'];
    	$cla = $_POST['password'];

    	$reg = new Usuario();
    	$registro = $reg->validarUsu($nom, $cla);

	    if (empty($registro)){  
	         header('Location: ../Vista/login.php?valor=Verificar&nbspdatos');
	    }else{
	        foreach ($registro as $dato) {
	        	$id = $dato['ID_LOG'];
	        	$rol = $dato['ID_ROL'];
	        }
	        $_SESSION['usuario']= $nom;
	        $_SESSION['id']= $id;
	        $_SESSION['rol']= $rol;

	        switch ($_SESSION['rol']) {
	        	case 1:
	        		header('Location: ../index.php');
	        		break;
	        	case 2: 
	        		header('Location: ../index.php');
	        		break;
	        }        
	    }	    
	}

	function cerrarSesion(){
		session_unset();
		session_destroy();
	}
?>