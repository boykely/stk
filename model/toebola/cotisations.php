<?php
include_once('constantes.php');
	class Cotisation{
	private $bd;
	private $records; 
	public $rows;
	public function closeConnection(){
		$this->records->closeCursor();
		$this->bd=Null;
	}
	public function getAll($id){
		$this->bd=new PDO(CONNEX_STRING,DB_USER,DB_PASS);
		$req=$this->bd->prepare('select ID,ANNEE,MOIS,TOTAL from cotisations where ID_MEMBRE=:id_membre');
		$req->execute(array('id_membre'=>$id));
		$this->records=$req;
		return $this->records;
	}
}
?>