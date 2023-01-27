<?php
abstract class Conexao {

	const USER = "u290548490_root";
	const PASS = "@Cdlj4401@#";

	private static $instance = null;

	private static function conectar() {

		try {
			if (self::$instance == null):
				$dsn = "mysql:host=127.0.0.1:3306;dbname=u290548490_resin";
				self::$instance = new PDO($dsn, self::USER, self::PASS);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			endif;
		} catch (PDOException $e) {
			echo "Erro: " . $e->getMessage();
		}
		return self::$instance;
	}

	protected static function getDB() {
		return self::conectar();
	}
}

?>
