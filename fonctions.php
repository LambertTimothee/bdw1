<?php
	$connexion = connectBD();

	// connexion à la BD
	function connectBD() {
			$connexion = mysqli_connect("localhost", "p1710707", "mZaewr7J", "p1710707");
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
	
	function supprmrpig() {
			global $connexion;
			$sql = "DELETE FROM morpion_en_jeu";
			mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());
	}
	
	function resetincr() {
			global $connexion;
			$sql = "ALTER TABLE morpion_en_jeu AUTO_INCREMENT = 1";
			mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());
	}
	
	function listemrpeqp ($eqp_ig) {
			global $connexion;
			$sql = "SELECT * FROM morpion_en_jeu WHERE eqp_ig=$eqp_ig";
			$res=mysqli_query($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysqli_error());
			while($arr = mysqli_fetch_assoc($res) ){ 
					$ret[] = $arr;
			}
			return $ret;
	}

?>
