<?php
session_start();
session_destroy();
/*foreach($_SERVER as $cle=>$val)
{
	echo $cle.' : '.$val.'<br/>';
}
echo '__________________________<br/>';
echo __DIR__;*/
include_once('model/toebola/cotisations.php');
include_once('constantes.php');

$total=5000;
$mois='100000000000';
$annee='2015';
$cotis=new Cotisation();
$cotis->insert('13',$mois,$annee,$total);

?>
