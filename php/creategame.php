
	<p> Bienvenue dans l'interface de création de partie! </p>
<form method="post" action="php/resultfile.php" enctype="multipart/form-data" name="form" id="form">
                    <fieldset>
                        <legend>Créer une partie</legend>
                        <label>Choisir équipe 1</label>
                           
                        
                        </br>
						<?php 
                                                        $listeequip = listequip();
														echo "<select name='equipe1' size='1'>";
                                                        foreach ($listeequip as $keyList => $valueList) {
                                                                echo "<option value=".$valueList["eqp_id"].">".$valueList["eqp_nom"]."</option>";
                                                        }
														echo "</select>";
														
                                                ?>
						</br>
						 <label>Choisir équipe 2</label>
						 </br>
						<?php 
                                                        
														echo "<select name='equipe2' size='1'>";
                                                        foreach ($listeequip as $keyList => $valueList) {
                                                                echo "<option value=".$valueList["eqp_id"].">".$valueList["eqp_nom"]."</option>";
                                                        }
														echo "</select>";
                                                ?>
						<br/>
						<input type="hidden" name="formType" value="2">
						<input type="submit" value="Créer partie" />  
						
					</fieldset>
	</form>
   
	
	
	
	
	
	
