<?php 
	if (isset($_GET['tour'])) {		
		$eqp_id=$_GET['tour'];
	}else{
		$eqp_id=1;
	}


	$idEquipe1 = $_GET['equipe1'];
	$idEquipe2 = $_GET['equipe2'];

	$para = getPara();
	foreach ($para as $key => $value) {
		$para['id'] = $value['prm_id'];
		$para['taille'] = $value['prm_taille'];
		$para['ptinit'] = $value['prm_ptinit'];
		$para['crit'] = $value['prm_crit'];
	}
	$equipe1 = getEquip($idEquipe1);
	$equipe2 = getEquip($idEquipe2);


	if ($eqp_id == 1 ) {		
		$eqpAdv = $equipe2;
	}
	else{
		$eqpAdv = $equipe1;
	}
?>

<div id="game_div">
	<div class='equipe_en_jeu' id='eqp1'>
		<?php
		$eqp1_name = $equipe1[0]['eqp_nom'];
		$eqp1_color = $equipe1[0]['eqp_couleur'];

		$eqp2_name = $equipe2[0]['eqp_nom'];
		$eqp2_color = $equipe2[0]['eqp_couleur'];
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
		<h3 style="text-align: center;">C'est au tour de l'équipe <?php echo $eqp_id; ?></h3>	
		<table id='grille'>
			<?php
			for ($i=1; $i < $para['taille']+1; $i++) { 
				echo "<tr id='".$i."''>";
				for ($j=1; $j < $para['taille']+1; $j++) { 
					echo "<td class='".$j."'>";
					foreach ($equipe1 as $value) {
						if($value['mrp_coordonneesX'] == $i && $value['mrp_coordonneesY'] == $j)
						{
							echo "<div class='morpion'>";
								echo "<div class='mrp_id'>";
									echo "<img src='img/morpions/".$value['mrp_icone']."'>";
								echo "</div>";
								echo "<div class='mrp_descr'>";
									echo "<p style='color: ".$eqp1_color.";'>".$value['mrp_nom']."</p>";						
								echo "</div>";
							echo "</div>";
						
					echo "</div>";
						}
					}
					foreach ($equipe2 as $value) {
						if($value['mrp_coordonneesX'] == $i && $value['mrp_coordonneesY'] == $j)
						{
							echo "<div class='morpion'>";
								echo "<div class='mrp_id'>";
									echo "<img src='img/morpions/".$value['mrp_icone']."'>";
								echo "</div>";
								echo "<div class='mrp_descr'>";
									echo "<p style='color: ".$eqp2_color.";'>".$value['mrp_nom']."</p>";						
								echo "</div>";
							echo "</div>";
						
					echo "</div>";
						}
					}
					echo "</td>";
				}
				echo "</tr>";
			}
			?>
		</table>
	</div>

	<div class='equipe_en_jeu' id='eqp2'>
				<?php
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


<?php  
$action = $_GET['action'];
if($action == 'perso'){
	$win = false;
		$ligne = 0;
		$colonne[1] = 0;
		$colonne[2] = 0;
		$colonne[3] = 0;
		$colonne[4] = 0;
		$diag1 = 0;
		$diag2 = 0;
		for ($i=1; $i < $para['taille']+1; $i++) { 
			foreach ($eqpAdv as $morpion) {
				if ($morpion['mrp_coordonneesX'] == $i) {
					$ligne += 1;
				}
			}
			if ($ligne == $para['taille']) {
				$win = true;
			}
			for ($j=1; $j < $para['taille']+1; $j++) {
				if ($i = $j) {
					foreach ($eqpAdv as $morpion) {
						if ($morpion['mrp_coordonneesY'] == $j && $morpion['mrp_coordonneesX']) {
							$diag1 += 1;
						}

					}
					if ($diag1 == $para['taille']) {
						$win = true;
					}
				}
				else if ($i+$j == $para['taille']+1) {
					foreach ($eqpAdv as $morpion) {
						if ($morpion['mrp_coordonneesY'] == $j && $morpion['mrp_coordonneesX']) {

							$diag2 += 1;
						}

					}
					if ($diag2 == $para['taille']) {
						$win = true;
					}
					
				}
				foreach ($eqpAdv as $morpion) {
					if ($morpion['mrp_coordonneesY'] == $j) {
						$colonne[$i] += 1;
					}

				}
				if ($colonne[$i] == $para['taille']) {
					$win = true;
				}

			}
		}
		if ($win) {
			header ("location:index.php?page=win.php&win=".$eqpAdv[0]['eqp_nom']);
		}

?>




<p> Choisissez le personnage :  </p>
<form method="post" action="php/resultfile.php" enctype="multipart/form-data" name="form" id="form">
	<fieldset>
		<div>
			<?php 
			$listemrpeqp=listemrpeqp($eqp_id);
			foreach ($listemrpeqp as $keyList => $valueList) {
				echo "<label for='test".$valueList["mrp_id"]."'>".$valueList["mrp_nom"]."</label>";
				echo "<input type='radio' name='".$valueList["mrp_nom"]."' id='test".$valueList["mrp_id"]."' value='".$valueList["mrp_id"]."'>";
			}



			?>
		</div>

		<input type="hidden" name="formType" value="3">
		<input type="hidden" name="eqp_id" value='<?php echo $eqp_id ?>' />
		<input type="hidden" name="eqp_idRe1" value='<?php echo $idEquipe1 ?>' />
		<input type="hidden" name="eqp_idRe2" value='<?php echo $idEquipe2 ?>' />
		<input type="submit" value="Valider Action" />  

	</fieldset>
</form>

<?php 
}
elseif ($action == 'action') {

		?>
	<form method="post" action="php/resultfile.php" enctype="multipart/form-data" name="form" id="form">
	<fieldset>
	<?php
	$mrp_select = selectMrp($_GET['perso']);
	if ($mrp_select[0]['mrp_coordonneesX'] != '' && $mrp_select[0]['mrp_coordonneesX'] != NULL) {
		
		switch($mrp_select[0]['mrp_class'])
			{
		    case 'Guerrier';
		    	actionGuerrier($mrp_select, $eqpAdv,$para['crit']);
		    case 'Archer';
		    	actionArcher($mrp_select, $eqpAdv);
		    break;
		    case 'Mage';
		        actionMage($mrp_select, $eqpAdv);
		    break;
		    default;
		        echo 'ERROR';
		    break;
			}
	?>
		<input type="hidden" name="eqp_id" value='<?php echo $eqp_id ?>' />
		<input type="hidden" name="eqp_idRe1" value='<?php echo $idEquipe1 ?>' />
		<input type="hidden" name="eqp_idRe2" value='<?php echo $idEquipe2 ?>' />
		<input type="submit" value="Valider Action" /> 
		</fieldset>
</form>
	<?php
			
		//TODO
	}

	else{
		






		echo "Choisissez la case dans laquelle vous souhaitez poser votre morpion. <br/>";
		
		for ($i=1; $i < $para['taille']+1; $i++) {
			for ($j=1; $j < $para['taille']+1; $j++) { 
				$check = true;
				foreach ($equipe1 as $value) {
					if($value['mrp_coordonneesX'] == $i && $value['mrp_coordonneesY'] == $j)
					{
						$check = false;
					}
				}
				foreach ($equipe2 as $value) {
					if($value['mrp_coordonneesX'] == $i && $value['mrp_coordonneesY'] == $j)
					{
						$check = false;
					}
				}
				if ($check) {
					echo "<input type='radio' name='".$i."_".$j."' id='".$i."_".$j."' value='".$i."_".$j."'>($i , $j)";				
				}
			}
			echo "<br/>";
		}
		?>

		<input type="hidden" name="formType" value="4">
		<input type="hidden" name="eqp_id" value='<?php echo $_GET['tour'] ?>' />
		<input type="hidden" name="mrp_id" value='<?php echo $_GET['perso'] ?>' />		
		<input type="hidden" name="taille" value='<?php echo $para['taille']+1 ?>' />
		<input type="hidden" name="eqp_idRe1" value='<?php echo $idEquipe1 ?>' />
		<input type="hidden" name="eqp_idRe2" value='<?php echo $idEquipe2 ?>' />
		<input type="submit" value="Valider Action" />  

	</fieldset>
</form>
<?php
	}
}

?>