<?php
	if(!empty($_POST) AND (empty($_POST['nome_usuario']) OR empty($_POST['senha_usuario']))) {
		header('Location: ../HTML/logar.html');
		exit;
	}

	$user = $_POST['nome_usuario'];
	$passwd = $_POST['senha_usuario'];
	
	include("./conectar.php");

	$PDO_OP = conn();	
	$SQL_OP = "SELECT nome_usuario, senha_usuario FROM user_info WHERE nome_usuario = ? AND senha_usuario = ? AND ativo = 1";

	$ARG = $PDO_OP->prepare($SQL_OP);
	$ARG->bindParam(1, $user);
	$ARG->bindParam(2, $passwd);

	if($ARG->execute() < 1) {
		echo("Login invalido!");
	} else {
		header("Location: profile.php");
		session_start();
		$_SESSION['nome_usuario'] = $user;
	}	
?>


