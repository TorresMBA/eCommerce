<?php
	include 'header.php';
?>
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Login</h3>
			<p class="head_para">Inicie sesion</p>
			<div class="inner_section_w3ls">
				<div class="col-md-7 contact_grid_right">
					<h6>Completo los datos para ingresar</h6>
					<form action="../Controlador/controlador_sesion.php?op=1" method="post">		
						<div class="col-md-6 col-sm-6 contact_left_grid">
							<input type="text" name="username" placeholder="Usuario" required="">
							<input type="text" name="password" placeholder="Contraseña" required="">
						</div>				
						<div class="clearfix">  </div>
						<br>
						<input type="submit" value="Ingresar">
					</form>
				</div>	
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
<?php 
	include 'footer.php';
?>