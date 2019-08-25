<?php
	include_once '../Modelo/modelo_producto.php';

	$op = $_GET['op'];

	switch ($op) {
		case 1:
			listarProducto();
			break;
		case 2:
			ingresarProducto();
			listarProducto();
			break;
		case 3:
			ingresarImg();
			listarProducto();
			break;
		case 4:
			editarProducto();
			break;
		case 5:
			eliminarProducto();
			listarProducto();
			break;
		case 6:
			actualizarProducto();
			listarProducto();
			break;
		default:
			# code...
			break;
	}

	function listarProducto(){
		$obj = new modelo_producto();
		$dato = $obj->listarProducto();
		include_once '../Vista/listarProducto.php';
	}

	function ingresarProducto(){	
		$nom = $_POST['Name'];
		$marca = $_POST['marca'];
		$precioN = $_POST['precioN'];
		$precioO = $_POST['precioO'];
		$desc = $_POST['desc'];
		$talla = $_POST['talla'];	
		$tipo = $_POST['tipo'];
		$genero = $_POST['genero'];
		$mat = $_POST['material'];

		$obj = new modelo_producto();
		$obj->setNom($nom);
		$obj->setMarca($marca);
		$obj->setPrecioN($precioN);
		$obj->setPrecioO($precioO);
		$obj->setDesc($desc);
		$obj->setTalla($talla);
		$obj->setTipo($tipo);
		$obj->setGenero($genero);
		$obj->setMat($mat);
		$obj->insertarProducto();
		
		ingresarImgProducto();
	}

	function ingresarImgProducto(){
		$obj = new modelo_producto();
		$datos = $obj->ultimoRegistro();
		include_once '../Vista/ingresarImgProducto.php';
	}

	function ingresarImg(){

		$id = $_POST['id'];
		$img1 = $_FILES['txtImg1']['name'];
		$img2 = $_FILES['txtImg2']['name'];
		$img3 = $_FILES['txtImg3']['name'];
		$img4 = $_FILES['txtImg4']['name'];
		$obj = new modelo_producto();
		$obj->setIdCalzado($id);
		$obj->setFoto1($img1);
		$obj->setFoto2($img2);
		$obj->setFoto3($img3);
		$obj->setFoto4($img4);		
		$ruta1 = $_FILES['txtImg1']['tmp_name'];
		$ruta2 = $_FILES['txtImg2']['tmp_name'];
		$ruta3 = $_FILES['txtImg3']['tmp_name'];
		$ruta4 = $_FILES['txtImg4']['tmp_name'];
		$destino = '../images/img/';
		
		//Subimos y preguntamos si está OK
		if (!copy($ruta1, $destino.$img1) && !copy($ruta2, $destino.$img2) && !copy($ruta3, $destino.$img3) && !copy($ruta4, $destino.$img4)){
			echo 'Subida de imagen fallida';
		}    
		$obj->ingresarImg();   
	}

	function editarProducto(){
		$obj = new modelo_producto();
		$id = $_GET['id'];
		$datos = $obj->editarProducto($id);
		include_once '../Vista/actualizarProducto.php';
	}

	function actualizarProducto(){
		$id = $_POST['id'];
		$nom = $_POST['Name'];
		$marca = $_POST['marca'];
		$precioN = $_POST['precioN'];
		$precioO = $_POST['precioO'];
		$desc = $_POST['desc'];
		$talla = $_POST['talla'];	
		$tipo = $_POST['tipo'];
		$genero = $_POST['genero'];
		$mat = $_POST['material'];

		$obj = new modelo_producto();
		$obj->setIdCalzado($id);
		$obj->setNom($nom);
		$obj->setMarca($marca);
		$obj->setPrecioN($precioN);
		$obj->setPrecioO($precioO);
		$obj->setDesc($desc);
		$obj->setTalla($talla);
		$obj->setTipo($tipo);
		$obj->setGenero($genero);
		$obj->setMat($mat);
		$obj->actualizarProducto();
	}

	function eliminarProducto(){
		$obj = new modelo_producto();
		$id = $_GET['id'];
		$obj->setIdCalzado($id);
		$obj->eliminarProducto();
	}
?>