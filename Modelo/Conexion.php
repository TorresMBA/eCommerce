<?php
	class Conexion{
		public static function conectar(){
			try{
				$cn = new PDO('mysql:host=localhost; dbname=market', "root", "");
				$cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$cn->exec('SET CHARACTER SET UTF8');
			}catch(Exception $e){
				echo 'Linea de Error: '. $e->getLine()."<br>";
				echo 'Erro:'.$e->getMessage();
			}
			return $cn;
		}
	}
?>