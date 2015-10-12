<?php
//Inclusion du model Membre
include_once('model/Membres.php');
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
			include_once("vue/Manampy/lisitra.php");
		}
		else if($_GET["case"]=="3")
		{
			//on utilisera le controlleur pour ajouter un membre
			include_once("vue/Manampy/Manampy.php");
		}
	}
	else{
		include_once("vue/Manampy/lisitra.php");
	}
}
else if($_SERVER["REQUEST_METHOD"]="POST")
{
	if(isset($_POST["record"]))
	{
		//on utilisera le controlleur pour ajouter un membre et afficher un message sur le résultat du dernier ajout
		include_once("vue/Manampy/Manampy.php");
	}
}

/*Une fois terminé => on chargera la vue correspondante au traitement*/

?>