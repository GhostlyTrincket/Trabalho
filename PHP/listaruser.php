<!DOCTYPE html>
<html>
	<head>
		<title>Administration Screen</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script defer language="Javascript">
			function confirmDel(ID) {
				const ANSWR = confirm("Would you like to delete this user?");

				if(ANSWR == true) {
					window.location.href = `excluiruser.php?ID_Usuario=${ID}`;
				}
			}
		</script>
	</head>
	<body>
		<main>
			<table border="1">
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
		
		$SQL_OP = "SELECT ID_Usuario, nome_usuario, email_usuario FROM user_info WHERE ativo = 1";
		$RESULT = mysqli_query($DB_CONNECT, $SQL_OP);

		if(mysqli_num_rows($RESULT) > 0) {
			echo("<thead>
				<tr>
					<th>ID</th>
					<th>Username</th>
					<th>Email</th>
				</tr>
			</thead>
			<tbody>");
			
			while($row = $RESULT->fetch_assoc()) {
				echo("
					<tr>
						<td>".$row['ID_Usuario']."</td>
						<td>".$row['nome_usuario']."</td>
						<td>".$row['email_usuario']."</td>
						<td><a href='editaruser.php?ID_Usuario=".$row['ID_Usuario']."'>Edit User?</a></td>
						<td><a href='javascript:func' onclick='confirmDel(".$row['ID_Usuario'].")'>Exclude User?</a></td>
					</tr>
				");
			}
		} else {
			echo("No results where found.");
		}

		?>
			</table>
		</main>
	</body>
</html>	
