    <?php 
    require 'conexao/conexao.php';
    require 'verifica.php';
    if ($_SESSION['ide'] == 2) {
        header('Location: indexsis.php');
    }
    require 'header.php';
    ?>


    <form class="formlogin" action="conexao/cadastro.php" method="POST">
        <div class="card">
            <div class="cardtop">
            <H2 class="text">Cadastrar funcionário</H2>
            </div>
            <div class="cardcenter">
                <label>Usuário</label>
                <input type="text" name="usuario" placeholder="Usuário" maxlength="30" required>
                <br>
                <label>Senha</label>
                <input type="password" name="senha" placeholder="Senha" maxlength="20" required>
                <br>
                <label>Funcionário</label>
                <input type="text" name="nome" placeholder="funcionario" maxlength="30" required>
                <br>
                <label>Num pis</label>
                <input type="text" name="numpis" placeholder="Num pis" maxlength="11" required >
                <br>
                <label>Email</label>
                <input type="email" name="emailf" placeholder="Email" maxlength="20" required >
                <input type="hidden" name='editar' value="naoeditar">
            </div>
            <button class="button btn btn-danger" type="submit">Cadastrar</button>
    </form>
</body>
</html>