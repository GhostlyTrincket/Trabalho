<?php

$nome=$_GET['nome_user'];
$email=$_GET['email_user'];
$senha=$_GET['senha_user'];

// Criando conexão
include("./conectar.php");
    $pdo = conectar();

$sql = "INSERT INTO usuario(nome_usuario, senha_usuario, email_usuario) VALUES (?,?,?,?)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(1, $nome);
$stmt->bindParam(2, $login);
$stmt->bindParam(3, $senha);
$stmt->bindParam(4, $email);




if ($stmt->execute()) {
  echo "Registro Cadastrado";
  header("Location: listar.php");
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}