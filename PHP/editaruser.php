<!DOCTYPE html>
<html>
	<head>
		<title>Edition Page</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<?php
			$ID = $_GET['ID_Usuario'];

			include("./conectar.php");

			$pdo = conn();
			$SQL_OP = "SELECT ID_Usuario, nome_usuario, senha_usuario, email_usuario
				FROM user_info 
				WHERE ID_Usuario = ?";

			$ARG = $pdo->prepare($SQL_OP);
			$ARG->bindParam(1, $ID);
			$ARG->execute();

			while($row = $ARG->fetch(PDO::FETCH_ASSOC)) {
				$user_id = $row['ID_Usuario'];
				$user_name = $row['nome_usuario'];
				$user_pass = $row['senha_usuario'];
				$user_email = $row['email_usuario'];
			};
		?>

		<main>
			<h2>Insert your new information here!</h2>
			<form action="./modificar.php" method="POST">
				<div class="seu-id campo">
					<label for="your_ID">ID:</label>
					<input type="text" name="your_ID" id="your_ID" value="<?php echo($user_id); ?>" min="1" readonly required>
				<div class="novo-username campo">
					<label for="nome_usuario">Insert here your new username:</label>
					<input type="text" name="nome_usuario" id="nome_usuario" value="<?php echo($user_name); ?>" required>
				</div>
				<div class="nova-senha campo">
					<label for="senha_usuario">Insert here your new password:</label>
					<input type="password" name="senha_usuario" id="senha_usuario" value="<?php echo($user_pass); ?>" required>
				</div>
				<div class="novo-email campo">
					<label for="email_usuario">Insert here your new email:</label>
					<input type="email" name="email_usuario" id="email_usuario" value="<?php echo($user_email); ?>" required>
				</div>
				<button type="submit" id="enviar" <?php echo("onclick=window.location.href=modificar.php?ID_Usuario=".$ID.";"); ?>>Alter information</button>
			</form>
		</main>
	</body>
</html>
