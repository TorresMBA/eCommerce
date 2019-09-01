<?php 
 class modelo_comentario{
 	private $id_usu;
 	private $id_prod;
 	private $comentario;
 	private $star;

 	private $db;
 	private $coments;

 	public function __construct(){
 		include_once 'Conexion.php';
 		$this->db = Conexion::conectar();
 		$this->coments = array();
 	}

 	public function setIdUsu($usu){	
 		$this->id_usu = $usu;
 	}

 	public function setIdProd($prod){	
 		$this->id_prod = $prod;
 	}

 	public function setComentario($comen){	
 		$this->comentario = $comen;
 	}

 	public function setStar($star){	
 		$this->star = $star;
 	}

 	public function listarComentarios($prod){
 		$sql = $this->db->query('CALL LISTARCOMENTARIOS("'.$prod.'")');
 		while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) { 
 			$this->coments[] = $fila;
 		}
 		return $this->coments;
 	}

 	public function listarComentarios2($prod){
 		$sql = "CALL LISTARCOMENTARIOS(?)";
 		$dato = $this->db->prepare($sql);
 		$dato->BindParam(1, $this->id_prod);
 		$dato->execute();
 		$cants = $dato->fetchAll();
 		$regis = count($cants);
 		$cant = $dato->rowCount();
 		return $regis;
 	}

 	public function insertarComentario(){
 		$sql = "CALL INSERTARCOMENTARIO(?,?,?,?)";
 		$insertar = $this->db->prepare($sql);
 		$insertar->BindParam(1, $this->id_usu);
 		$insertar->BindParam(2, $this->id_prod);
 		$insertar->BindParam(3, $this->comentario);
 		$insertar->BindParam(4, $this->star);
 		$insertar->execute();
 	}
 	
 	public function cantComen($id){
 		$sql = 'SELECT * FROM COMENTARIO WHERE COD_SEA ="'.$id.'"  ';
 		$ejecutar = $this->db->prepare($sql);
 		$ejecutar->execute();
 		$total = $ejecutar->rowCount();
 		return $total;
 	}

 	public function listarComenPerso($iniciar, $narticulos, $id){
 		$sql = $this->db->query('CALL LISTARCOMENLIMIT("'.$iniciar.'", "'.$narticulos.'", "'.$id.'")  ');
 		while ($fila = $sql->fetch(PDO::FETCH_ASSOC)) { 
 			$this->coments[] = $fila;
 		}
 		return $this->coments;
 	}
}
?>