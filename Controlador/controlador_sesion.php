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
			# code...
			break;
	}

	function validar(){
		$nom = $_POST['username'];
    	$cla = $_POST['password'];

    	$reg = new Usuario();
    	$registro = $reg->validarUsu($nom, $cla);

	    if (empty($registro)){  
	         header('Location: ../Vista/login.php?valor=Verificar datos');
	    }else{
	        $_SESSION['usuario']= $nom;
	        foreach ($registro as $dato) {
	        	$id = $dato['ID_LOG'];
	        	$rol = $dato['ID_ROL'];
	        }
	        switch ($rol) {
	        	case 1:
	        		header('Location: ../index.php?id='.$id.'&rol='.$rol);
	        		break;
	        	case 2: 
	        		header('Location: ../index.php?id='.$id.'&rol='.$rol);
	        		break;
	        }        
	    }	    
	}

	function cerrarSesion(){
		session_unset();
		session_destroy();
	}
?>