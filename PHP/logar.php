<?php
	$db_servername	= "localhost";
	$db_user	=  "root";
	$db_passwd	= "ghostlyTr1nk37";
	$db_name	= "site";

	$DB_CONNECT = mysqli_connect($db_servername, $db_user, $db_passwd, $db_name);

	if(!$DB_CONNECT) {
		echo("Houve um erro ao conectar: ".mysqli_connect_error());
		die();
	}

	if(!empty($_POST) AND (empty($_POST['nome_usuario']) OR empty($_POST['senha_usuario']))) {
		header('Location: ../HTML/logar.html');
		exit;
	}

	$user = $_POST['nome_usuario'];
	$passwd = $_POST['senha_usuario'];
	
	$SQL_OP = "SELECT nome_usuario, senha_usuario FROM user_info WHERE nome_usuario = '$user' AND senha_usuario = '$passwd'
		AND ativo = 1";
	$RESULT = mysqli_query($DB_CONNECT, $SQL_OP);

	if(mysqli_num_rows($RESULT) != 1) {
		echo("Login invalido!");
	} else {
		header("Location: ../HTML/index.html");
		session_start();
		$_SESSION['nome_usuario'] = $user;
	}	
?>


