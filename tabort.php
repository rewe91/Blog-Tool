<?php
//Includerar common library. 
	require_once("common.library.php");
	
//Du kollar vilket post id som finns i databasen. Skapar en query som har funktionen att ta bort tidigare upplagda inlägg. 
	if ($_GET['p_id']) {
	$p_id = $_GET['p_id'];
	$query = "DELETE FROM Post WHERE p_id='$p_id'";
	$result = mysqli_query($dbcon, $query);
	header("location:posts.php");	
//Här kopplar vi till publicieringssidan. 
} 
?>		
