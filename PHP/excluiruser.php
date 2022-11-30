<?php
	$ID = (INT)$_GET['ID_Usuario'];
	
	include("./conectar.php");

	$pdo = conn();

	$SQL_OP = "UPDATE user_info SET ativo = 0 WHERE ID_Usuario = :ID";

	$ARG = $pdo->prepare($SQL_OP);
	$ARG->bindParam(':ID', $ID);
	$ARG->execute();

	if(!$ARG) {
		echo("Houve um erro na consulta!");
	}

	header("Location: ./listaruser.php");
?>
