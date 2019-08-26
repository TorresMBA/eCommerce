<?php 
	include_once 'header.php'; 
	
	if (!isset($_SESSION['usuario'])) {
		echo '<script>alert("Debes Loguearte como administrador")</script>';
		echo '<script>window.location="../Vista/login.php"</script>';
	}else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1){
?>
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Ingresar Imagenes</h3>
			<p class="head_para">Agregar todas las imagenes</p>
			<div class="inner_section_w3ls" >
				<div class="col-md-7 contact_grid_right ">
				<form action="../Controlador/controlador_producto.php?op=3" method="post" enctype="multipart/form-data">
					<div class="col-md-6 col-sm-6 contact_left_grid">	
						<table class="table table-hover ">
							<tr>
								<td>Producto Registrado Recientemente</td>	
								<?php 
									foreach($datos as $filas){		
								?>
									<input type="hidden" name="id"  value="<?php echo $filas['COD_SEA']?>">	
									<td>
										<input type="text" name="txtCod" value="<?php echo $filas['NOMBRE']?>">
									</td>
								<?php 
									}
								?>
							</tr>
							<tr>	
								<td>Imagen de Perfil</td>
								<td><input type="file" class="form-control-file" name="txtImg1" id="per"></td>
							</tr>
							<tr>								
							  	<td>Imagen Frontal</td>
								<td><input type="file" class="form-control-file" name="txtImg2" id="fron"></td>
							</tr>
							<tr>								
								<td>Foto de Costado Derecho</td>
								<td> <input type="file" class="form-control-file" name="txtImg3" id="cosD"></td>
							</tr>
							<tr>
								<td>Foto de Costado Izquierdo</td>
								<td> <input type="file" class="form-control-file" name="txtImg4" id="cosI"></td>
							</tr>	
						</table><br>
						<input type="submit" value="Ingresar">		
					</div>					
				</form>
				</div>	
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<?php 
	}else{
		include_once '404.php';
	}
	include_once 'footer.php'; 
?>