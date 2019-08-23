<?php 
	Class modelo_rol{
		private $db;
    	private $rol;

		function __construct() {
	        include_once 'Conexion.php';
	        $this->db = Conexion::conectar();
	        $this->labo = array();
	    }
	    
	    public function listarRol(){
	        $reg = $this->db->query ("SELECT * FROM ROL");
	        
	        while ($fila = $reg->fetch(PDO::FETCH_ASSOC)){
	            $this->rol[] =  $fila;
	        }
	        return $this->rol;
	    }
	}
?>