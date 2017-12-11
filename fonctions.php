<?php
	$connexion = connectBD();

	// connexion à la BD
	function connectBD() {
			$connexion = mysqli_connect("localhost", "root", "", "morpion");
			if (mysqli_connect_errno()) {
				printf("Échec de la connexion : %s\n", mysqli_connect_error());
				exit();
			}
			mysqli_query($connexion, 'SET NAMES UTF8'); // requete pour avoir les noms en UTF8
			return $connexion;
	}
	
	function deconnectBD() {
		global $connexion;
		mysqli_close($connexion);
	}

	function ajoutteam($eqpname,$eqpcolor,$eqpformat) {
			global $connexion;
			$sql = "INSERT INTO equipe(eqp_nom,eqp_couleur,eqp_datecrea,eqp_format) VALUES ('$eqpname','$eqpcolor',NOW(),$eqpformat)";
			mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
			$id=mysqli_insert_id($connexion);
			return $id;
	}
	
    function listmorp() {
			global $connexion;
			$sql = "SELECT * FROM morpion";
			$res=mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
			while($arr = mysqli_fetch_assoc($res) ){ 
					$retour[] = $arr;
			}
			return $retour;
        }
		
	function listequip() {
			global $connexion;
			$sql = "SELECT * FROM equipe";
			$res=mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
			while($arr = mysqli_fetch_assoc($res) ){ 
					$retour[] = $arr;
			}
			return $retour;
        }
		
	function assocmrpeqp ($id_eqp,$id_mrp) {
			global $connexion;
			$sql = "INSERT INTO appartient(eqp_id,mrp_def_id) VALUES ($id_eqp,$id_mrp)";
			mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
		}
	function selectmrpeqp($eqp_id) {
			global $connexion;
			$sql = "SELECT * FROM morpion NATURAL JOIN appartient WHERE eqp_id=$eqp_id";
			$res=mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
			while($arr = mysqli_fetch_assoc($res) ){ 
					$ret[] = $arr;
			}
			return $ret;
	}
	
	function addmrpig($mrp__def_nom,$mrp_def_icone,$mrp_def_hp,$mrp__def_degat,$mrp_def_mana,$mrp_def_class,$eqp,$eqp1) {
			global $connexion;
			$sql = "INSERT INTO morpion_en_jeu(mrp_nom,mrp_icone,mrp_hp,mrp_degat,mrp_mana,mrp_class,eqp_ig) VALUES ('$mrp__def_nom','$mrp_def_icone',$mrp_def_hp,$mrp__def_degat,$mrp_def_mana,'$mrp_def_class',$eqp1)";
			mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
			$mrp_id = mysqli_insert_id($connexion);
			$sql = "INSERT INTO contient(eqp_id,mrp_id) VALUES ($eqp,$mrp_id)";
			mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
		
	}
	
	function supprmrpig() {
			global $connexion;
			$sql = "DELETE FROM contient";
			mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
			$sql = "DELETE FROM morpion_en_jeu";
			mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));			
			
	}
	
	function resetincr() {
			global $connexion;
			$sql = "ALTER TABLE morpion_en_jeu AUTO_INCREMENT = 1";
			mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
	}
	
	function listemrpeqp ($eqp_ig) {
			global $connexion;
			$sql = "SELECT * FROM morpion_en_jeu NATURAL JOIN contient WHERE eqp_ig=$eqp_ig";
			$res=mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
			while($arr = mysqli_fetch_assoc($res) ){ 
					$ret[] = $arr;
			}
			return $ret;
	}

function getPara(){
  	global $connexion;
 	$sql = "SELECT * FROM morpion";
 	$res=mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
 	$sql = "SELECT * FROM parametre where prm_id = (SELECT MAX(prm_id) FROM parametre)";
 	$res = mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
  	while($arr = mysqli_fetch_assoc($res) ){ 
  		$retour[] = $arr;
  	}
  	return $retour;
}
  
function getEquip($eqp){
  	global $connexion;
 	$sql = "SELECT * FROM equipe";
 	$res=mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
 	$sql = "select * FROM equipe e NATURAL JOIN contient c NATURAL JOIN morpion_en_jeu m WHERE c.eqp_id = $eqp"; //TODO
 
 	$res = mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
  	while($arr = mysqli_fetch_assoc($res) ){ 
  		$retour[] = $arr;
  	}
  	return $retour;
}

function selectMrp($id){
	global $connexion;
 	$sql = "SELECT * FROM morpion_en_jeu where mrp_id = $id";
 	$res = mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
	while($arr = mysqli_fetch_assoc($res) ){ 
  		$retour[] = $arr;
  	}
  	return $retour;


}

function placeMrp($x,$y,$id){
	global $connexion;
	$sql = "UPDATE morpion_en_jeu SET  mrp_coordonneesX = $x, mrp_coordonneesY = $y WHERE mrp_id = $id";
	mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
}

function actionArcher($mrp, $eqpAdv){
	echo "Choisissez qui attaquer : ";
	foreach ($eqpAdv as $mrpAdv) {
		if ($mrpAdv['mrp_coordonneesX'] != 'NULL' && $mrpAdv['mrp_coordonneesX'] != '' && $mrpAdv['mrp_hp'] > 0) {
			echo "<label for='test".$mrpAdv["mrp_id"]."'>".$mrpAdv["mrp_nom"]."</label>";
			echo "<input type='radio' name='".$mrpAdv["mrp_nom"]."' id='test".$mrpAdv["mrp_id"]."' value='".$mrpAdv["mrp_id"]."'>";			
		}
	}
	echo '<input type="hidden" name="degat" value="'.$mrp[0]['mrp_degat'].'">';
	echo '<input type="hidden" name="formType" value="5">';
}
actionGuerrier($mrp_select, $eqpAdv,$para['crit']){
	$rand = rand( 1, 100);
	if($rand <= $mrp_select[0]['mrp_crit'])
	echo "Choisissez qui attaquer : ";
	foreach ($eqpAdv as $mrpAdv) {
		if ($mrpAdv['mrp_coordonneesX'] != 'NULL' && $mrpAdv['mrp_coordonneesX'] != '' && $mrpAdv['mrp_hp'] > 0) {
			echo "<label for='test".$mrpAdv["mrp_id"]."'>".$mrpAdv["mrp_nom"]."</label>";
			echo "<input type='radio' name='".$mrpAdv["mrp_nom"]."' id='test".$mrpAdv["mrp_id"]."' value='".$mrpAdv["mrp_id"]."'>";			
		}
	}
	echo '<input type="hidden" name="degat" value="'.$mrp[0]['mrp_degat'].'">';
	echo '<input type="hidden" name="formType" value="6">';

}/*
actionMage($mrp_select, $eqpAdv){

}*/

function attaque($mrp_id,$hp,$deg){
	$hp = $hp - $deg;
	global $connexion;
	$sql = "UPDATE morpion_en_jeu SET  mrp_hp = $hp WHERE mrp_id = $mrp_id";
	mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error($connexion));
}

?>
