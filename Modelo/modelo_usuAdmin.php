<?php 
	class Admin{
		private $id;
		private $id_rol;
		private $nom;
		private $ape; 
		private $mail;
		private $cel;
		private $dirrecion;
		private $usu;
		private $pass;
		private $est;

		private $db;
		private $lista;

		public function __construct(){
			include_once 'Conexion.php';
			$this->db = Conexion::conectar();
			$this->lista = array();
		}

		public function getId_rol(){
			return $this->id_rol;
		}

		public function getId(){
			return $this->id;
		}

		public function getNom(){
			return $this->nom;
		}

		public function getApe(){
			return $this->ape;
		}

		public function getMail(){
			return $this->mail;
		}

		public function getCel(){
			return $this->cel;
		}

		public function getDirrecion(){
			return $this->dirrecion;
		}

		public function getUsu(){
			return $this->usu;
		}

		public function getPass(){
			return $this->pass;
		}

		public function getEst(){
			return $this->est;
		}

		public function setId($id){
			$this->id = $id;
		}

		public function setNom($nom){
			$this->nom = $nom;
		}

		public function setApe($ape){
			$this->ape = $ape;
		}

		public function setMail($mail){
			$this->mail = $mail;
		}

		public function setCel($cel){
			$this->cel = $cel;
		}

		public function setDirrecion($dirrecion){
			$this->dirrecion = $dirrecion;
		}

		public function setUsu($usu){
			$this->usu = $usu;
		}

		public function setPass($pass){
			$this->pass = $pass;
		}

		public function setEst($est){
			$this->est= $est;
		}

		public function setId_rol($id_rol){
			$this->id_rol = $id_rol;
		}

		public function insertarUsu(){
			$sql = "CALL INSERTARUSUADMIN (?,?,?,?,?,?,?,?,?)";
			$dato = $this->db->prepare($sql);
			$dato->bindParam(1, $this->id_rol);
			$dato->bindParam(2, $this->nom);
			$dato->bindParam(3, $this->ape);
			$dato->bindParam(4, $this->mail);
			$dato->bindParam(5, $this->cel);
			$dato->bindParam(6, $this->dirrecion);
			$dato->bindParam(7, $this->usu);
			$dato->bindParam(8, $this->pass);
			$dato->bindParam(9, $this->est);
			$dato->execute();
		}

		public function editarUsu($id){
			$sql = "CALL EDITARUSUARIO ('".$id."')";
			$reg = $this->db->query($sql);
            while ($fila = $reg->fetch(PDO::FETCH_ASSOC) ){
                $this->lista[] = $fila;
            }
            return $this->lista;
		}

		public function actualizarUsu(){
	        $sql = "CALL ACTUALIZARUSUARIOADMIN(?,?,?,?,?,?,?,?,?,?)";
	        $dato = $this->db->prepare($sql);
	        $dato->bindParam(1, $this->id);
	        $dato->bindParam(2, $this->id_rol);
	        $dato->bindParam(3, $this->nom);
			$dato->bindParam(4, $this->ape);
			$dato->bindParam(5, $this->mail);
			$dato->bindParam(6, $this->cel);
			$dato->bindParam(7, $this->dirrecion);
			$dato->bindParam(8, $this->usu);
			$dato->bindParam(9, $this->pass);
			$dato->bindParam(10, $this->est);
	        $dato->execute();
	    }    
	}	
?>