<?php 
	include_once 'header.php'; 

	if (!isset($_SESSION['usuario'])) {
		echo '<script>alert("Debes Loguearte como administrador")</script>';
		echo '<script>window.location="../Vista/login.php"</script>';
	}else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1){
?>
	<div class="container" style="width: 50%"> 	
		<br><br>
		<h3 class="head">Modificar Productos</h3>
		<p class="head_para">Acceso solo para Administradores</p>
		<br><br>
		<div class=" contact_grid_right">
			<h6>Modificar Producto: </h6>
		</div>
		<?php 
                foreach($datos as $fila){
         ?>	
		<form action="../Controlador/controlador_producto.php?op=2" method="post" class="creditly-card-form agileinfo_form">
			<section class="creditly-wrapper wthree, w3_agileits_wrapper">
				<div class="credit-card-wrapper">
						<div class="contact_left_grid">	
							<div>
								<label class="control-label">ID</label>
                                <input type="text" name="id"  value="<?php echo $fila['COD_SEA'] ?>" readonly="" class="number form-control">
							</div>					
							<div class="controls">
								<label class="control-label">Nombre del Producto</label>
								<input type="text" name="Name"  required="" value="<?php echo $fila['NOMBRE'] ?>" class="number form-control">
							</div>
							<div class="controls">
								<label class="control-label">Marca:</label>
								<select class="form-control option-w3ls" name="marca" style="padding: 1%;" >
									<?php 
										include_once '../Controlador/controlador_Lista.php'; 
										listarMarca2($fila['NOM_MARCA']);
									?>
								</select>
							</div>
							<div class="controls">
								<label class="control-label">Precio Normal</label>
								<input type="text" name="precioN" value="<?php echo $fila['PRECIO_NORMAL'] ?>" required="" class="number form-control">
							</div>
							<div class="w3_agileits_card_number_grid_left">
								<div class="controls">
									<label class="control-label">Precio Oferta</label>
									<input type="text" name="precioO" value="<?php echo $fila['PRECIO_OFERTA'] ?>" required="" class="number form-control">
								</div>
							</div>
							<div class="w3_agileits_card_number_grid_right">
								<div class="controls">
									<label class="control-label">Descripcion:</label>
									<textarea class="form-control" name="desc" rows="5" value=""><?php echo $fila['DESCRIPCION'] ?></textarea>
								</div>
							</div>						
							<div class="controls">
								<label class="control-label">Talla</label>
								<select class="form-control option-w3ls" name="talla" style="padding: 1%;">
									<?php 
										include_once '../Controlador/controlador_Lista.php'; 
										listarTalla2($fila['TALLA']);
									?>
								</select>
							</div>
							<div class="controls">
								<label class="control-label">Tipo</label>
								<select class="form-control option-w3ls" name="tipo" style="padding: 1%;">
									<?php 
										include_once '../Controlador/controlador_Lista.php'; 
										listarTipo2($fila['NOM_TIPO']);
									?>
								</select>
							</div>							
							<div class="controls">
								<label class="control-label">Genero</label>
								<select class="form-control option-w3ls" name="genero" style="padding: 1%;">
									<?php 
										include_once '../Controlador/controlador_Lista.php'; 
										listarGenero2($fila['TIPO_GEN']);
									?>
								</select>
							</div><br>			
							<div class="controls">
								<label class="control-label">Material</label>
								<input type="text" name="material" value="<?php echo $fila['MATERIAL'] ?>"  required="" class="number form-control">
							</div>
						</div><br>
						<button type="submit" class="btn btn-danger" style="width: 50%">Guardar y Ingresar Img</button>
				</div>
			</section>
		</form>
	<?php }?>
	</div>
	<br>
<?php 
	}else{
		include_once '404.php';
	}
	include_once 'footer.php'; 
?>