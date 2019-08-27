<?php 
	include_once '../Modelo/modelo_rol.php';

	function listar_rol2(){
	    $obj= new modelo_rol();
	    $reg = $obj->listarRol();
	    echo '<select id="idrol" name="idrol" class="form-control option-w3ls" style="padding: 1%;">';
	    	echo '<option selected disabled>Selecione...</option>';
	    foreach ($reg as $fila){		
			echo '<option value="'.$fila['ID_ROL'].'">'.$fila['NOM_ROL'].'</option>';
	    }
	    echo '</select>';
	}

	function listar_rol($rol){
	    $obj= new modelo_rol();
	    $reg = $obj->listarRol();
	    echo '<select id="idrol" name="idrol" class="form-control option-w3ls" style="padding: 1%;">';
	    foreach ($reg as $fila){
 			if ($fila['ID_ROL'] == $rol){
				echo '<option value="'.$fila['ID_ROL'].'" selected >'.$fila['NOM_ROL'].'</option>';
			}else{
				echo '<option value="'.$fila['ID_ROL'].'">'.$fila['NOM_ROL'].'</option>';
			}	
	    }
	    echo '</select>';
	}


	