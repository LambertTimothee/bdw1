<?php 

	$idEquipe1 = $_GET['equipe1'];
	$idEquipe2 = $_GET['equipe2'];

	$para = getPara();
	foreach ($para as $key => $value) {
		$para['id'] = $value['prm_id'];
		$para['taille'] = $value['prm_taille'];
		$para['id'] = $value['prm_ptinit'];
		$para['id'] = $value['prm_crit'];
	}
	$equipe1 = getEquip($idEquipe1);
	$equipe2 = getEquip($idEquipe2);
?>

<div id="game_div">
	<div class='equipe_en_jeu' id='eqp1'>
		<?php
		$eqp1_name = $equipe1[0]['eqp_nom'];
		$eqp1_color = $equipe1[0]['eqp_couleur'];
		echo "<p class='eqp_name' style='color: ".$eqp1_color.";'>Equipe 1 : ".$eqp1_name." </p>";
			foreach ($equipe1 as $morpion) {
				echo "<div class='morpion'>";
					echo "<div class='mrp_id'>";
						echo "<img src='img/morpions/".$morpion['mrp_icone']."'>";
					echo "</div>";
					echo "<div class='mrp_descr'>";
						echo "<p>".$morpion['mrp_nom']."</p>";						
						echo "<p>".$morpion['mrp_class']."</p>";
						echo "<p>PV : ".$morpion['mrp_hp']."</p>";
						echo "<p>Dégats : ".$morpion['mrp_degat']."</p>";
						if ($morpion['mrp_class'] == "Mage") {							
							echo "<p>Mana : ".$morpion['mrp_mana']."</p>";
						}
						
					echo "</div>";
				echo "</div>";

			}
		?>
	</div>
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

	<div class='equipe_en_jeu' id='eqp2'>
				<?php
		$eqp2_name = $equipe2[0]['eqp_nom'];
		$eqp2_color = $equipe2[0]['eqp_couleur'];
		echo "<p class='eqp_name' style='color: ".$eqp2_color.";'>Equipe 2 : ".$eqp2_name." </p>";
			foreach ($equipe2 as $morpion) {

				echo "<div class='morpion'>";
					echo "<div class='mrp_id'>";
						echo "<img src='img/morpions/".$morpion['mrp_icone']."'>";
					echo "</div>";
					echo "<div class='mrp_descr'>";
						echo "<p>".$morpion['mrp_nom']."</p>";						
						echo "<p>".$morpion['mrp_class']."</p>";
						echo "<p>PV : ".$morpion['mrp_hp']."</p>";
						echo "<p>Dégats : ".$morpion['mrp_degat']."</p>";
						if ($morpion['mrp_class'] == "Mage") {							
							echo "<p>Mana : ".$morpion['mrp_mana']."</p>";
						}
						
					echo "</div>";
				echo "</div>";

			}
		?>
	</div>
</div>
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