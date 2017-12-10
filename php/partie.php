<p> Choisissez votre action! </p>


<?php 
	$para = getPara();
	foreach ($para as $key => $value) {
		$para['id'] = $value['prm_id'];
		$para['taille'] = $value['prm_taille'];
		$para['id'] = $value['prm_ptinit'];
		$para['id'] = $value['prm_crit'];
	}
	$idEquipe = 1;
	$equipe1 = getEquip($idEquipe);
	$idEquipe++;
	$equipe2 = getEquip($idEquipe);
?>

<div>
	<div id='eqp1'></div>
	<div id='jeu'>
		<table id='grille'>
			<?php
			for ($i=0; $i < $para['taille']; $i++) { 
				echo "<tr id='".$i."''>";
				for ($j=0; $j < $para['taille']; $j++) { 
					echo "<td class='".$j."'> </td>";
				}
				echo "</tr>";
			}
			?>
		</table>
	</div>
	<div id='eqp2'></div>
</div>

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