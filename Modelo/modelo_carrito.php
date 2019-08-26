<?php
    class modelo_carrito{
        private $db;
        private $carrito;

        public function __construct(){
            include_once 'Conexion.php';
            $this->db = Conexion::conectar();
            $this->carrito  = array();
        }

        public function listarCarrito($id){
            $sql = "CALL LISTARCALZADO('".$id."')";
            $reg = $this->db->query($sql);
            while ($fila = $reg->fetch(PDO::FETCH_ASSOC)) {
                $this->carrito[] = $fila;
            }
            return $this->carrito;
        }
    }

?>