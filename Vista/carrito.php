<?php
	include_once 'header.php';
	if (isset($_SESSION['carrito'])) {
		if(isset($_GET['id'])){
			$arreglo  = $_SESSION['carrito'];
			$encontro = false;
			$numero = 0;
			for($i = 0; $i < count($arreglo); $i++){
				if($arreglo[$i]['Id'] == $_GET['id']){
					$encontro = true;
					$numero = $i;
				}
			}
			if($encontro){
				$arreglo[$numero]['Cantidad'] = $arreglo[$numero]['Cantidad']+1;
				$_SESSION['carrito'] = $arreglo;
			}else{
				foreach($datos as $fila){
					$id = $fila['COD_SEA'];
					$imagen = $fila['FOTO1'];
					$nom= $fila['NOMBRE'];
					$precio = $fila['PRECIO_OFERTA'];	
				}
				$nuevos = array('Id' => $id,
									'Imagen' => $imagen,
									'Cantidad' => 1,
									'Nom' => $nom,
									'Precio' => $precio);
				array_push($arreglo, $nuevos);
				$_SESSION['carrito'] = $arreglo;
			}
		}
	}else{
		if(isset($_GET['id'])){
			foreach($datos as $fila){
				$id = $fila['COD_SEA'];
				$imagen = $fila['FOTO1'];
				$nom= $fila['NOMBRE'];
				$precio = $fila['PRECIO_OFERTA'];	
			}
			$arreglo[] = array('Id' => $id,
								'Imagen' => $imagen,
								'Cantidad' => 1,
								'Nom' => $nom,
								'Precio' => $precio);
			$_SESSION['carrito'] = $arreglo;
		}
	}

?>
	<div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<div class="privacy about">
				<h3>Carrito:</h3>
				<div class="checkout-right">						
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>ID</th>
								<th>PRODUCTO</th>
								<th>CANTIDAD</th>
								<th>MARCA</th>
								<th>PRECIO</th>
								<th>QUITAR</th>
							</tr>
						</thead>
						<tbody>
						<!-- <h4>Tu carrito de compras contiene: <span><?php #echo count($dato) ?></span></h4>--><br>
						<?php 
							if(!isset($_SESSION['usuario'])){
								echo '<script>alert("Debes loguearte primero")</script>';
								echo '<script>window.location="../Vista/login.php"</script>';
							}else{
								if(isset($_SESSION['carrito'])){
									$dato = $_SESSION['carrito'];
									$total=0;
									for($i = 0; $i < count($dato); $i++){	
													
						?>
							<tr class="rem1">
								<td class="invert"><?php echo $dato[$i]['Id'] ?></td>
								<td class="invert-image"><a href="single.html"><img src="../images/img/<?php echo $dato[$i]['Imagen'] ?>" class="img-responsive"></a></td>
								<td class="invert">
									<div class="quantity">
										<div class="quantity-select">
											<!--<div class="entry value-minus">&nbsp;</div>-->
											<div class="entry value">
												<span>
													<input type="text" value="<?php echo $dato[$i]['Cantidad'] ?>" 
													data-precio="<?php echo $dato[$i]['Precio'] ?>"
													data-id="<?php echo $dato[$i]['Id'] ?>"
													class="cantidad">
												</span>
											</div>
											<!--<div class="entry value-plus active">&nbsp;</div>-->
										</div>
									</div>
								</td>
								<td class="invert"><?php echo $dato[$i]['Nom'] ?></td>

								<td class="invert"><?php echo $dato[$i]['Precio'] ?></td>
								<td class="invert">
									<div class="rem">
										<div class="close1"> </div>
									</div>
								</td>
							</tr>	
							<?php 						
									}
								}else{
									echo '<h4>Tu carrito esta vacio</h4>';
								}
							}
							?>		
						</tbody>
					</table>
				</div>
				<div class="checkout-left">
					<div class="col-md-4 checkout-left-basket">
						<h4>Detalles de Compra</h4>
						<ul>
							<?php 
								for($i = 0; $i < count($dato); $i++) { 
									$subtotal = $dato[$i]['Cantidad'] * $dato[$i]['Precio'];
									$total = ($dato[$i]['Cantidad'] *  $dato[$i]['Precio']) + $total;
							?>
								<li>
									<?php echo $dato[$i]['Nom'] ?>&nbsp;Cantidad:<?php echo $dato[$i]['Cantidad'] ?>
									<span>S/<?php echo $dato[$i]['Precio'] ?></span>
								</li>
							<?php 
								}
							 ?>
								<li>
									SubTotal: <span class="subtotal">S/<?php echo $subtotal ?></span>
								</li>
								<li>
									Total: <span id="total">S/<?php echo $total; ?></span>
								</li>
						</ul>
					</div>
					<div class="col-md-8 address_form">
						<h4>Add a new Details</h4>
						<form action="payment.html" method="post" class="creditly-card-form agileinfo_form">
							<section class="creditly-wrapper wrapper">
								<div class="information-wrapper">
									<div class="first-row form-group">
										<div class="controls">
											<label class="control-label">Full name: </label>
											<input class="billing-address-name form-control" type="text" name="name" placeholder="Full name">
										</div>
										<div class="card_number_grids">
											<div class="card_number_grid_left">
												<div class="controls">
													<label class="control-label">Mobile number:</label>
													<input class="form-control" type="text" placeholder="Mobile number">
												</div>
											</div>
											<div class="card_number_grid_right">
												<div class="controls">
													<label class="control-label">Landmark: </label>
													<input class="form-control" type="text" placeholder="Landmark">
												</div>
											</div>
											<div class="clear"> </div>
										</div>
										<div class="controls">
											<label class="control-label">Town/City: </label>
											<input class="form-control" type="text" placeholder="Town/City">
										</div>
										<div class="controls">
											<label class="control-label">Address type: </label>
											<select class="form-control option-w3ls">
												<option>Office</option>
												<option>Home</option>
												<option>Commercial</option>
											</select>
										</div>
									</div>
									<button class="submit check_out">Delivery to this Address</button>
								</div>
							</section>
						</form>
						<div class="checkout-right-basket">
							<a href="payment.html">Make a Payment </a>
						</div>
					</div>
				
					<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>

<?php
	include 'footer.php';
?>