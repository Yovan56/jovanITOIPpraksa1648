<?php
require_once __DIR__ . "/../config.php";
require_once __DIR__ . "/../includes/Database.php";
//use ../includes/Database/Database as Database;
class Mejl{
 	public $id;
 	public $ime;
 	public $prezime;
 	public $naslov;
 	public $mejl;
 	public $poruka;
 	
 	public static function insertMejl($ime,$prezime,$naslov,$mejl,$poruka){
 		$db = Database::getInstance();
 		$query = "INSERT INTO mejl (ime,prezime,naslov,mejl,poruka) VALUES (:ime,:prezime,:naslov,:mejl,:poruka)";
 		$params = [
 			':ime'=> $ime,
 			':prezime' => $prezime,
 			':naslov' => $naslov,
 			':mejl' => $mejl,
 			':poruka' => $poruka,
 			
 		];
 		
 		$db -> insert("mejl",$query,$params);
 	}
 	

 	
 }