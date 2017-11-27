<?php
                    include 'fonctions.php'; 
?>

 <html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="css/style.css" />
        <title>Blog</title>
    </head>

	<body>
	
	<form method="post" action="resultfile.php" enctype="multipart/form-data" name="form" id="form">
                    <fieldset>
                        <legend>Ajouter une équipe</legend>
                        <label>Nom :</br>
                            <input type="text" id="name" name="name" value="" />
                        </label>
                        </br>
                        <label>Couleur :</br>
                            <input type="color" value="#FFF" name="teamcolor">
                        </label>
						</br>
						<label> Choisir un format :</br>
							<input type="radio" name="teamform" value="4" checked>Equipe de 4<br>
							<input type="radio" name="teamform" value="8"> Equipe de 8<br>
						</label>
						</br>
							<input type="hidden" name="formType" value="1">
							<input type="submit" value="Créer équipe" />  

                    </fieldset>
	</form>
   
	
	
	
	
	
	
	
	</body>
	</html>