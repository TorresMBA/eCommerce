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
			$sql = $this->db->query("CALL LISTARCALZADO");
			while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
				$this->zapatilla[] = $fila;
			}
			return $this->zapatilla;
		}

		public function listarCalzadoVista(){
			$sql = $this->db->query("CALL LISTARVISTACALZADO");
			while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
				$this->zapatilla[] = $fila;
			}
			return $this->zapatilla;
		}

		public function detalles_calzado($id){
			$sql = $this->db->query('CALL LISTARCALZADO("'.$id.'")');
			while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
				$this->zapatilla[] = $fila;
			}
			return $this->zapatilla;
		}
	}
?>