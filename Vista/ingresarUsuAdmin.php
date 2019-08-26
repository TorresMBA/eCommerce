<?php 
	include_once 'header.php'; 

	if (!isset($_SESSION['usuario'])) {
		echo '<script>alert("Debes Loguearte como administrador")</script>';
		echo '<script>window.location="../Vista/login.php"</script>';
	}else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1){
?>
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Registro de Usuarios </h3>
			<p class="head_para">Acceso solo para Administradores</p>
			<div class="inner_section_w3ls">
				<div class="col-md-7 contact_grid_right">
					<h6>Rellene los datos para Ingresar nuevo Usuario.</h6>
					<form action="../Controlador/controlador_usuAdmin.php?op=2" method="post">
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="Name" placeholder="Nombre" required="">
							<input type="text" name="Ape" placeholder="Apellido" required="">
							<input type="email" name="Email" placeholder="Email" required=""><br><br>
							<input type="text" name="" disabled=""><br><br>
							<?php 
								include_once '../Controlador/controlador_rol.php';
								listar_rol();
							?>
						</div>
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="Telephone" placeholder="Celular" required="">
							<input type="text" name="Dirrecion" placeholder="Dirrecion" required=""><br><br>
							<input type="text" name="Usuario" placeholder="Usuario" required=""><br><br>
							<input type="text" name="Pass" placeholder="Contraseña" required=""><br><br>
							<select class="form-control" name="est" >
								<option value="A">Activo</option>
								<option value="D">Inhabilitado</option>
							</select>
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
<?php 
	}else{
		include_once '404.php';
	}
	include_once 'footer.php'; 
?>