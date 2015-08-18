<?php

	class Cotisation{
	private $bd;
	private $records; 
	public $rows;
	public function __construct()
	{
		$this->bd=new PDO(CONNEX_STRING,DB_USER,DB_PASS);		
	}
	public function closeConnection(){
		$this->records->closeCursor();
		$this->bd=Null;
	}
	public function getAll($id){	
            /*For best user performance we will limit result to 5 only*/
                
		$cmd=$this->bd->prepare('select ID_MEMBRE,ANNEE,MOIS,TOTAL from cotisations where ID_MEMBRE=:id_membre limit 0,'.LimitCotisation);
		$cmd->execute(array('id_membre'=>$id));
                $tab=array();
		while($record=$cmd->fetch())
                {
                    $item=array('id'=>$id,'data'=>array('annee'=>$record['ANNEE'],'mois'=>$record['MOIS']));  
                    $tab[]=$item;
                }
                $cmd->closeCursor();
		return $tab;
	}        
	public function insert($membre,$mois,$annee,$total)
	{		
		try
		{
			$req='';
			if($this->checkCotis($membre,$annee,$total))
			{
				$req='update cotisations set mois=:mois,total=:total where id_membre=:membre and annee=:annee';
			}
			else
			{
				$req='insert into cotisations (id_membre,annee,mois,total) values (:membre,:annee,:mois,:total)';
			}			
			$cmd=$this->bd->prepare($req);
			$cmd->execute(array('mois'=>$mois,'annee'=>$annee,'membre'=>$membre,'total'=>$total));
			$cmd->closeCursor();			
			return true;
		}
		catch(Exception $e)
		{			
			return false;
		}
			
	}
	public function checkCotis($membre,$annee)
	{
			$req='select count(*) from cotisations where id_membre=:id and annee=:annee';
			$cmd=$this->bd->prepare($req);
			$cmd->execute(array('id'=>$membre,'annee'=>$annee));
			$record=$cmd->fetch();
			$record=$record[0];
			$cmd->closeCursor();			
			return $record!='0'?true:false;
	}
}
?>