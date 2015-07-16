<?php
session_start();
session_destroy();
foreach($_SERVER as $cle=>$val)
{
	echo $cle.' : '.$val.'<br/>';
}
var_dump($_SERVER['QUERY_STRING']); 
$data='bonjou';
$data.=' kaka';
echo $data;

?>
