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
	header ("location:../index.php?page=partie.php&equipe1=$equipe1&equipe2=$equipe2");
}


if($_POST['formType']==3) {
	if ($_POST["equipe"]==1) {
		
	}
}
?>