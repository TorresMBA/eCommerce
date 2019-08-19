<?php
	class modelo_sneakers{
		private $id;

		private $db;
		private $zapatilla;

		public function __construct(){
			require_once 'Conexion.php';
			$obj = new Conexion();
			$this->db = $obj->conectar();
			$this->zapatilla = array();
		}

		public function listar_calzado(){
			$sql = $this->db->query("SELECT * FROM calzado");
			while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
				$this->zapatilla[] = $fila;
			}
			return $this->zapatilla;
		}

		public function detalles_calzado($id){
			$sql = $this->db->query('SELECT * FROM CALZADO WHERE COD_SEA = '.$id);
			while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
				$this->zapatilla[] = $fila;
			}
			return $this->zapatilla;
		}
	}
?>