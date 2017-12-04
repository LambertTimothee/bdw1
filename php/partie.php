<?php 
$para = getPara();
foreach ($para as $key => $value) {
	$para['id'] = $value['prm_id'];
	$para['taille'] = $value['prm_taille'];
	$para['id'] = $value['prm_ptinit'];
	$para['id'] = $value['prm_crit'];
}
$idEquipe = 1;
$equipe1 = getEqp($idEquipe);
$idEquipe++;
$equipe2 = getEqp($idEquipe);


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