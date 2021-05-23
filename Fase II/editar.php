<?php   
    require 'conexao/conexao.php';
    require 'verifica.php'; 
    if ($_SESSION['ide'] == 2) {
        header('Location: indexsis.php');
    }
    require 'header.php';
    $_SESSION['ideditar'] = $_GET['id_usuario'];
    $u = new Usuario();
    $mostrar = $u-> mostrar();
?>

<form class="formlogin" action="conexao/cadastro.php" method="POST">
        <div class="card">
            <div class="cardtop">
            <H2 class="text">Editar funcionário</H2>
            </div>
            <div class="cardcenter">
                <label>Usuário</label>
                <input type="text" name="usuario" placeholder="Usuário" maxlength="30" required value="<?php echo $mostrar['usuario'];?>">
                <br>
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Senha" maxlength="20" required value="<?php echo $mostrar['senha'];?>">
                <br>
                <label>Funcionário</label>
                <input type="text" name="nome" placeholder="funcionario" maxlength="30" required value="<?php echo $mostrar['nome'];?>">
                <br>
                <label>Num pis</label>
                <input type="text" name="numpis" placeholder="Num pis" maxlength="11" required value="<?php echo $mostrar['numpis'];?>">
                <label>Email</label>
                <input type="email" name="emailf" placeholder="email" maxlength="20" required value="<?php echo $mostrar['email'];?>">
                <input type="hidden" name="editar" value='editar'>
            </div>
            <button class="button btn btn-danger" type="submit">Editar</button>
    </form>
</body>
</html>