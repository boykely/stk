<?php
session_start();
include_once('Utils.php');
$uri=Utils::getRequestUri();
$method=Utils::getMethodForm();

if($method=='GET')
{
	$url=NULL;//ce variable n'est pas encore utilisé dans ce code mais peut être utilisé dans le future
	if(isset($_GET['origin']))
	{
		$url=urldecode($_GET['origin']);
			
	}
	if($uri=='/stk/login.php')
	{
		//cas où l'on est déjà connecté
		if(isset($_SESSION['mail']))
		{
			header('Location:/');
		}
		include_once('vue/login/login.php');
	}
	else
	{
		//pour la deconnexion: /stk/login.php?l_out=quit
		if(isset($_GET['l_out']))
		{
			if($_GET['l_out']=='quit')
			{
				session_destroy();
				$log_out=true;
				include_once('vue/login/login.php');
			}
			else
			{
				if(isset($_SESSION['mail']))
				{
					header('Location:/stk');
				}
				include_once('vue/login/login.php');
			}
		}		
		else
		{
				if(isset($_SESSION['mail']))
				{
					header('Location:/stk');
				}
			include_once('vue/login/login.php');
		}
	}
}
else
{
	//Méthode POST
	$bdd=Utils::BdConnex();
	if(isset($bdd))
	{
		$mail=$_POST['mail'];
		$pass=$_POST['pass'];
		$origin=$_POST['origin'];
		$req=$bdd->prepare('select * from admin where mail=:mail and pass=:pass');
		$req->execute(array('mail'=>strtolower($mail),'pass'=>$pass));
		$record=$req->fetch();		
		//var_dump($record);
		if($record!=false)
		{
			//echo $record['mail'].'=>'.$record['pass'];			
			$req->closeCursor();
			$_SESSION['mail']=$record['mail'];
			if(isset($origin))
				header('Location:'.$origin);
			else
				header('Location:/stk');
			
		}
		else
		{
			//ces variables sont utilisés dans la vue pour afficher une erreur
			$log_error=true;
			$log_mail=$mail;
			include_once('vue/login/login.php');
		}
	}	
}
?>
