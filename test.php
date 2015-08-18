<?php
//session_start();
//session_destroy();
/*foreach($_SERVER as $cle=>$val)
{
	echo $cle.' : '.$val.'<br/>';
}
echo '__________________________<br/>';
echo __DIR__;*/
include_once('model/toebola/cotisations.php');
include_once('constantes.php');
$cotis=new Cotisation();
                            $membreData=$cotis->getAll('13');
                            $tab=array('isAuthenitcated'=>'true','data'=>array('id'=>'13','data'=>$membreData));
                            echo json_encode($tab);


?>
