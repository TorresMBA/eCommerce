<?php 
	class Usuario{
		private $id;
		private $nom;
		private $ape; 
		private $mail;
		private $cel;
		private $dirrecion;
		private $usu;
		private $pass;

		private $db;
		private $lista;

		public function __construct(){
			include 'Conexion.php';
			$this->db = Conexion::conectar();
			$this->lista = array();
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

		public function listarUsu(){
			$sql = $this->db->query("CALL LISTARUSUARIO");
			while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) {
				$this->lista[] = $fila;
			}
			return $this->lista;
		}

		public function insertarUsu(){
			$sql = "CALL INSERTARUSUARIOS (?,?,?,?,?,?,?)";
			$dato = $this->db->prepare($sql);
			$dato->bindParam(1, $this->nom);
			$dato->bindParam(2, $this->ape);
			$dato->bindParam(3, $this->mail);
			$dato->bindParam(4, $this->cel);
			$dato->bindParam(5, $this->dirrecion);
			$dato->bindParam(6, $this->usu);
			$dato->bindParam(7, $this->pass);
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

		public function validarUsu($nom, $cla){
	        $sql = "CALL VALIDARLOGIN('".$nom."','".$cla."')";        
	        $login = $this->db->query($sql);
	        while ($fila = $login->fetch(PDO::FETCH_ASSOC)){
	            $this->lista[] =  $fila;
	        }
	        return $this->lista;
    	}

    	public function eliminarUsu(){
    		$sql = "CALL ELIMINARUSUARIO (?)";
            $sentencia = $this->db->prepare($sql);                
            $sentencia->bindParam(1, $this->id);
            $sentencia->execute();
    	}
	}
?>