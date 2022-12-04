<!DOCTYPE html>
<html>
	<head>
		<title><?php
				session_start();
				echo($_SESSION['nome_usuario']);
			?> profile
		</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
	</head>
	<body>
		<header>
			<p>Olá, <?php echo($_SESSION['nome_usuario']); ?></p>
		</header>
	</body>
</html>
				
