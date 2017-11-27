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
	mysqli_query ($connexion,$sql) or die ('Erreur SQL !'.$sql.'<br />'.mysql_error());
	}

?>
