<?php  session_start();
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
<script type="text/javascript" src="js/pagination.js"></script>
</head>
<body>	
	<div class="container">	
		<div class="page-header text-center">
			<h4>"Hitory ny anaranao amin'ny rahalahiko aho." <small>Sal 22,22a</small></h4>
		</div>
		<div class="row">			
			<div class="col-md-3 col-xs-12">
				<div class="row">
					<div class="col-md-12 col-xs-12">
						<div class="thumbnail">
							<img src="images/logo---.jpg" alt="logo"/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="panel panel-default">
						<ul class="nav nav-pills nav-stacked">
								<li><a href="Mpikambana.php?case=1">Lisitra mpikambana</a></li>
								<li><a href="Mpikambana.php?case=2">Hanova mpikambana</a></li>
								<li><a href="Mpikambana.php?case=3">Manampy mpikambana</a></li>					
						</ul>
					</div>	
				</div>							
			</div>			
			<div class="col-md-9 col-xs-12 ">
			<!-- Pour le moment, on aura 3 vue au choix: lisitra,hanova,manampy. Par défaut on affichera Lisitra-->
				<?php
				//affichage par defaut du vue lisitra
				//inclusion du controlleur Manampy
				include_once("controller/Mpikambana/Mpikambana.php");				
				?>				
			</div>
		</div>		
	</div>
	<script src="js/main_mpikambana.js"></script>
</body>
</html>