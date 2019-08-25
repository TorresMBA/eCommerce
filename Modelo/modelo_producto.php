<?php 
	class modelo_producto{
		private $idCalzado;
		private $nom;
		private $marca;
		private $precioN;
		private $precioO;
		private $desc;
		private $talla;
		private $tipo;
		private $genero;
		private $mat;
		private $foto1;
		private $foto2;
		private $foto3;
		private $foto4;

		private $db;
		private $producto;

		public function __construct(){
			include_once 'Conexion.php';
			$this->db = Conexion::conectar();
			$this->producto = array();
		}

		public function getIdCalzado(){
			return $this->idCalzado;
		}

		public function setIdCalzado($id){
			$this->idCalzado = $id;
		}

		public function getNom()
		{
			return $this->nom;
		}

		public function setNom($nom)
		{
			$this->nom = $nom;
		}
	
		public function getMarca()
		{
		    return $this->marca;
		}

		public function setMarca($marca)
		{
		    $this->marca = $marca;
		}

		public function getPrecioN()
		{
		    return $this->precioN;
		}

		public function setPrecioN($precioN)
		{
		    $this->precioN = $precioN;

		}

		public function getPrecioO()
		{
		    return $this->precioO;
		}

		public function setPrecioO($precioO)
		{
		    $this->precioO = $precioO;
		}

		public function getDesc()
		{
		    return $this->desc;
		}

		public function setDesc($desc)
		{
		    $this->desc = $desc;
		}

		public function getTalla()
		{
		    return $this->talla;
		}

		public function setTalla($talla)
		{
		    $this->talla = $talla;
		}

		public function getTipo()
		{
		    return $this->tipo;
		}

		public function setTipo($tipo)
		{
		    $this->tipo = $tipo;

		}

		public function getGenero()
		{
		    return $this->genero;
		}

		public function setGenero($genero)
		{
		    $this->genero = $genero;
		}

		public function getMat()
		{
		    return $this->mat;
		}

		public function setMat($mat)
		{
		    $this->mat = $mat;
		}

		public function getFoto1()
		{
			return $this->foto1;
		}

		public function setFoto1($foto1)
		{
			$this->foto1 = $foto1;
			return $this;
		}

		public function getFoto2()
		{
		    return $this->foto2;
		}

		public function setFoto2($foto2)
		{
		    $this->foto2 = $foto2;
		    return $this;
		}

		public function getFoto3()
		{
		    return $this->foto3;
		}

		public function setFoto3($foto3)
		{
		    $this->foto3 = $foto3;
		    return $this;
		}

		public function getFoto4()
		{
		    return $this->foto4;
		}

		public function setFoto4($foto4)
		{
		    $this->foto4 = $foto4;
		    return $this;
		}

		public function listarProducto(){
			$sql = $this->db->query("CALL LISTARCALZADOALL()");
			while($fila = $sql->fetch(PDO::FETCH_ASSOC)){
				$this->producto[] = $fila;
			}
			return $this->producto;
		}

		public function insertarProducto(){
			$sql = "CALL INSERTARCALZADO(?,?,?,?,?,?,?,?,?)";
			$prod = $this->db->prepare($sql);
			$prod->bindParam(1, $this->nom);
			$prod->bindParam(2, $this->marca);
			$prod->bindParam(3, $this->precioN);
			$prod->bindParam(4, $this->precioO);
			$prod->bindParam(5, $this->desc);
			$prod->bindParam(6, $this->talla);
			$prod->bindParam(7, $this->tipo);
			$prod->bindParam(8, $this->genero);
			$prod->bindParam(9, $this->mat);
			$prod->execute();
		}

		public function ultimoRegistro(){
			$sql = $this->db->query("SELECT COD_SEA, NOMBRE FROM CALZADO ORDER BY COD_SEA DESC LIMIT 1");
			while($fila = $sql->fetch(PDO::FETCH_ASSOC)){
				$this->producto[] = $fila;
			}
			return $this->producto;
		}
		
		public function ingresarImg(){
			$sql = "CALL INSERTARIMG(?,?,?,?,?)";
			$ingr = $this->db->prepare($sql);
			$ingr->bindParam(1, $this->idCalzado);
			$ingr->bindParam(2, $this->foto1);
			$ingr->bindParam(3, $this->foto2);
			$ingr->bindParam(4, $this->foto3);
			$ingr->bindParam(5, $this->foto4);
			$ingr->execute();
		}

		public function editarProducto($id){
			$sql = $this->db->query("CALL EDITARPRODUCTO('".$id."')");
			while($fila = $sql->fetch(PDO::FETCH_ASSOC)){
				$this->producto[] = $fila;
			}
			return $this->producto;
		}

		public function actualizarProducto(){
			$sql = "CALL ACTUALIZARPRODUCTO(?,?,?,?,?,?,?,?,?,?)";
			$prod = $this->db->prepare($sql);
			$prod->bindParam(1, $this->idCalzado);
	        $prod->bindParam(2, $this->nom);
			$prod->bindParam(3, $this->marca);
			$prod->bindParam(4, $this->precioN);
			$prod->bindParam(5, $this->precioO);
			$prod->bindParam(6, $this->desc);
			$prod->bindParam(7, $this->talla);
			$prod->bindParam(8, $this->tipo);
			$prod->bindParam(9, $this->genero);
			$prod->bindParam(10, $this->mat);
	        $prod->execute();
		}

		public function eliminarProducto(){
			$sql = "CALL ELIMINARPRODUCTO(?)";
			$del = $this->db->prepare($sql);
			$del->bindParam(1, $this->idCalzado);
			$del->execute();
		}
	}