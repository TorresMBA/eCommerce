<?php 
	include 'header.php'; 
	if (isset($_SESSION['usuario'])){
?>
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Perfil</h3>
			<p class="head_para">Add Some Description</p>
			<div class="inner_section_w3ls">
				<div class="col-md-7 contact_grid_right">
					<?php
						foreach ($datos as $fila) {				
					?>
					<h6>Usuario: <?php echo $fila['NOM_USU'] ?></h6>
					<form action="../Controlador/controlador_usuario.php?op=4" method="post">
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="id" placeholder="ID" required="" value="<?php echo $fila['ID_LOG'] ?>" readonly>
							<input type="text" name="Name" placeholder="Nombre" required="" value="<?php echo $fila['NOMBRE'] ?>"><br><br>
							<input type="text" name="Ape" placeholder="Apellido" required="" value="<?php echo $fila['APELLIDO'] ?>">
							<input type="email" name="Email" placeholder="Email" required="" value="<?php echo $fila['EMAIL'] ?>"><br><br>
						</div>
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="Telephone" placeholder="Celular" required="" value="<?php echo $fila['CELULAR'] ?>">
							<input type="text" name="Dirrecion" placeholder="Dirrecion" required="" value="<?php echo $fila['DIRRECION'] ?>"><br><br>
							<input type="text" name="Usuario" placeholder="Usuario" required="" value="<?php echo $fila['NOM_USU'] ?>"><br><br>
							<input type="text" name="Pass" placeholder="Contraseña" required="" value="<?php echo $fila['PASS'] ?>"><br><br>
						</div>
						<div class="clearfix">  </div>
						<br>
						<input type="submit" value="Actualizar">
					</form>
					<?php 
					}
					?>
				</div>	
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<?php 
	}else{
		echo '<script>alert("Debes Loguearte primero")</script>';
		include_once '404.php';
	}
	include 'footer.php'; 
?>