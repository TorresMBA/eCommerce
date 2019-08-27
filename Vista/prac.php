<?php 
	include_once 'header.php';
?>
	<div class="container" style="width: 50%"> 	
		<br><br>
		<h3 class="head">Registro de Usuarios</h3>
		<p class="head_para">Add Some Description</p>
		<br><br>
		<div class=" contact_grid_right">
			<h6>Rellene los datos para Registrarse.</h6>
		</div>
		<form action="../Controlador/controlador_usuario.php?op=2" method="post" class="creditly-card-form agileinfo_form">
			<section class="creditly-wrapper wthree, w3_agileits_wrapper">
				<div class="credit-card-wrapper">
						<div class="first-row form-group">
							<div class="controls">
								<label class="control-label">Nombre</label>
								<input class="form-control" type="text" name="Name" placeholder="Nombre" required="">
							</div>
							<div class="w3_agileits_card_number_grid_left">
								<div class="controls">
									<label class="control-label">Apellido</label>
									<input class="number form-control" type="text" name="number" >
								</div>
							</div>
							<div class="w3_agileits_card_number_grid_right">
								<div class="controls">
									<label class="control-label">Email:</label>
									<input class=" form-control" type="text" name="security-code">
								</div>
							</div>
							<div class="controls">
								<label class="control-label">Confirmar Email:</label>
								<input class=" form-control" type="text" name="expiration-month-and-year">
							</div>
							<div class="controls">
								<label class="control-label">Celular</label>
								<input class=" form-control" type="text" name="expiration-month-and-year">
							</div>
							<div class="controls">
								<label class="control-label">Dirrecion</label>
								<input class=" form-control" type="text" name="expiration-month-and-year">
							</div>
							<div class="controls">
								<label class="control-label">Nombre de Usuario</label>
								<input class=" form-control" type="text" name="expiration-month-and-year">
							</div>
							<div class="controls">
								<label class="control-label">Contraseña</label>
								<input class=" form-control" type="password" name="expiration-month-and-year">
							</div>
						</div>
						<button type="submit" class="btn btn-success" style="width: 50%">Registrarse</button>
				</div>
			</section>
		</form>
	</div>
	<br>
<?php 
	include_once 'footer.php';
?>