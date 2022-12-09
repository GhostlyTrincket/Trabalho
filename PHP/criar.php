<?php
	$get_name = $_GET['nome_usuario'];
	$get_passwd = $_GET['senha_usuario'];
	$get_email = $_GET['email_usuario'];
	
	include("./conectar.php");

	$PDO_CONN = conn();
	$SQL_OP = "INSERT INTO user_info(nome_usuario, senha_usuario, email_usuario) VALUES(?, ?, ?)";
	
	$ARG = $PDO_CONN->prepare($SQL_OP);
	$ARG->bindParam(1, $get_name);
	$ARG->bindParam(2, $get_passwd);
	$ARG->bindParam(3, $get_email);

	if($ARG->execute()) {
		echo("Informações registradas!");
		header('Location:./profile.php');

		session_start();
		$_SESSION['nome_usuario'] = $get_name;
	} else {
		echo("Houve um erro em:".$SQL_OP."<br>".mysqli_error());
	}

	mysqli_close($DB_CONNECT);	
?>
