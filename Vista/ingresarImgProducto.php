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
	<form action="../Controlador/controlador_producto.php?op=3" method="post" enctype="multipart/form-data" class="creditly-card-form agileinfo_form">
			<section class="creditly-wrapper wthree, w3_agileits_wrapper">
				<div class="credit-card-wrapper">
					<div class="contact_left_grid">						
							<div class="controls">
								<?php 
									foreach($datos as $filas){		
								?>
										<input type="hidden" name="id"  value="<?php echo $filas['COD_SEA']?>">	
										<label class="control-label">Producto Registrado Recientemente</label>
										<input type="text" class="form-control" name="txtCod" value="<?php echo $filas['NOMBRE']?>" disabled>
								<?php 
									}
								?>
							</div>
							<div class="controls">
								<label class="control-label">Imagen de Perfil</label>
								<input type="file" class="form-control-file form-control" name="txtImg1" id="per">
							</div>
							<div class="w3_agileits_card_number_grid_left">
								<div class="controls">
									<label class="control-label">Imagen Frontal</label>
									<input type="file" class="form-control-file form-control" name="txtImg2" id="per">
								</div>
							</div>
							<div class="w3_agileits_card_number_grid_left">
								<div class="controls">
									<label class="control-label">Imagen de Costado Derecho</label>
									<input type="file" class="form-control-file form-control" name="txtImg3" id="per">
								</div>
							</div>
							<div class="w3_agileits_card_number_grid_left">
								<div class="controls">
									<label class="control-label">Imagen de Costado Izquierdo</label>
									<input type="file" class="form-control-file form-control" name="txtImg4" id="per">
								</div>
							</div>
					</div><br>
					<button type="submit" class="btn btn-danger" style="width: 50%">Guardar Producto</button>
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