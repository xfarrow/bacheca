<html>
<!--
	Developed by Alessandro Ferro
	Learning purposes only.
	Do not insert your personal info.
	Do not insert illegal texts, you're tracked
-->
<head>
<style>
a:link, a:visited, a:active { color: blue; text-decoration:none;}

a:hover{
	color:blue;
	text-decoration: underline;
}
</style>

	<link rel="icon" href="resources/scolaro.ico">
	<title>Carlo Levi</title>
</head>
<body background="resources/carta.jpg">

<?php
	session_start();
	include 'create_connection.php';
	
	if( isset($_SESSION['login']) ){
		$mioCanale = $_SESSION['canale'];
		echo "<a href=\"./logout.php\">Logout</a>";
		echo "&nbsp;&nbsp;Canale: $mioCanale";
		echo "<center><b><h1>Benvenuto ";
		$mioid = $_SESSION['id'];
		$sql = "SELECT firstname, lastname FROM anagrafica where id='$mioid';";
		$result = $conn->query($sql);
		$row = $result->fetch_assoc();
		echo $row['firstname']." ".$row['lastname'];
	    echo "</h1></b>";
	
	}
	else{
		echo "<center><h1><b>Benvenuto, ";
		echo "<a href=\"login.php\"> accedi </a>";
		echo "o <a href=\"iscrizione.html\"> iscriviti </a></h1></b></center>";
		die();
	}
	
	echo "<form method=\"POST\" action=\"salvaAppunti.php\">
				<textarea rows=\"4\" cols=\"50\" name=\"inputbox\" placeholder=\"Inserisci appunti\" value=\"\"></textarea>
				<br><input type=\"submit\" value=\"Invia\"></form>";

				
	echo "<br><br><h4>";
	$sql = "SELECT * FROM Appunti WHERE canale = '$mioCanale' ORDER BY id DESC;";
	$result = $conn->query($sql);
	
	while($row = $result->fetch_assoc()){
		$id_autore = $row['autore'];
		$sql_name = "SELECT firstname,lastname FROM anagrafica WHERE id='$id_autore';";
		$result_name = $conn->query($sql_name);
		$row_name = $result_name->fetch_assoc();
		$nome_autore = $row_name['firstname'];
		$cognome_autore = $row_name['lastname'];
		echo "<font color = \"red\">".$nome_autore." ".$cognome_autore."</font><br>";
		echo $row['contenuto']."<br><br>";
	}
	echo "</center>";
	$conn->close();
?>

</body>
</html>