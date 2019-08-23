<?php include_once 'header.php'; ?>
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
					<form action="../Controlador/controlador_usuAdmin.php?op=4" method="post">
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="id" placeholder="ID" required="" value="<?php echo $fila['ID_LOG'] ?>">
							<input type="text" name="Name" placeholder="Nombre" required="" value="<?php echo $fila['NOMBRE'] ?>"><br><br>
							<input type="text" name="Ape" placeholder="Apellido" required="" value="<?php echo $fila['APELLIDO'] ?>">
							<input type="email" name="Email" placeholder="Email" required="" value="<?php echo $fila['EMAIL'] ?>"><br><br>
							<input type="text" name="rol" disabled="" value="Modificar Rol:"><br><br>
							<input type="text" name="est" disabled="" value="Modificar Estado:">
						</div>
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="Telephone" placeholder="Celular" required="" value="<?php echo $fila['CELULAR'] ?>">
							<input type="text" name="Dirrecion" placeholder="Dirrecion" required="" value="<?php echo $fila['DIRRECION'] ?>"><br><br>
							<input type="text" name="Usuario" placeholder="Usuario" required="" value="<?php echo $fila['NOM_USU'] ?>"><br><br>
							<input type="text" name="Pass" placeholder="Contraseña" required="" value="<?php echo $fila['PASS'] ?>"><br><br>
							<?php
								include_once '../Controlador/controlador_rol.php';
								listar_rol();
							?>	
								<br><br>
								<select  class="form-control" name="est" >
									<option value="A" <?php if($fila['ESTADO'] == 'A') echo 'selected' ?>>Habilitado</option>
									<option value="D" <?php if($fila['ESTADO'] == 'D') echo 'selected' ?>>Deshabilitado</option>
								</select>
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
<?php include_once 'footer.php'; ?>