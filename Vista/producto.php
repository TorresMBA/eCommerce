<?php
	include 'header.php';
?>
	<div class="ads-grid_shop">
		<?php 
			if (!isset($_GET['pag'])) {
				echo '<script>window.location="controlador_sneakers.php?op=2&id='.$_GET['id'].'&pag=1"</script>';
			}
					
			foreach ($datos as $fila) {
		?>
		<div class="shop_inner_inf">
			<div class="col-md-4 single-right-left ">
				<div class="grid images_3_of_2">
					<div class="flexslider">
						<ul class="slides">
							<li data-thumb="../images/img/<?php echo $fila['FOTO2'] ?>">
								<div class="thumb-image"> <img src="../images/img/<?php echo $fila['FOTO2'] ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="../images/img/<?php echo $fila['FOTO3'] ?>">
								<div class="thumb-image"> <img src="../images/img/<?php echo $fila['FOTO3'] ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
							<li data-thumb="../images/img/<?php echo $fila['FOTO4'] ?>">
								<div class="thumb-image"> <img src="../images/img/<?php echo $fila['FOTO4'] ?>" data-imagezoom="true" class="img-responsive"> </div>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-md-8 single-right-left simpleCart_shelfItem">
				<h3><?php echo $fila['NOM_MARCA'] ?></h3><br>
				<h2><?php echo $fila['NOMBRE'] ?></h2>
				<p><span class="item_price">S/<?php echo $fila['PRECIO_OFERTA']?></span>
					<del>S/<?php echo $fila['PRECIO_NORMAL'] ?></del>
				</p>
				<div class="description">
					<h5>Verifique la entrega, las opciones de pago y los cargos en su ubicación</h5>
					<form action="#" method="post">
						<input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter pincode';}"
						    required="">
						<input type="submit" value="Check">
					</form>
				</div>
				<div class="color-quality">
					<div class="color-quality-right">
						<h5>Talla :</h5>
						<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
								<option value="null">5</option>
								<option value="null">6</option> 
								<option value="null">7</option>
								<option value="null">8</option>
								<option value="null">9</option>				
								<option value="null">10</option>								
							</select>
					</div>
				</div>
				<div class="occasional">
					<h5>Tipo :</h5>
					<div class="colr ert">
						<label class="radio"><?php echo $fila['NOM_TIPO'] ?></label>
					</div>
					<div class="clearfix"> </div>
				</div>
				<div class="occasion-cart">
					<div class="shoe single-item single_page_b">
						<form action="../Controlador/controlador_carrito.php?op=1&id=<?php echo $fila['COD_SEA'] ?>" method="POST">						
							<input type="submit" name="submit" value="Agregar al Carrito" class="button add">						
						</form>
					</div>
				</div>
				<ul class="social-nav model-3d-0 footer-social social single_page">
					<li class="share">Share On : </li>
					<li>
						<a href="#" class="facebook">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="twitter">
							<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="instagram">
							<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div>
						</a>
					</li>
					<li>
						<a href="#" class="pinterest">
							<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
						</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"> </div>
			<!--/tabs-->
			<div class="responsive_tabs">
				<div id="horizontalTab">
					<ul class="resp-tabs-list">
						<li>Informacion</li>
						<li>Comentarios</li>
						<li>Especificaciones</li>
					</ul>
					<div class="resp-tabs-container">
						<!--/tab_one-->
						<div class="tab1">
							<div class="single_page">
								<h6><?php echo $fila['NOMBRE']?></h6>
								<p><?PHP echo $fila['DESCRIPCION']?></p>	
							</div>
						</div>
					<?php 
						} 
					?>
						<!--//tab_one-->						
						<div class="tab2" id="tab2">
							<div class="single_page">
								<div class="bootstrap-tab-text-grids">				
									<div class="add-review">
										<h4>Agregar comentario</h4>
										<?php 
											if (isset($_SESSION['usuario'])) {
												$usu = $_SESSION['id'];
											}else{
												$usu = 0;
											}
										?>
										<form action="controlador_coments.php?op=2&id_p=<?php echo $_GET['id'] ?>&id_usu=<?php echo $usu ?>" method="post">
											<p>Escoga una Calificación</p>
											<select class="form-control" name="star">
												<option value="1">1 Estrella</option>
												<option value="2">2 Estrella</option>
												<option value="3">3 Estrella</option>
												<option value="4">4 Estrella</option>
												<option value="5">5 Estrella</option>
											</select>
											<textarea name="comen" required="" placeholder="Mensaje..."></textarea>
											<input type="submit" value="Comentar" >
										</form>
									</div>
									<?php 
										include_once '../Controlador/controlador_comentario.php';

										$arti = 3;
										$totaldb = cantidad($_GET['id']);
										$paginas = $totaldb / 3;
										$paginas = ceil($paginas);									

										$iniciar = ($_GET['pag']-1) * $arti;
										
										$mostrar = listarComenPerso($iniciar, $arti, $_GET['id']);
										foreach($mostrar as $fila){
									?>
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="../images/perfil/<?php echo $fila['FOTO'] ?>" alt=" " class="img-responsive">
										</div>
										<div class="bootstrap-tab-text-grid-right">			
											<ul>
												<li><a href="#"><?php echo $fila['NOM_USU'] ?></a></li>
												<li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Responder</a></li>
											</ul>
											<p><?php echo $fila['COMENTARIO'] ?></p>
										</div>
										<div class="clearfix"></div>
										<div class="rating1">
											<p>Calificación:</p>
											<ul class="stars">											
												<?php 
													for ($i=0; $i < $fila['RATING']; $i++) { 												
														echo '<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>';
													}
													$star = 5 - $fila['RATING'];
													for ($i=0; $i < $star; $i++) { 													
														echo '<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>';
													}
												?>
											</ul>
										</div>
									</div>
									<br><br>
									<?php 
										}
									?>
									<nav aria-label="Page navigation example">
										  <ul class="pagination">										
										    <li class="page-item <?php echo $_GET['pag']<$paginas ? 'disabled' : '' ?>">
										    	<a class="page-link" href="controlador_sneakers.php?op=2&id=<?php echo $_GET['id'] ?>&pag=<?php echo $_GET['pag']-1 ?>">Anterior</a>
										    </li>
											<?php 
												for ($i=0; $i < $paginas; $i++) { 
											?>
										   	<li class="page-item <?php echo $_GET['pag']==$i+1 ? 'active' : '' ?>">
										    	<a class="page-link" href="controlador_sneakers.php?op=2&id=<?php echo $_GET['id'] ?>&pag=<?php echo $i+1; ?>"><?php echo $i+1; ?></a>
										    </li>
										   
											<?php } ?>
										    <li class="page-item <?php echo $_GET['pag']>=$paginas ? 'disabled' : '' ?>">
										    	<a class="page-link" href="controlador_sneakers.php?op=2&id=<?php echo $_GET['id'] ?>&pag=<?php echo $_GET['pag']+1 ?>">Siguiente</a></li>
										  </ul>
									</nav>
								</div>
							</div>
						</div>
						<?php 
							foreach ($datos as $fila) { 
						?>
						<div class="tab3">
							<div class="container">
	                     <table class="table table-striped">
										<tr>
										    <td>MARCA </td>
											<td><?php echo $fila['NOM_MARCA'] ?></td>                                                                   
										</tr>
										<tr>
											<td>TIPO </td>
											<td><?php echo $fila['NOM_TIPO'] ?></td>                                                                   
										</tr>
										<tr>
											<td>GENERO </td>
											<td><?php echo $fila['TIPO_GEN'] ?></td>                                                                   
										</tr>
										<tr>
	                              <td>MATERIAL </td>
	                              <td><?php echo $fila['MATERIAL'] ?></td>                                                                   
	                           </tr>
	                     </table>
	                  </div>
						</div>
						<?php 
							}
						?>
					</div>
				</div>
			</div>
			<!--//tabs-->
			<!-- /new_arrivals -->
			<div class="new_arrivals">
				<h3>Featured Products</h3>
				<!-- /womens -->
				<div class="col-md-3 product-men women_two">
					<div class="product-shoe-info shoe">
						<div class="men-pro-item">
							<div class="men-thumb-item">
								<img src="../images/s4.jpg" alt="">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="single.html" class="link-product-add-cart">Quick View</a>
									</div>
								</div>
								<span class="product-new-top">New</span>
							</div>
							<div class="item-info-product">
								<h4>
									<a href="single.html">Shuberry Heels </a>
								</h4>
								<div class="info-product-price">
									<div class="grid_meta">
										<div class="product_price">
											<div class="grid-price ">
												<span class="money ">$575.00</span>
											</div>
										</div>
										<ul class="stars">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="shoe single-item hvr-outline-out">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="shoe_item" value="Shuberry Heels">
											<input type="hidden" name="amount" value="575.00">
											<button type="submit" class="shoe-cart pshoe-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>

											<a href="#" data-toggle="modal" data-target="#myModal1"></a>
										</form>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 product-men women_two">
					<div class="product-shoe-info shoe">
						<div class="men-pro-item">
							<div class="men-thumb-item">
								<img src="../images/s5.jpg" alt="">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="single.html" class="link-product-add-cart">Quick View</a>
									</div>
								</div>
								<span class="product-new-top">New</span>
							</div>
							<div class="item-info-product">
								<h4>
									<a href="single.html">Red Bellies </a>
								</h4>
								<div class="info-product-price">
									<div class="grid_meta">
										<div class="product_price">
											<div class="grid-price ">
												<span class="money ">$325.00</span>
											</div>
										</div>
										<ul class="stars">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="shoe single-item hvr-outline-out">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="shoe_item" value="Red Bellies">
											<input type="hidden" name="amount" value="325.00">
											<button type="submit" class="shoe-cart pshoe-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>

											<a href="#" data-toggle="modal" data-target="#myModal1"></a>
										</form>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 product-men women_two">
					<div class="product-shoe-info shoe">
						<div class="men-pro-item">
							<div class="men-thumb-item">
								<img src="../images/s7.jpg" alt="">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="single.html" class="link-product-add-cart">Quick View</a>
									</div>
								</div>
								<span class="product-new-top">New</span>
							</div>
							<div class="item-info-product">
								<h4>
									<a href="single.html">Running Shoes</a>
								</h4>
								<div class="info-product-price">
									<div class="grid_meta">
										<div class="product_price">
											<div class="grid-price ">
												<span class="money ">$875.00</span>
											</div>
										</div>
										<ul class="stars">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="shoe single-item hvr-outline-out">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="shoe_item" value="Running Shoes">
											<input type="hidden" name="amount" value="875.00">
											<button type="submit" class="shoe-cart pshoe-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>

											<a href="#" data-toggle="modal" data-target="#myModal1"></a>
										</form>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3 product-men women_two">
					<div class="product-shoe-info shoe">
						<div class="men-pro-item">
							<div class="men-thumb-item">
								<img src="../images/s8.jpg" alt="">
								<div class="men-cart-pro">
									<div class="inner-men-cart-pro">
										<a href="single.html" class="link-product-add-cart">Quick View</a>
									</div>
								</div>
								<span class="product-new-top">New</span>
							</div>
							<div class="item-info-product">
								<h4>
									<a href="single.html">Sukun Casuals</a>
								</h4>
								<div class="info-product-price">
									<div class="grid_meta">
										<div class="product_price">
											<div class="grid-price ">
												<span class="money ">$505.00</span>
											</div>
										</div>
										<ul class="stars">
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a></li>
											<li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a></li>
										</ul>
									</div>
									<div class="shoe single-item hvr-outline-out">
										<form action="#" method="post">
											<input type="hidden" name="cmd" value="_cart">
											<input type="hidden" name="add" value="1">
											<input type="hidden" name="shoe_item" value="Sukun Casuals">
											<input type="hidden" name="amount" value="505.00">
											<button type="submit" class="shoe-cart pshoe-cart"><i class="fa fa-cart-plus" aria-hidden="true"></i></button>
											<a href="#" data-toggle="modal" data-target="#myModal1"></a>
										</form>
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
				</div>
				<!-- //womens -->
				<div class="clearfix"></div>
			</div>
			<!--//new_arrivals-->
		</div>		
<?php
	include 'footer.php';
?>