<?php 
	include_once '../Modelo/modelo_rol.php';

	function listar_rol(){
	    $obj= new modelo_rol();
	    $reg = $obj->listarRol();
	    echo '<select id="idrol" name="idrol" class="form-control" >';
	    foreach ($reg as $fila){
?>
	        <option value="<?php echo $fila['ID_ROL'] ?>"><?php echo $fila['NOM_ROL'] ?></option>
<?php 
	    }
	    echo '</select>';
	}
