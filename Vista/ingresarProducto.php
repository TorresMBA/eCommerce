<?php include_once 'header.php'; ?>
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Ingresar Productos</h3>
			<p class="head_para">Agregar todos los campos</p>
			<div class="inner_section_w3ls">
				<div class="col-md-7 contact_grid_right">
					<h6>Rellene todo los campos del producto</h6>
					<form action="../Controlador/controlador_usuario.php?op=2" method="post">
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="Name" placeholder="Nombre" required="">
							<input type="text" name="Ape" placeholder="Apellido" required="">
							<input type="email" name="Email" placeholder="Email" required="">
							<input type="email" name="Email" placeholder="Confirma Email" required="">
						</div>
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="Telephone" placeholder="Celular" required="">
							<input type="text" name="Dirrecion" placeholder="Dirrecion" required=""><br><br>
							<input type="text" name="Usuario" placeholder="Usuario" required=""><br><br>
							<input type="text" name="Pass" placeholder="Contraseña" required="">
						</div>
						<div class="clearfix">  </div>
						<br>
						<input type="submit" value="Registrar">
					</form>
				</div>	
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<?php include_once 'footer.php'; ?>