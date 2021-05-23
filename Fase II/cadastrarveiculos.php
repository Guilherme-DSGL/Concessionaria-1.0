<?php 
    require 'conexao/conexao.php';
    require 'verifica.php';
    require 'header.php';
   
?>
<form class="formlogin" action="conexao/cadastro.php" method="POST">
        <div class="card">
            <div class="cardtop">
            <H2 class="text">Cadastrar Veículo</H2>
            </div>
            <div class="cardcenter">
                <label>Chassi</label>
                <input type="text" name="chassi" placeholder="chassi" maxlength="17" required>
                <br>
                <label>preço</label>
                <input type="text" name="preco" placeholder="SOMENTE NÚMEROS" maxlength="10" required>
                <br>
                <label>Fabricante</label>
                <input type="text" name="fabricante" placeholder="fabricante" maxlength="20" required >
                <br>
                <label>ano</label>
                <input type="text" name="ano" placeholder="ano" maxlength="4" required >
                <br>
                <label>modelo</label>
                <input type="text" name="modelo" placeholder="modelo" maxlength="20" required >
                <br>
                <label>cor</label>
                <input type="text" name="cor" placeholder="cor" maxlength="15" required >
                <br>
                <label>Estoque</label>
                <input type="text" name="estq" placeholder="Estoque" maxlength="5" required >
                <input type="hidden" name="verificar" value="naoeditar">
                <br>
            </div>
            <button class="button btn btn-danger" type="submit">Cadastrar</button>
    </form>

    </html>