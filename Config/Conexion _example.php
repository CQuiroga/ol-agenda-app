<?php

class  Db{
		
	public static function conectar(){

      $baseDatos = '';
	  $servidor = '';
      $usuario = '';
      $pass = '';
	  $port = '';

		try {
			$pdo = new PDO("mysql:host=$servidor;dbname=$baseDatos;port=$port", $usuario, $pass);      
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $pdo;
		} catch(PDOException $e) {
			error_log("Error de conexión: " . $e->getMessage());
			return null;
		}
	}		
}

?>