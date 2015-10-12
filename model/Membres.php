<?php
class Membre{
public $id;
public $nom;
public $prenom;
public $ages;
public $integration;
public $contact;
public $bureau;

public function __construct(){
	
}
public function setMembre(){
	try{
	
	}
	catch(Exception $message){
		return null;
	}
}
public function getAll(){
	try{
		$bd=new PDO(CONNEX_STRING,DB_USER,DB_PASS);
		$records=$bd->query('select * from MEMBRES');
		return $records;
	}
	catch(Exception $message){
		return null;
	}
	
}
}
?>