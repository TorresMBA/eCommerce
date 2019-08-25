<?php include_once 'header.php'; ?>
<div class="shop_inner_inf">
    <div class="checkout-right">
					<h4>Your shopping cart contains: <span>3 Products</span></h4>
					<table class="timetable_sub">
						<thead>
							<tr>
								<th>ID</th>
                                <th>NOMBRE</th>
                                <th>FOTO</th>
								<th>MARCA</th>
								<th>PRECIO NORMAL</th>
								<th>PRECIO OFERTA</th>
                                <th>DESCRIPCION</th>
                                <th>TALLA</th>
                                <th>TIPO</th>
                                <th>GENERO</th>
                                <th>MATERIAL</th>
                                <th colspan="2">ACCIONES</th>
							</tr>
						</thead>
						<tbody>
                            <?php 
                                foreach($dato as $filas){
                            ?>
							<tr class="rem1">
                                <td class="invert"><?php echo $filas['COD_SEA'] ?></td>
                                <td class="invert"><?php echo $filas['NOMBRE'] ?></td>
                                <td class="invert-image"><a href="single.html"><img src="../images/img/<?php echo $filas['FOTO1'] ?>" width="50" height="50" alt=" " class="img-responsive"></a></td>
                                
								<td class="invert"><?php echo $filas['NOM_MARCA'] ?></td>
								
                                <td class="invert"><?php echo $filas['PRECIO_NORMAL'] ?></td>
                                <td class="invert"><?php echo $filas['PRECIO_OFERTA'] ?></td>
                                <td class="invert">
                                    <textarea rows="6" cols="30" disabled><?php echo $filas['DESCRIPCION'] ?></textarea>
                                </td>
                                <td class="invert"><?php echo $filas['TALLA'] ?></td>
                                <td class="invert"><?php echo $filas['NOM_TIPO'] ?></td>
                                <td class="invert"><?php echo $filas['TIPO_GEN'] ?></td>
                                <td class="invert"><?php echo $filas['MATERIAL'] ?></td>
                                <td><a href="../Controlador/controlador_producto.php?op=4&id=<?php echo $filas['COD_SEA'] ?>">Editar</a></td>	
                                <td><a href="../Controlador/controlador_producto.php?op=5&id=<?php echo $filas['COD_SEA'] ?>">Eliminar</a></td>		
                            </tr>
                            <?php 
                                }
                            ?>
						</tbody>
					</table>
                </div>
    </div>
<?php include_once 'footer.php'; ?>