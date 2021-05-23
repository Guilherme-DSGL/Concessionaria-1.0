<?php 
    require 'conexao/conexao.php';
    if(isset($_SESSION['ide'])){
        header('Location: indexsis.php');
    }
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <title>Login Concessionária</title>
    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>

<body>
    <form class="formlogin" action="conexao/logar.php" method="POST">
        <div class="card">
            <div class="cardtop">
            <H2 class="text">Sistema Concessionária</H2>
            <h4>Gerenciar o Sistema</h4>
            </div>

            <div class="cardcenter">
                <label>Usuário</label>
                <input type="text" name="usuario" placeholder="Usuário" required maxlength="60">
                <br>
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Senha" required maxlength="16">
            </div>
            <button class="button btn btn-danger" type="submit">Entrar</button>
    </form>
</body>
</html>