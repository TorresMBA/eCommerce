<?php 
	class Lista{
		private $db;
		private $dato;

		public function __construct(){
			include_once 'Conexion.php';
			$this->db = Conexion::conectar();
			$this->dato = array();
		}

		public function marca(){
			$sql = $this->db->query("SELECT * FROM MARCA");
			while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
				$this->dato[] = $fila;
			}
			return $this->dato;
		}

		public function talla(){
			$sql = $this->db->query("SELECT * FROM TALLA");
			while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
				$this->dato[] = $fila;
			}
			return $this->dato;
		}

		public function tipo(){
			$sql = $this->db->query("SELECT * FROM TIPO");
			while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
				$this->dato[] = $fila;
			}
			return $this->dato;
		}

		public function genero(){
			$sql = $this->db->query("SELECT * FROM GENERO");
			while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
				$this->dato[] = $fila;
			}
			return $this->dato;
		}
	}
?>