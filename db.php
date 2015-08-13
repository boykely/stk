<?php session_start();
include_once('model/toebola/cotisations.php');
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
//json no tokony ho retour ato fa tsy chaîne de texte tsotra
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
				echo '{"isAuthenticated":"true","data":{'.
				'"id":"'.$_POST['id'].'","data":[]'.
				'}}';
			}
			else if($_POST['type']=='2')
			{
				//2 midika mampiditra cotisation vaovao
				if(!isset($_POST['data_1']) || !isset($_POST['data_2']))
				{
					echo '{"isAuthenticated":"true","data":{}}';
					ob_flush();
				}
				if(!isset($_POST['year']) || !isset($_POST['date']))
				{
					echo '{"isAuthenticated":"true","data":{}}';
					ob_flush();
				}
				$data_1=explode(",",$_POST['data_1']);
				$data_2=explode(",",$_POST['data_2']);
				$mois=getCotisation($data_1,$data_2);
				echo $mois;
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