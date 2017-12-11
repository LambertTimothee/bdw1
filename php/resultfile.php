<?php

 include '../fonctions.php'; 

if($_POST['formType']==1) {


							if (!EMPTY($_POST["name"]) && !EMPTY($_POST["teamcolor"]) && !EMPTY($_POST["teamform"]) ) {
												
												$id_eqp=ajoutteam($_POST["name"],$_POST["teamcolor"],$_POST["teamform"]);
												
													 $listeMorp = listmorp();
													
                                                        foreach ($listeMorp as $keyList => $valueList) {
															
															if (!EMPTY($_POST[$valueList["mrp_def_id"]])) {
															
															assocmrpeqp($id_eqp,$_POST[$valueList["mrp_def_id"]]);
															}
														}
													header ('location:../index.php?page=addteam.php');

														}
							else {
									header ('location:../index.php?page=addteam.php');									 
									}
									
						   }
						   
if($_POST['formType']==2) {
	supprmrpig();
	resetincr();
	$infmrp=selectmrpeqp($_POST["equipe1"]);
	$eqp=1;
			foreach ($infmrp as $keyList => $valueList) {
				$equipe1 = $valueList['eqp_id'];														
				addmrpig($valueList["mrp__def_nom"],$valueList["mrp_def_icone"],$valueList["mrp_def_hp"],$valueList["mrp__def_degat"],$valueList["mrp_def_mana"],$valueList["mrp_def_class"],$equipe1,$eqp);	
															
														}
	$infmrp=selectmrpeqp($_POST["equipe2"]);
	$eqp=2;
			foreach ($infmrp as $keyList => $valueList) {
				$equipe2 = $valueList['eqp_id'];
				addmrpig($valueList["mrp__def_nom"],$valueList["mrp_def_icone"],$valueList["mrp_def_hp"],$valueList["mrp__def_degat"],$valueList["mrp_def_mana"],$valueList["mrp_def_class"],$equipe2,$eqp);	
															
														}
	header ("location:../index.php?page=partie.php&action=perso&equipe1=$equipe1&equipe2=$equipe2");
}


if($_POST['formType']==3) {
	$listemrpeqp=listemrpeqp($_POST['eqp_id']);
	$equipe1 = $_POST['eqp_idRe1'];
	$equipe2 = $_POST['eqp_idRe2'];
	$check = false;
	foreach ($listemrpeqp as $keyList => $valueList) {
		$radio = $valueList["mrp_nom"];
		if (isset($_POST[$radio])) {
			$check = true;
			header ("location:../index.php?page=partie.php&action=action&equipe1=$equipe1&equipe2=$equipe2&tour=".$_POST['eqp_id']."&perso=".$valueList['mrp_id']);
		}
	}
	if ($check == false) {
		//TODO
	}
}

if($_POST['formType']==4) {
	$equipe1 = $_POST['eqp_idRe1'];
	$equipe2 = $_POST['eqp_idRe2'];
	$mrp_id = $_POST['mrp_id'];
	if ($_POST['eqp_id'] == 1 ) {		
		$eqp = 2;
	}
	else{
		$eqp = 1;
	}
	for ($i=1; $i < $_POST['taille']; $i++) {
			for ($j=1; $j < $_POST['taille']; $j++) { 
				if (isset($_POST[$i."_".$j])) {
					placeMrp($i,$j,$mrp_id);
					header ("location:../index.php?page=partie.php&action=perso&equipe1=$equipe1&equipe2=$equipe2&tour=".$eqp);
				}
			}
	}


}


if($_POST['formType']==5) {
	$degat = $_POST['degat'];
	$equipe1 = $_POST['eqp_idRe1'];
	$equipe2 = $_POST['eqp_idRe2'];
	if ($_POST['eqp_id'] == 1 ) {		
		$eqp = 2;
		$eqpAdv = getEquip($equipe2);
	}
	else{
		$eqp = 1;
		$eqpAdv = getEquip($equipe1);

	}
	foreach ($eqpAdv as $valueList) {
		if (isset($_POST[$valueList['mrp_nom']])) {
			attaque($valueList['mrp_id'],$valueList['mrp_hp'],$degat);
		}
	}


	header ("location:../index.php?page=partie.php&action=perso&equipe1=$equipe1&equipe2=$equipe2&tour=".$eqp);
}
?>