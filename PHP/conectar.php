<?php
	function conn() {
		$db_host = "localhost";
		$db_name = "site";
		$db_user = "root";
		$db_passwd = "ghostlyTr1nk37";
		$db_driver = "mysql";

		try {
			$PDO_CONN = new PDO("$db_driver:host=$db_host; dbname=$db_name", $db_user, $db_passwd);
		} catch(PDOException $PDO_ERROR) {
			echo("Houve um erro inesperado.<br> Tipo do erro:".$PDO_ERROR);
			die();
		}

		return $PDO_CONN;
	}
?>
