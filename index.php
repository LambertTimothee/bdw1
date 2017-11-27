<?php
	
	include('fonctions.php');
	connectBD();
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<title>Morpale</title>
	
	<link href="css/styles.css" rel="stylesheet" media="all" type="text/css">

</head>

<body>
	<?php include('static/header.php'); ?>
	<div id="centre">
		<?php include('static/menu.php'); ?>
		<main>
		<?php
			$nomPage = 'static/accueil.php'; // page par défaut
			if(isset($_GET['page'])) { // verification du parametre "page"
				if(file_exists(addslashes('php/'.$_GET['page']))) // le fichier existe
					$nomPage = addslashes('php/'.$_GET['page']);
			}
			include($nomPage); // inclut le contenu
		?>
		</main>
	</div>
	<?php include('static/footer.php'); ?>
</body>


</html>