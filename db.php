<?php session_start();
include_once('model/toebola/cotisations.php');
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
			}
			else
			{
				echo '{"isAuthenticated":"true","data":{}}';
			}
		}
		else
		{
			echo 'Autre type à gerer';
		}
	}
	
}
?>