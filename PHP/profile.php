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
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../CSS/4.css" />
	</head>
	<body>
		<header>
			<h2>Você logou como:</h2>
			<h1>
				<?php 
					echo($_SESSION['nome_usuario']); 
				?>
			</h1>
		</header>
		<main>
			<div class="user-historia">
				<section id="posts-comentarios">
					<nav class="lista">
						<ol>
<!--os dois links, temporariamente, irão ser links mortos-->
							<li><a href="#">Posts feitos</a></li>
							<li><a href="#">Comentarios feitos</a></li>
						</ol>
					</nav>
				</section>
			</div>
			<div class="user-config">
				<div class="titulo-campo">
					<h4>Definições da conta</h4>
				</div>
				<nav id="configs">
					<ol>
<!-- esses daqui também vão ser... até eu pelo menos arranjar um jeieto disso daqui funcionar em conjunto com o "modificaruser.php", de qualquer jeito-->
						<li><a href="#">Senha, nome de usuario, email</a></li>
					</ol>
				</nav>
			</div>
		</main>
	</body>
</html>
				
