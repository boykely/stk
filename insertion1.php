<?php
try
{
$bdd= new PDO('mysql:host=localhost;dbname=stk', 'root', '');	
}
catch(Exception $e)	
{
	die('Erreur : ' . $e->getMessage("tsy mety a"));
}

$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
$ddn=$_POST["ddn"];
$itgr=$_POST["itgr"];
$tel=$_POST["tel"];
$antony=$_POST["antony"];


//$bdd->exec('INSERT INTO membres(NOM,PRENOM,DDN,INTEGRATION,ACTIF) VALUES (\'$nom\',\'$prenom\',\'$ddn\',\'$itgr\',\'$antony\')');
//echo 'le transfert a bien reussi';

$req = $bdd->prepare('INSERT INTO membres(NOM,PRENOM,DDN,INTEGRATION,raisons,Telephone
) VALUES(:nom,:prenom, :ddn, :itgr, :antony, :tel)');
$req->execute(array(
'nom' => $nom,
'prenom' => $prenom,
'ddn' => $ddn,
'itgr' => $itgr,
'tel' => $tel,
'antony' => $antony,));

echo "le transfert a bien reussi";
?>