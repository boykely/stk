<form method="POST" action="#">
				<div class="panel panel-default">
					<div class="panel-heading">
						<p>Authentifiez-vous?</p>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-3 col-xs-12">
								<label for="email">E-mail</label>
							</div>
							<div class="col-md-3 col-xs-12">
								<input type="email" placeholder="Adresse e-mail" id="email" name="mail" value="<?php if(isset($log_mail)){echo $log_mail;}?>"/>
							</div>							
						</div>
						<div class="row">
							<div class="col-md-3 col-xs-12">
								<label for="mdp">Mot de passe</label>
							</div>
							<div class="col-md-3 col-xs-12">
								<input type="password" placeholder="votre mot de passe" id="mdp" name="pass"/>
							</div>
						</div>
						<div class="row">
							<?php
								if(isset($log_error))
								{
									if($log_error)
									{
										?><label style="color:red">Vous n'avez pas accès à ce service</label><?php
										unset($log_error);
									}
								}
								if(isset($log_out))
								{
									if($log_out)
									{
										?><label style="color:green">Vous êtes maintenant deconnecté</label><?php
										unset($log_out);
									}
								}
							?>
						</div>
					</div>
					<div class="panel-footer">
						<input type="submit" value="Se connecter" class="btn btn-default active"/>
					</div>				
				</div>
</form>