<?php 
	include 'header.php'; 
	if (!isset($_SESSION['usuario'])) {
		echo '<script>alert("Debes Loguearte como administrador")</script>';
		echo '<script>window.location="../Vista/login.php"</script>';
	}else if (isset($_SESSION['usuario']) && $_SESSION['rol'] == 1){
?>
	<div class="container" style="width: 50%"> 	
		<br><br>
		<h3 class="head">Perfil</h3>
		<p class="head_para">Modifique sus Datos</p>
		<br><br>
		<?php
						foreach ($datos as $fila) {				
		?>
		<div class=" contact_grid_right">
			<h6>Usuario: <?php echo $fila['NOM_USU'] ?></h6>
		</div>
		<form action="../Controlador/controlador_usuario.php?op=2" method="post" class="creditly-card-form agileinfo_form">
			<section class="creditly-wrapper wthree, w3_agileits_wrapper">
				<div class="credit-card-wrapper">
						<div class="first-row form-group">
							<div class="controls">
								<label class="control-label">ID</label>
								<input class="form-control" type="text" name="id" value="<?php echo $fila['ID_LOG'] ?>" readonly>
							</div>
							<div class="controls">
								<label class="control-label">Nombre de Usuario</label>
								<input class=" form-control" type="text" name="Usuario" value="<?php echo $fila['NOM_USU'] ?>">
							</div>
							<div class="controls">
								<label class="control-label">Contraseña</label>
								<input class=" form-control" type="password" name="Pass" value="<?php echo $fila['PASS'] ?>">
							</div>
							<div class="controls">
								<label class="control-label">Nombre</label>
								<input class="form-control" type="text" name="Name" value="<?php echo $fila['NOMBRE'] ?>">
							</div>
							<div class="w3_agileits_card_number_grid_left">
								<div class="controls">
									<label class="control-label">Apellido</label>
									<input class="number form-control" type="text" name="Ape" value="<?php echo $fila['APELLIDO'] ?>" >
								</div>
							</div>
							<div class="w3_agileits_card_number_grid_right">
								<div class="controls">
									<label class="control-label">Email:</label>
									<input class=" form-control" type="text" name="Email" value="<?php echo $fila['EMAIL'] ?>">
								</div>
							</div>						
							<div class="controls">
								<label class="control-label">Celular</label>
								<input class=" form-control" type="text" name="Telephone" value="<?php echo $fila['CELULAR'] ?>">
							</div>
							<div class="controls">
								<label class="control-label">Dirrecion</label>
								<input class=" form-control" type="text" name="Dirrecion" value="<?php echo $fila['DIRRECION'] ?>">
							</div>
						</div>
						<button type="submit" class="btn btn-danger" style="width: 50%">Actualizar</button>
				</div>
			</section>
		</form>
		<?php 
					}
		?>
	</div>
	<br>
<?php 
	}else{
		echo '<script>alert("Debes Loguearte primero")</script>';
		include_once '404.php';
	}
	include 'footer.php'; 
?>