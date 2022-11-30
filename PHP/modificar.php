<?php
	$id = $_POST["your_ID"];
	$new_name = $_POST["nome_usuario"];
	$new_passwd = $_POST["senha_usuario"];
	$new_email = $_POST["email_usuario"];

	include("./conectar.php");

	$pdo = conn();
	$SQL_OP = "UPDATE user_info SET nome_usuario = ?, 
			 senha_usuario = ?, email_usuario = ?
			 WHERE ID_Usuario = ?";

	$new_info = [$new_name, $new_passwd, $new_email, $id];
	$ARG = $pdo->prepare($SQL_OP);

	if($ARG->execute($new_info)) {
		echo("Register Altered with Success!");
		header("Location: ./listaruser.php");
	} else {
		echo("Houve um erro em:".$SQL_OP);
	}

?>
