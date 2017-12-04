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


	function ajoutteam($eqpname,$eqpcolor,$eqpformat) {
			global $connexion;
			$sql = "INSERT INTO equipe(eqp_nom,eqp_couleur,eqp_datecrea,eqp_format) VALUES ('$eqpname','$eqpcolor',NOW(),$eqpformat)";
			mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());
			$id=mysqli_insert_id($connexion);
			return $id;
	}
	
    function listmorp() {
			global $connexion;
			$sql = "SELECT * FROM morpion";
			$res=mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());
			while($arr = mysqli_fetch_assoc($res) ){ 
					$retour[] = $arr;
			}
			return $retour;
        }
		
	function listequip() {
			global $connexion;
			$sql = "SELECT * FROM equipe";
			$res=mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());
			while($arr = mysqli_fetch_assoc($res) ){ 
					$retour[] = $arr;
			}
			return $retour;
        }
		
	function assocmrpeqp ($id_eqp,$id_mrp) {
			global $connexion;
			$sql = "INSERT INTO appartient(eqp_id,mrp_def_id) VALUES ($id_eqp,$id_mrp)";
			mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());
		}
	function selectmrpeqp($eqp_id) {
			global $connexion;
			$sql = "SELECT * FROM morpion NATURAL JOIN appartient WHERE eqp_id=$eqp_id";
			$res=mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());
			while($arr = mysqli_fetch_assoc($res) ){ 
					$ret[] = $arr;
			}
			return $ret;
	}
	
	function addmrpig($mrp__def_nom,$mrp_def_icone,$mrp_def_hp,$mrp__def_degat,$mrp_def_mana,$mrp_def_class,$eqp1) {
			global $connexion;
			$sql = "INSERT INTO morpion_en_jeu(mrp_nom,mrp_icone,mrp_hp,mrp_degat,mrp_mana,mrp_class,eqp_ig) VALUES ('$mrp__def_nom','$mrp_def_icone',$mrp_def_hp,$mrp__def_degat,$mrp_def_mana,'$mrp_def_class',$eqp1)";
			mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());
		
	}
	
function getPara(){
	global $connexion;
	$sql = "SELECT * FROM parametre where prm_id = (SELECT MAX(prm_id) FROM parametre)";
	$res = mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
	while($arr = mysqli_fetch_assoc($res) ){ 
		$retour[] = $arr;
	}
	return $retour;
}

function getEquip($eqp){
	global $connexion;
	//$sql = "select * FROM equipe e NATURAL JOIN contient c NATURAL JOIN morpion_en_jeu m WHERE c.eqp_id = $eqp"; //TODO

	$res = mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
	while($arr = mysqli_fetch_assoc($res) ){ 
		$retour[] = $arr;
	}
	return $retour;
}


?>
