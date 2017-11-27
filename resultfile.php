<?php

 include 'fonctions.php'; 

if($_POST['formType']==1) {


							if (!EMPTY($_POST["name"]) && !EMPTY($_POST["teamcolor"]) && !EMPTY($_POST["teamform"]) ) {
												
												ajoutteam($_POST["name"],$_POST["teamcolor"],$_POST["teamform"]);
													
													header ('location:addteam.php');

														}
							else {
									header ('location:addteam.php/?page_id=$page_id&company=$company&zip=$zip&city=$city&pname=$pname&mail=$mail&phone=$phone&subject=$subject&message="');									 
									}
									
						   }
						   
?>