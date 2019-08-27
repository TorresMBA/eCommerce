<?php 
	include_once 'header.php'; 

	if (!isset($_SESSION['usuario'])) {
		echo '<script>alert("Debes Loguearte como administrador")</script>';
		echo '<script>window.location="../Vista/login.php"</script>';
	}else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1){
?>
	<div class="container" style="width: 50%"> 	
		<br><br>
		<h3 class="head">Registro de Usuarios</h3>
		<p class="head_para">Acceso solo para Administradores</p>
		<br><br>
		<div class=" contact_grid_right">
			<h6>Registrar Usuario: </h6>
		</div>
		<form action="../Controlador/controlador_usuAdmin.php?op=2" method="post" class="creditly-card-form agileinfo_form">
			<section class="creditly-wrapper wthree, w3_agileits_wrapper">
				<div class="credit-card-wrapper">
						<div class="contact_left_grid">						
							<div class="controls">
								<label class="control-label">Nombre de Usuario</label>
								<input class=" form-control" type="text" name="Usuario"  ?>">
							</div>
							<div class="controls">
								<label class="control-label">Contraseña</label>
								<input class=" form-control" type="password" name="Pass"  ?>">
							</div>
							<div class="controls">
								<label class="control-label">Nombre</label>
								<input class="form-control" type="text" name="Name"  ?>">
							</div>
							<div class="w3_agileits_card_number_grid_left">
								<div class="controls">
									<label class="control-label">Apellido</label>
									<input class="number form-control" type="text" name="Ape"  ?>" >
								</div>
							</div>
							<div class="w3_agileits_card_number_grid_right">
								<div class="controls">
									<label class="control-label">Email:</label>
									<input class=" form-control" type="text" name="Email"  ?>">
								</div>
							</div>						
							<div class="controls">
								<label class="control-label">Celular</label>
								<input class=" form-control" type="text" name="Telephone"  ?>">
							</div>
							<div class="controls">
								<label class="control-label">Dirrecion</label>
								<input class=" form-control" type="text" name="Dirrecion"  ?>">
							</div>							
							<div class="controls">
								<label class="control-label">Rol:</label>
								<?php
									include_once '../Controlador/controlador_rol.php';
									listar_rol2();
								?>	
							</div><br><br>				
							<div class="controls">
								<label class="control-label">Estado:</label>
								<select  class="form-control option-w3ls" name="est" style="padding: 1%;">
									<option selected disabled>Selecione...</option>
									<option value="A" >Habilitado</option>
									<option value="D" >Deshabilitado</option>
								</select>
							</div>
						</div><br>
						<button type="submit" class="btn btn-danger" style="width: 50%">Actualizar</button>
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