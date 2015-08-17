<?php session_start();
include_once('model/toebola/cotisations.php');
include_once('constantes.php');
function getCotisation($data_1,$data_2)
{
	$res='';
	for($i=0;$i<count($data_1);$i++)
	{
		$res.=$data_1[$i]=='true'?'1':'0';
	}
	for($i=0;$i<count($data_2);$i++)
	{
		$res.=$data_2[$i]=='true'?'1':'0';
	}
	return $res;
}
function getTotal($mois)
{
	$m=0;
	for($i=0;$i<strlen($mois);$i++)
	{
		if($mois[$i]=='1')
		{
			$m+=500;
		}
	}
	return $m;
}
//json no tokony ho retour ato fa tsy cha�ne de texte tsotra
if(!isset($_SESSION['mail']))
{
	echo '{"isAuthenticated":"false","data":{}}';
}
else
{
	if($_SERVER['REQUEST_METHOD']=='GET')
	{		
		if(isset($_GET['id']))
		{
			if($_GET['id']=='1')
			{
				
			}	
		}		
	}
	else
	{	
		if(isset($_POST['type']))
		{
			if($_POST['type']=='1')
			{
				// 1 midika fakana information cotisation momba user iray
                            $cotis=new Cotisation();
                            $membreData=$cotis->getAll($_POST['id']);
                            $tab=array('isAuthenitcated'=>'true','data'=>array('id'=>$_POST['id'],'data'=>$membreData));
                            echo json_encode($tab);
			}
			else if($_POST['type']=='2')
			{
				//2 midika mampiditra cotisation vaovao
				if(!isset($_POST['data_1']) || !isset($_POST['data_2']))
				{
					echo '{"isAuthenticated":"true","error":{"message":"data error"}}';
					ob_flush();
					exit(0);
				}
				if(strlen($_POST['year'])!=4 || $_POST['year']=='' )
				{
					echo '{"isAuthenticated":"true","error":{"message":"not a year"}}';
					ob_flush();
					exit(0);
				}
				try
				{
					$data_1=explode(",",$_POST['data_1']);
					$data_2=explode(",",$_POST['data_2']);
					$mois=getCotisation($data_1,$data_2);
					$total=getTotal($mois);
					echo $mois.'//'.$total.'<br/>'.isset($_POST['year']);
					$cotis=new Cotisation();					
					$cotis->insert($_POST['id'],$mois,$_POST['year'],$total);
				}
				catch(Exception $e)
				{
					echo '{"isAuthenticated":"true","error":{"message":"'.$e->getMessage().'"}}';
					ob_flush();
				}			
				echo '{"isAuthenticated":"true","inserted":"true"}';
			}
			else
			{
				echo '{"isAuthenticated":"true","data":{}}';
			}
		}
		else
		{
			echo   '{"isAuthenticated":"true","data":{}}';
		}
	}
	
}
?>