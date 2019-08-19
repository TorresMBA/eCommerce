<?php
	class Usuario{
		private $nom;
		private $ape;
		private $db;

		public function __construct(){
			include 'Conexion.php';
			$obj = new Conexion();
			$this->db = $obj->conectar();
			session_start();
		}

		public function setCurrentUser($user){
			$_SESSION['user'] = $user;
		}	

		public function getCurrentUser(){
			return $_SESSION['user'];
		}

		public function closeSession(){
			session_unset();
			session_destroy();
		}

		public function userExist($user, $pass){
			$md5 = md5($pass);
			$sql = $this->db->prepare('SELECT * FROM LOGIN WHERE NOM_USU = :USER AND PASS = :PASS');
			$sql->execute(['USER' => $user, 'PASS' => $pass]);

			if ($sql->rowCount()) {
				return true;
			}else{
				return false;
			}
		}

		public function setUser($user){
			$sql = $this->db->prepare('SELECT * FROM LOGIN WHERE NOM_USU = :USER');
			$sql->execute(['USER' => $user]);
			foreach ($sql as $key) {
				$this->nom = $key['NOMBRE'];
				$this->ape = $key['APELLIDO'];
			}
		}

		public function geNom(){
			return $this->nom;
		}
	}

?>