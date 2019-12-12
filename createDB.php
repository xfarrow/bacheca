<?php
//Questo file crea il database e le tabelle necessarie.
include 'create_connection.php';
$sql = "CREATE DATABASE $dbname";
$conn->query($sql);
$conn->select_db($dbname);
	
    $sql="CREATE TABLE Anagrafica(
        id INT(5) PRIMARY KEY AUTO_INCREMENT,
        firstname VARCHAR(20) NOT NULL,
        lastname VARCHAR(20) NOT NULL,
		phone_number VARCHAR(20),
		place VARCHAR(30)
        );";

    $sql=$sql."CREATE TABLE Accesso(
        id INT(5) PRIMARY KEY AUTO_INCREMENT,
        email VARCHAR(40) NOT NULL,
        password VARCHAR(40) NOT NULL
        );";
		
	$sql=$sql."create table Appunti(
		id INT(5) PRIMARY KEY AUTO_INCREMENT, 
		autore INT(5) NOT NULL, 
		contenuto VARCHAR(1024) NOT NULL,
		canale INT(3) NOT NULL
		);";

	if($result=$conn->multi_query($sql)){
        echo "Tabelle create<br>";
        }else{
        echo "Errore creazione tabelle ".$conn->error;
    }

	$conn->close();
?>
