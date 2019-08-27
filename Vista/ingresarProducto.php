<?php 
	include_once 'header.php';

	if (!isset($_SESSION['usuario'])) {
		echo '<script>alert("Debes Loguearte como administrador")</script>';
		echo '<script>window.location="../Vista/login.php"</script>';
	}else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1){
?>
	<div class="container" style="width: 50%"> 	
		<br><br>
		<h3 class="head">Registro de Prodcutos</h3>
		<p class="head_para">Acceso solo para Administradores</p>
		<br><br>
		<div class=" contact_grid_right">
			<h6>Registrar Producto: </h6>
		</div>
		<form action="../Controlador/controlador_producto.php?op=2" method="post" class="creditly-card-form agileinfo_form">
			<section class="creditly-wrapper wthree, w3_agileits_wrapper">
				<div class="credit-card-wrapper">
						<div class="contact_left_grid">						
							<div class="controls">
								<label class="control-label">Nombre del Producto</label>
								<input class=" form-control" type="text" name="Name">
							</div>
							<div class="controls">
								<label class="control-label">Marca:</label>
								<select class="form-control option-w3ls" name="marca" style="padding: 1%;">
									<?php 
										include_once '../Controlador/controlador_Lista.php'; 
										listarMarca();
									?>
								</select>
							</div>
							<div class="controls">
								<label class="control-label">Precio Normal</label>
								<input class="form-control" type="text" name="precioN">
							</div>
							<div class="w3_agileits_card_number_grid_left">
								<div class="controls">
									<label class="control-label">Precio Oferta</label>
									<input class="number form-control" type="text" name="precioO" >
								</div>
							</div>
							<div class="w3_agileits_card_number_grid_right">
								<div class="controls">
									<label class="control-label">Descripcion:</label>
									<!--<input class=" form-control" type="text" name="Dirrecion" >-->
									<textarea class="form-control" name="desc" rows="5"></textarea>
								</div>
							</div>						
							<div class="controls">
								<label class="control-label">Talla</label>
								<select class="form-control option-w3ls" name="talla" style="padding: 1%;">
									<?php 
										include_once '../Controlador/controlador_Lista.php'; 
										listarTalla();
									?>
								</select>
							</div>
							<div class="controls">
								<label class="control-label">Tipo</label>
								<select class="form-control option-w3ls" name="tipo" style="padding: 1%;">
									<?php 
										include_once '../Controlador/controlador_Lista.php'; 
										listarTipo();
									?>
								</select>
							</div>							
							<div class="controls">
								<label class="control-label">Genero</label>
								<select class="form-control option-w3ls" name="genero" style="padding: 1%;">
									<?php 
										include_once '../Controlador/controlador_Lista.php'; 
										listarGenero();
									?>
								</select>
							</div><br>			
							<div class="controls">
								<label class="control-label">Estado:</label>
								<input class="number form-control" type="text" name="material" >
							</div>
						</div><br>
						<button type="submit" class="btn btn-danger" style="width: 50%">Guardar y Ingresar Img</button>
				</div>
			</section>
		</form>
	</div>
	<br>
<?php 
	}else{
		include_once '404.php';
	}
	include_once 'footer.php'; 
?>