<?php session_start();
include_once('../Utils.php');
Utils::CheckSession();
header('Location:/stk/');
?>