<?php
//Inclusion du model Membre
include_once('model/Mpikambana/Membres.php');
include_once('Utils.php');
$data;
/*Ici on va utiliser fonctions membres d'un objet Membre inclus dans Membres.php*/

/* Le controlleur manampy gerera 3 vue distincte:
cas 1: traitement du requête "lisitra mpikambana"
cas 2: traitement du requête "hanova mpikambana"
cas 3: traitement du requête "manampy mpikambana"
*/
if($_SERVER["REQUEST_METHOD"]=="GET")
{	
	if(isset($_GET["case"]))
	{
		if($_GET["case"]=="1")
		{
			//on utilisera le controlleur pour prendre les listes des membres
			$m=new Membre();
			$total=$m->rows;
			if($m->rows>=10)
			{
				$data=$m->getSample(0,NPP);				
			}
			else
			{
				$data=$m->getAll();
			}			
			include_once("vue/Mpikambana/lisitra.php");
		}
		else if($_GET['case']=="2")
		{
			//on utilisera le controlleur pour afficher le formulaire de update
			include_once('vue/Mpikambana/manova.php');
		}
		else if($_GET["case"]=="3")
		{
			//on utilisera le controlleur pour ajouter un membre
			include_once("vue/Mpikambana/Manampy.php");
		}
		else
		{
			//affichage par défault
			$m=new Membre();
			$total=$m->rows;
			if($m->rows>=10)
			{
				$data=$m->getSample(0,NPP);				
			}
			else
			{
				$data=$m->getAll();
			}	
			include_once("vue/Mpikambana/lisitra.php");
		}
	}
	else if(isset($_GET['page']) && !isset($_GET['case']))
	{
		$m=new Membre();
		$total=$m->rows;
		if($m->rows>=10)
		{
			if(((int)$_GET['page'])==1)
			{
				$data=$m->getSample(0,NPP);
			}
			else
			{
				$data=$m->getSample((((int)($_GET['page']))-1)*NPP,NPP);
			}
		}
		else
		{
			$data=$m->getAll();
		}			
		include_once("vue/Mpikambana/lisitra.php");
	}
	else{
		$m=new Membre();
		$total=$m->rows;
		if($m->rows>=10)
		{
			$data=$m->getSample(0,NPP);				
		}
		else
		{
			$data=$m->getAll();
		}	
		include_once("vue/Mpikambana/lisitra.php");
	}
}
else if($_SERVER["REQUEST_METHOD"]="POST")
{
	if(isset($_POST["record"]))
	{
		//on utilisera le controlleur pour ajouter un membre et afficher un message sur le résultat du dernier ajout
		include_once("vue/Mpikambana/Manampy.php");
	}
}

/*Une fois terminé => on chargera la vue correspondante au traitement*/

?>