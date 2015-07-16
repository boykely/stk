<?php
class Membre{
private $bd;
private $records; 
public $rows;
public static function BdConnex()
	{
		try
		{
			return new PDO(CONNEX_STRING,DB_USER,DB_PASS);
		}
		catch(Exception $e)
		{
			return Null;		
		}		
	}
public function __construct(){
	//on doit connaitre en avance le nombre total de membres	
	$this->getRowsCount();
}
public function closeConnection(){
	$this->records->closeCursor();
	$this->bd=Null;
}
private function getRowsCount(){
	
	try{
		
		$this->bd=new PDO(CONNEX_STRING,DB_USER,DB_PASS);
		$this->records=$this->bd->query('select count(*) from MEMBRES');
		$a=$this->records->fetch();
		$this->rows=$a[0];
		$this->closeConnection();		
	}
	catch(Exception $message){		
		return Null;
	}	
}
public function getAll(){
	try{
		$this->bd=new PDO(CONNEX_STRING,DB_USER,DB_PASS);
		$this->records=$this->bd->query('select * from MEMBRES order by NOM ASC,PRENOM ASC ');		
		return $this->records;
	}
	catch(Exception $message){
		return Null;
	}	
}
public function getSample($start,$size){
	try{
		$this->bd=new PDO(CONNEX_STRING,DB_USER,DB_PASS);
		$this->records=$this->bd->query('select * from MEMBRES order by NOM ASC,PRENOM ASC limit '.$size.' offset '.$start);
		return $this->records;
	}
	catch(Exception $message){
		return Null;
	}
}
}
?>