<?php

 include '../fonctions.php'; 

if($_POST['formType']==1) {


							if (!EMPTY($_POST["name"]) && !EMPTY($_POST["teamcolor"]) && !EMPTY($_POST["teamform"]) ) {
												
												ajoutteam($_POST["name"],$_POST["teamcolor"],$_POST["teamform"]);
													
													header ('location:../index.php?page=addteam.php');

														}
							else {
									header ('location:../index.php?page=addteam.php');									 
									}
									
						   }
						   
?>