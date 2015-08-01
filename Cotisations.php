<?php session_start();
include_once('Utils.php');
Utils::CheckSession();
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
			<div class="loading"><img src="images/ajax-loader.gif"/></div>		
			<div class="col-md-6 col-xs-12 ">			
				<?php				
				include_once("controller/toebola/cotisations.php");				
				?>				
			</div>
			<div class="col-md-6 col-xs-12 tk">
			<div class="takona"></div>
				<form class="f1">
				<fieldset><legend>Archives</legend>				
				<div class="row">
					<div class="col-md-1">
						<select>
							<option>Misafidiana taona</option>
							<option>2012</option>
						</select>
					</div>
					<div class="col-md-12">
						<div class="sem1">
						<table class="table table-bordered table-condensed">
							<tr class="info"><td></td><td>Janvier</td><td>Fevrier</td><td>Mars</td><td>Avril</td><td>Mai</td><td>Juin</td></tr>
							<tr><td><input type="checkbox" name="S1_all" onclick="checkSemAll('S1_all','d')"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td></tr>
						</table>
						</div>
					</div>					
				</div>
				<div class="row">					
					<div class="col-md-12">
						<div class="sem2">
						<table class="table table-bordered table-condensed">
							<tr class="info"><td></td><td>Juillet</td><td>Août</td><td>Septembre</td><td>Octobre</td><td>Novembre</td><td>Decembre</td></tr>
							<tr><td><input type="checkbox" name="S2_all" onclick="checkSemAll('S2_all','d')"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td></tr>
						</table>
						</div>
					</div>	
				</div>
				</fieldset>
				</form>
				<div class="row">
					<div class="col-md-12">
					<form class="f2">
						<fieldset>
						<legend>Nouvelle entrée</legend>
							<input type="text" placeholder="Taona" value="" name="year"/><br/>
							<input type="datetime" name="date" placeholder="jj/mm/yyyy"/><br/>
							<table class="table table-bordered table-condensed">
							<tr class="info"><td></td><td>Janvier</td><td>Fevrier</td><td>Mars</td><td>Avril</td><td>Mai</td><td>Juin</td></tr>
							<tr><td><input type="checkbox" name="S1_all" onclick="checkSemAll('S1_all','n')"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td></tr>
							</table>
							<table class="table table-bordered table-condensed">
							<tr class="info"><td></td><td>Juillet</td><td>Août</td><td>Septembre</td><td>Octobre</td><td>Novembre</td><td>Decembre</td></tr>
							<tr><td><input type="checkbox" name="S2_all" onclick="checkSemAll('S2_all','n')"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td><td><input type="checkbox"/></td></tr>
							</table>
							<input type="button" class="button" name="btn_insert" value="Entrer" onclick="fillSem();"/>
							<input type="hidden" id="id" value=""/>
						</fieldset>						
						</form>	
					</div>									
				</div>
			</div>
		</div>		
	</div>
	<script src="js/main_mpikambana.js"></script>
</body>
</html>