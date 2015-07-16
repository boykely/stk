<div class="panel panel-default" id="ct">
	<ul class="retour nav nav-pills"><li><a href="index.php" title="Miverina" alt="Miverina"><img id="i" src="images/b_home.png"/></a></li>
		<li><input type="text" id="nom" placeholder="Taper un nom pour une recherche" value="" style="height:35px;width:250px;"/></li>						
	</ul>
	<div class="mpikambana_lisitra">
		<input type="hidden" name="total" value="<?php echo_($total);?>"/>
		<input type="hidden" name="npp" value="<?php echo_(NPP); ?>"/>
		<input type="hidden" name="currentPage" value="1"/>
		<input type="hidden" name="uri" value="<?php echo_($_SERVER['REQUEST_URI']);?>"/>
		<table class="table table-bordered table-hover">
		<tbody>
			<tr class="info">
			<th>Nom</th><th>Prenom</th><th></th>
			</tr>			
		</tbody>
		<?php
			if(isset($data))
			{
				while($row=$data->fetch())
				{
					?><tr id="<?php echo_($row['ID']);?>">
						<td><?php echo_($row['NOM']);?></td>
						<td><?php echo_($row['PRENOM']);?></td>
						<td><img src="images/outil/edit-16.png" alt="edit"/></td>
					</tr>
					<?php					
				}
				$m->closeConnection();
			}
			else
			{
				echo '<li>Il n\'y a pas de membre inscrit</li>';
				$m=Null;
			}			
		?>
	</table>	
	</div>	
	<div class="pagination">
		
	</div>
</div>