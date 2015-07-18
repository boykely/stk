<?php
session_start();
session_destroy();
foreach($_SERVER as $cle=>$val)
{
	echo $cle.' : '.$val.'<br/>';
}
echo '__________________________<br/>';
echo __DIR__;
?>
