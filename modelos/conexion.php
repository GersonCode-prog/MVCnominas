<?php
class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=localhost;dbname=gestionnomina",
			            "root",
			            "");

		$link->exec("set names utf8");

		return $link;

	}

}		

/*class Conexion{

	static public function conectar(){

		$link = new PDO("mysql:host=server0751.hostilimitado.com;dbname=nominass_gesnomina",
			            "nominass_caguila",
			            "~^eGP96^3@BK");

		$link->exec("set names utf8");

		return $link;

	}

}*/		
