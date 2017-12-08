
	
	<form method="post" action="php/resultfile.php" enctype="multipart/form-data" name="form" id="form">
                    <fieldset>
                        <legend>Ajouter une équipe</legend>
                        <label>Nom :</br>
                            <input type="text" id="name" name="name" value="" />
                        </label>
                        </br>
                        <label>Couleur :</br>
                            <input type="color" value="#FFF" name="teamcolor">
                        </label>
						</br>
						<label> Choisir un format :</br>
							<input type="radio" name="teamform" value="4" checked>Equipe de 4<br>
							<input type="radio" name="teamform" value="8"> Equipe de 8<br>
						</label>
						</br>
						               <?php 
                                                        $listeMorp = listmorp();
                                                        foreach ($listeMorp as $keyList => $valueList) {
                                                                echo "<div>
                                                                            <input type='checkbox' name=".$valueList["mrp_def_id"]." value=".$valueList["mrp_def_id"].">
                                                                            <label for=".$valueList["mrp_def_id"].">".$valueList["mrp__def_nom"]."</label>
                                                                          </div>";
                                                        foreach ($valueList as $key => $value) {
                                                        /*        echo "$value";*/

                                                                }
                                                        }
                                                ?>


						
							<input type="hidden" name="formType" value="1">
							<input type="submit" value="Créer équipe" />  

                    </fieldset>
	</form>
   
	
	
	
	
	
