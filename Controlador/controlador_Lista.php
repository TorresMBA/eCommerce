<?php 
	include_once '../Modelo/modelo_Lista.php';

	function listarTalla(){
		$obj = new Lista();
		$dato = $obj->talla();
		echo '<option disabled selected>Selecione...</option>';
		foreach ($dato as $fila) {			
			echo '<option value='.$fila['ID_TALLA'].'>'.$fila['TALLA'].'</option>';			
		}
	}

	function listarMarca(){
		$obj = new Lista();
		$dato = $obj->marca();
		echo '<option disabled selected>Selecione...</option>';
		foreach ($dato as $fila) {
			echo '<option value='.$fila['ID_MARCA'].'>'.$fila['NOM_MARCA'].'</option>';			
		}
	}

	function listarGenero(){
		$obj = new Lista();
		$dato = $obj->genero();
		echo '<option disabled selected>Selecione...</option>';
		foreach ($dato as $fila) {
			echo '<option value='.$fila['ID_GENERO'].'>'.$fila['TIPO_GEN'].'</option>';
		}
	}

	function listarTipo(){
		$obj = new Lista();
		$dato = $obj->tipo();
		echo '<option disabled selected>Selecione...</option>';
		foreach ($dato as $fila) {
			echo '<option value='.$fila['ID_TIPO'].'>'.$fila['NOM_TIPO'].'</option>';
		}
	}



	
	function listarTalla2($talla){
		$obj = new Lista();
		$dato = $obj->talla();
		foreach ($dato as $fila) {
		echo '<option disabled selected>Selecione...</option>';					
			if ($fila['TALLA']== $talla){
				echo '<option value="'.$fila['ID_TALLA'].'" selected >'.$fila['TALLA'].'</option>';
			}else{
				echo '<option value="'.$fila['ID_TALLA'].'">'.$fila['TALLA'].'</option>';
			}
		}
	}

	function listarMarca2($marca){
		$obj = new Lista();
		$dato = $obj->marca();
		foreach ($dato as $fila) {	
		echo '<option disabled selected>Selecione...</option>';	
			if ($fila['NOM_MARCA']== $marca){
				echo '<option value="'.$fila['ID_MARCA'].'" selected >'.$fila['NOM_MARCA'].'</option>';
			}else{
				echo '<option value="'.$fila['ID_MARCA'].'">'.$fila['NOM_MARCA'].'</option>';
			}		
		}
	}

	function listarGenero2($genero){
		$obj = new Lista();
		$dato = $obj->genero();
		foreach ($dato as $fila) {
			echo '<option disabled selected>Selecione...</option>';
			if ($fila['TIPO_GEN']== $genero){
				echo '<option value="'.$fila['ID_GENERO'].'" selected >'.$fila['TIPO_GEN'].'</option>';
			}else{
				echo '<option value="'.$fila['ID_GENERO'].'">'.$fila['TIPO_GEN'].'</option>';
			}
		}
	}

	function listarTipo2($tipo){
		$obj = new Lista();
		$dato = $obj->tipo();
		foreach ($dato as $fila) {
			echo '<option disabled selected>Selecione...</option>';
			if ($fila['NOM_TIPO']== $tipo){
				echo '<option value="'.$fila['ID_TIPO'].'" selected >'.$fila['NOM_TIPO'].'</option>';
			}else{
				echo '<option value="'.$fila['ID_TIPO'].'">'.$fila['NOM_TIPO'].'</option>';
			}
		}
	}
?>