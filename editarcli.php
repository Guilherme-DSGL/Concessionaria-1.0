<?php   
    require 'conexao/conexao.php';
    require 'verifica.php'; 
    
    require 'header.php';
    $_SESSION['ideditar'] = $_GET['id_cliente'];
    $u = new Usuario();
    $mostrar = $u-> mostrarcli();
?>

<form class="formlogin" action="conexao/cadastro.php" method="POST">
        <div class="card">
            <div class="cardtop">
            <H2 class="text">Editar Cliente</H2>
            </div>
            <div class="cardcenter">
                <label>Nome</label>
                <input type="text" name="nome" placeholder="Usuário" maxlength="30" required value="<?php echo $mostrar['Nome'];?>">
                <br>
                <label>Cpf</label>
                <input type="text" name="cpf" placeholder="Cpf" maxlength="11" required value="<?php echo $mostrar['CPF'];?>">
                <br>
                <label>telefone</label>
                <input type="text" name="telefone" placeholder="Telefone" maxlength="11" required value="<?php echo $mostrar['Telefone'];?>">
                <br>
                <label>Email</label>
                <input type="email" name="email" placeholder="Email" maxlength="20" required value="<?php echo $mostrar['E_mail'];?>">
                <br>
                <label>Endereço</label>
                <input type="text" name="endereco" placeholder="Endereço" maxlength="30" required value="<?php echo $mostrar['Endereco'];?>">
                <input type="hidden" name="verificar" value='editar'>
            </div>
            <button class="button btn btn-danger" type="submit">Editar</button>
    </form>
</body>
</html>