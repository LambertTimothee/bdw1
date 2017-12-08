<p> Choisissez votre action! </p>

<form method="post" action="php/resultfile.php" enctype="multipart/form-data" name="form" id="form">
                    <fieldset>
						<?php 
						$eqp_id=1;
                                                        $listemrpeqp=listemrpeqp($eqp_id);
														foreach ($listemrpeqp as $keyList => $valueList) {
														
															echo "<input type='radio' name='".$valueList["mrp_id"]."'>
																	<label>".$valueList["mrp_nom"]."</label>
															";
														}
                                                              
														
                                                ?>
						
						<input type="hidden" name="formType" value="3">
						<input type="submit" value="Valider Action" />  
						
					</fieldset>
</form>