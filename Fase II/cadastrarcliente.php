<?php 
require 'conexao/conexao.php';
require 'verifica.php';
require 'header.php';
?>
<form class="formlogin" action="conexao/cadastro.php" method="POST">
    <div class="card">
        <div class="cardtop">
        <H2 class="text">Cadastrar Cliente</H2>
        </div>
        <div class="cardcenter">
            <label>Nome</label>
            <input type="text" name="nome" placeholder="nome" maxlength="30" required>
            <br>
            <label>CPF</label>
            <input type="text" name="cpf" placeholder="cpf" maxlength="11" required>
            <br>
            <label>Telefone</label>
            <input type="text" name="telefone" placeholder="telefone" maxlength="11" required >
            <br>
            <label>E_mail</label>
            <input type="Email" name="email" placeholder="email" maxlength="20" required >
            <br>
            <label>Endereço</label>
            <input type="text" name="endereco" placeholder="Endereço" maxlength="30"  required >
            <br>
            <input type="hidden" name="verificar" value="naoeditar">
            <br>
        </div>
        <button class="button btn btn-danger" type="submit">Cadastrar</button>
</form>

</html>