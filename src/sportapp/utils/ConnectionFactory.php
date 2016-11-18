<?php
namespace sportapp\utils;

class ConnectionFactory{
private static $config;
private static $db;

	public static function setConfig($nom_fichier){
		self::$config = parse_ini_file($nom_fichier);
	}

	public static function makeConnection(){
		if(is_null(self::$db)){
			self::setConfig('conf/config.ini');
			$dsn = "mysql:host=".self::$config['host'].";dbname=".self::$config['dbname'].";charset=".self::$config['charset'];

			try {
				   /* Créer une instance de PDO (une connexion) */
				   self::$db = new \PDO($dsn, self::$config['user'], self::$config['pass']);
			} catch(PDOException $e) {
				   /* Erreur de connexion */
				   echo "Connection error: $dsn".$e->getMessage();
				   exit;
			}
		}
		return self::$db;
	}

}
