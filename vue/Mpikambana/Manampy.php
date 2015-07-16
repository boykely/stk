<div class="panel panel-default hh" id="ct">
	<div class="retour text-center"><h4>Fiche d'inscription</h4></div><hr/>
		<div class="media">
			<div class="" style="display:none;">
				<a href="#" onclick="">Parcourir</a>
			</div>
			<img src="" alt="Importer une image" id="photo" height="160" width="160" class="media-object pull-right"/>
			<div class="media-body">
				<form method="post" action="Mpikambana.php" class="form">
					<div class="form-group">
						<label for="nom" class="col-md-3">Nom *: </label><input type="text" id="nom" name="nom" value="" />
					</div>
					<div class="form-group">
						<label for="prenom" class="col-md-3">Prenom : </label><input type="text" id="prenom" name="prenom" value=""/>
					</div>
					<div class="form-group">
						<label for="ddn" class="col-md-3">Date de naissance: </label><input type="datetime" id="ddn" name="ddn" />
					</div>
					<div class="form-group">
						<label for="prof" class="col-md-3">Profession *:</label><input type="text" id="prof" name="prof"/>
					</div>
					<div class="form-group">
						<label for="antony" class="col-md-3">Raisons *:</label><textarea id="antony" name="antony" rows="10" cols="20"></textarea>
					</div>
					<div class="form-group">
						<label class="col-md-3"></label><input type="submit" id="record" class="btn btn-default" value="Enregistrer" name="record"/>
					</div>
				</form>
			</div>
		</div>
</div>