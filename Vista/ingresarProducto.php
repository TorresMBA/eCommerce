<?php include_once 'header.php'; ?>
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Ingresar Productos</h3>
			<p class="head_para">Agregar todos los campos</p>
			<div class="inner_section_w3ls" >
				<div class="col-md-7 contact_grid_right ">
					<h6>Rellene todo los campos del producto</h6>
					<form action="../Controlador/controlador_producto.php?op=2" method="post">
						<div class="col-md-6 col-sm-6 contact_left_grid">				
							<table class="table table-hover ">
								<tr>
									<td>Nombre</td>
									<td><input type="text" name="Name"  required=""></td>
								</tr>
								<tr>
									<td>Marca</td>
									<td>
										<select class="form-control" name="marca">
											<?php 
												include_once '../Controlador/controlador_Lista.php'; 
												listarMarca();
											?>
										</select>
									</td>
									<td>
										<a href="">Ingresar Nueva Marca</a>
										<a href="IngresarDetalles.php" target="_blank" onClick="window.open(this.href, this.target, 'width=500,height=500'); return false;">Click aquí</a>
									</td>
								</tr>
								<tr>
									<td>Precio Normal</td>
									<td><input type="text" name="precioN"  required=""></td>
								</tr>
								<tr>
									<td>Precio De Oferta</td>
									<td><input type="text" name="precioO"  required=""></td>
								</tr>
								<tr>
									<td>Descripcion</td>
									<td>
										<textarea class="form-control" name="desc" rows="5"></textarea>
									</td>
								</tr>
								<tr>
									<td>Talla</td>
									<td>
										<select class="form-control" name="talla">
											<?php 
												include_once '../Controlador/controlador_Lista.php'; 
												listarTalla();
											?>
										</select>
									</td>
									<td><a href="">Ingresar Nueva Talla</a></td>
								</tr>
								<tr>
									<td>Tipo</td>
									<td>
										<select class="form-control" name="tipo">
											<?php 
												include_once '../Controlador/controlador_Lista.php'; 
												listarTipo();
											?>
										</select>
									</td>
									<td><a href="">Ingresar Nuevo Tipo</a></td>
								</tr>
								<tr>
									<td>Genero</td>
									<td>
										<select class="form-control" name="genero">
											<?php 
												include_once '../Controlador/controlador_Lista.php'; 
												listarGenero();
											?>
										</select>
									</td>
									<td><a href="">Ingresar Nueva Marca</a></td>
								</tr>
								<tr>
									<td>Material</td>
									<td><input type="text" name="material"  required=""></td>
								</tr>
							</table><br>
							<input type="submit" value="Registrar">		
						</div>					
					</form>
				</div>	
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<?php include_once 'footer.php'; ?>