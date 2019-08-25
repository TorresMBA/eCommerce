<?php include_once 'header.php'; ?>
    <div class="ads-grid_shop">
		<div class="shop_inner_inf">
			<h3 class="head">Modificar Productos</h3>
			<p class="head_para">Agregar todos los campos</p>
			<div class="inner_section_w3ls" >
				<div class="col-md-7 contact_grid_right ">
                    <h6>Actualizar Producto</h6>
                    <?php 
                                    foreach($datos as $fila){
                                ?>	
					<form action="../Controlador/controlador_producto.php?op=6" method="post">
						<div class="col-md-6 col-sm-6 contact_left_grid">	
                        		
							<table class="table table-hover ">
                               
                                <tr>
                                    <td>ID:</td>
                                    <td><input type="text" name="id"  value="<?php echo $fila['COD_SEA'] ?>" readonly="" ></td>
                                </tr>
								<tr>
									<td>Nombre</td>
									<td><input type="text" name="Name"  required="" value="<?php echo $fila['NOMBRE'] ?>" ></td>
								</tr>
								<tr>
									<td>Marca</td>
									<td>
										<select class="form-control" name="marca">
											<?php 
												include_once '../Controlador/controlador_Lista.php'; 
												listarMarca2($fila['NOM_MARCA']);
											?>
										</select>
									</td>
									
								</tr>
								<tr>
									<td>Precio Normal</td>
									<td><input type="text" name="precioN" value="<?php echo $fila['PRECIO_NORMAL'] ?>" required=""></td>
								</tr>
								<tr>
									<td>Precio De Oferta</td>
									<td><input type="text" name="precioO" value="<?php echo $fila['PRECIO_OFERTA'] ?>" required=""></td>
								</tr>
								<tr>
									<td>Descripcion</td>
									<td>
										<textarea class="form-control" name="desc" rows="5" value=""><?php echo $fila['DESCRIPCION'] ?></textarea>
									</td>
								</tr>
								<tr>
									<td>Talla</td>
									<td>
										<select class="form-control" name="talla">
											<?php 
												include_once '../Controlador/controlador_Lista.php'; 
												listarTalla2($fila['TALLA']);
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Tipo</td>
									<td>
										<select class="form-control" name="tipo">
											<?php 
												include_once '../Controlador/controlador_Lista.php'; 
												listarTipo2($fila['NOM_TIPO']);
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Genero</td>
									<td>
										<select class="form-control" name="genero">
											<?php 
												include_once '../Controlador/controlador_Lista.php'; 
												listarGenero2($fila['TIPO_GEN']);
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td>Material</td>
									<td><input type="text" name="material" value="<?php echo $fila['MATERIAL'] ?>"  required=""></td>
                                </tr>
                                
                            </table>
                           
                            <br>
							<input type="submit" value="Actualizar">		
						</div>					
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