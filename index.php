<?php session_start();
include_once('Utils.php');
if(!isset($_SESSION["mail"]))
{
	header('Location:/stk/login.php');
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8"/>
<title>STK Ambavahadimitafo</title>
<link rel="stylesheet" href="css/bootstrap.css" type="text/css"/>
<link rel="stylesheet" href="css/bootstrap-theme.css" type="text/css"/>
<link rel="stylesheet" href="css/style.css" type="text/css"/>
<script type="text/javascript" src="js/jquery-2.0.3.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>	
	<div class="container">	
		<div class="page-header text-center">
			<h4>"Hitory ny anaranao amin'ny rahalahiko aho." <small>Sal 22,22a</small></h4>
		</div>
		<div class="row">
			<div class="col-md-3 col-xs-12">
				<div class="thumbnail">
					<h3 class="text-center">Mpikambana</h3>
					<div class="caption">
						<p class="h">Raha hijery ny lisitry ny mpikambana</p>
						<a href="Mpikambana.php" class="btn btn-info">Alefa</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-12">
				<div class="thumbnail">
					<h3 class="text-center">Toe-bola</h3>
					<div class="caption">
						<p class="h">Raha hijery ny teo-bolan'ny sampana STK</p>
						<a href="Cotisations.php" class="btn btn-info">Alefa</a>
					</div>
				</div>
			</div>
			<div class="col-md-3 col-xs-12">
				<div class="thumbnail">
					<h3 class="text-center">Vaovao</h3>
					<div class="caption">
						<p class="h">Raha hijery ny vaovao samy hafa eto anivon'ny sampana STK</p>
						<a href="#" class="btn btn-info">Alefa</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>