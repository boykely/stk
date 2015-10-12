<?php

	$bdd=new PDO('mysql:host=localhost;dbname=stk', 'root', '');

$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$ddn=$_POST["ddn"];
$itgr=$_POST["itgr"];
$antony=$_POST["antony"];


$bdd->exec('INSERT INTO menbres(nom,prenom,adresse,codepostal,telephone) VALUES (\'$nom\',\'$prenom\',\'$ddn\',\'$itgr\',\'$antony\')');
echo 'le transfert a bien reussi';
?>