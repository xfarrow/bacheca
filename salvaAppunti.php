<?php
	session_start();
	include 'create_connection.php';
	$contenuto = $_POST['inputbox'];
	$mioid = $_SESSION['id'];
	$mioCanale = $_SESSION['canale'];
	
	$da_sostituire = array("è","à","ò","ù","<script>","</script>");
	$sostituite = array("&egrave","&agrave","&ograve","&ugrave","[js tag open]","[js tag closed]");
	$contenuto = str_replace($da_sostituire,$sostituite,$contenuto);
	
	
	$sql = "INSERT INTO Appunti(autore,contenuto,canale) VALUES(\"$mioid\",\"$contenuto\",\"$mioCanale\");";
	$conn->query($sql);
	header("Location: ./home.php");
	$conn->close();
?>