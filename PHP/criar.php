<?php
	$db_servername	= "localhost";
	$db_user	= "root";
	$db_passwd	= "ghostlyTr1nk37";
	$db_name	= "site";
	
	$DB_CONNECT = mysqli_connect($db_servername, $db_user, $db_passwd, $db_name);

	if(!$DB_CONNECT) {
		echo("Houve um erro ao conectar: ".mysqli_connect_error());
		die();
	}

	$get_name = $_GET['nome_usuario'];
	$get_passwd = $_GET['senha_usuario'];
	$get_email = $_GET['email_usuario'];
	
	$SQL_OP = "INSERT INTO user_info(nome_usuario, senha_usuario, email_usuario)
		VALUES('$get_name', '$get_passwd', '$get_email')";
	
	if(mysqli_query($DB_CONNECT, $SQL_OP)) {
		echo("Informações registradas!");
		header('Location: ./logar.php');
	} else {
		echo("Houve um erro em:".$SQL_OP."<br>".mysqli_error());
	}

	mysqli_close($DB_CONNECT);	
?>
