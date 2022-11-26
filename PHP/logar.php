<?php
    // Verifica se houve POST e se o usuário ou a senha é(são) vazio(s)
    if (!empty($_POST) AND (empty($_POST['nome_user']) OR empty($_POST['senha_user']))) {
        header("Location: login.html"); 
        exit;
    }


    $usuario = $_POST['nome_user'];
    $senha = $_POST['senha_user'];

    include("./conectar.php"); 
    $pdo=conectar();

    $sql = "SELECT nome_usuario, senha_usuario FROM user_info WHERE nome_usuario = ? and senha_usuario = ? and ativo = 1";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(1, $usuario);
    $stmt->bindParam(2, $senha);
    $stmt->execute();

    // Validação do usuário/senha digitados

    if  ($stmt->execute()<1) {
        // Mensagem de erro quando os dados são inválidos e/ou o usuário não foi encontrado
        echo "Login inválido!";     
    } else {
        
        echo "entrou";
        header("Location:home.php");
        session_start();
        $_SESSION['nome_user'] = $usuario;
    }

?>
