<?php
    require 'conexao/conexao.php';
    require 'verifica.php';
    require 'header.php';
    if(isset($_POST['id_cliente']) && !empty($_POST['id_cliente']) && isset($_POST['modelo']) 
    && !empty($_POST['modelo']) && isset($_POST['vendedor']) && !empty($_POST['vendedor'])){
        $cliente = addslashes($_POST['id_cliente']);
        $modelo = addslashes($_POST['modelo']);
        $vendedor = addslashes($_POST['vendedor']);
        $u = new Usuario();
        echo $modelo;
        $_SESSION['ideditar'] = $cliente;
        $mostrar = $u-> mostrarcli();
        $_SESSION['ideditar'] = $modelo;
        $mostrarveic = $u->mostrarveic(); 
        $_SESSION['ideditar'] = $vendedor;
        $mostrarven = $u->mostrar(); 
    ?>
    <div align-middle>
     <form  class="row g3" action="conexao/cadastro.php" method="POST">
            <div class="col-md-4 mw-100 ">
                <div class="cardtop">
                    <H2 class="text"> Confirmar Compra</H2>
                </div>
                <div class="cardcenter">
                    <label>Nome</label>
                    <input class="form-control" type="text" name="nome" placeholder="Usuário" required value="<?php echo $mostrar['Nome'];?>" readonly>
                    <br>
                    <label>Cpf</label>
                    <input class="form-control" type="text" name="cpf" placeholder="Cpf" required value="<?php echo $mostrar['CPF'];?>" readonly>
                    <br>
                    <label>telefone</label>
                    <input class="form-control" type="text" name="telefone" placeholder="Telefone" required value="<?php echo $mostrar['Telefone'];?>" readonly>
                    <br>
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" placeholder="Email" required value="<?php echo $mostrar['E_mail'];?>" readonly>
                    <br>
                    <label>Endereço</label>
                    <input class="form-control" type="text" name="endereco" placeholder="Endereço" required value="<?php echo $mostrar['Endereco'];?>" readonly>
                    <input  type="hidden" name="id_cliente" value='<?php echo $mostrar['id_cliente'];?>'>
                </div>
            </div>
            <div class="col-md-3">
                <div class="cardtop">
                    <H2 class="text">Dados do Carro</H2>
                </div>
                    <div class="cardcenter">
                        <label>Chassi</label>
                        <input class="form-control" type="text" name="chassi" placeholder="chassi" required value="<?php echo $mostrarveic['chassi'];?>" readonly>
                        <br>
                        <label>Cor</label>
                        <input class="form-control" type="text" name="cor" placeholder="cor" required value="<?php echo $mostrarveic['cor'];?>" readonly>
                        <br>
                        <label>Ano</label>
                        <input class="form-control" type="text" name="ano" placeholder="ano" required value="<?php echo $mostrarveic['ano'];?>" readonly>
                        <br>
                        <label>Preço</label>
                        <input class="form-control" type="text" name="preco" placeholder="preco" required value="<?php echo $mostrarveic['preco'];?>" readonly>
                        <br>
                        <label>Fabricante</label>
                        <input class="form-control" type="text" name="fabricante" placeholder="Fabricante" required value="<?php echo $mostrarveic['fabricante'];?>" readonly>
                        <br>
                        <label>Modelo</label>
                        <input class="form-control" type="text" name="modelo" placeholder="Modelo" required value="<?php echo $mostrarveic['modelo'];?>" readonly>
                        <input  type="hidden" name="estq" value='<?php echo $mostrarveic['estq'];?>'>
                        <input  type="hidden" name="id_veiculos" value='<?php echo $mostrarveic['id_veiculos'];?>'>
                        <div class="">
            <button class="button btn btn-danger" type="submit">Enviar</button>
            </div>
                    </div>    
            </div>

            <div class="col-md-4">
                <div class="cardtop">
                    <H2 class="text">Dados do Vendedor</H2>
                </div>
                    <div class="cardcenter">
                        <label>Usuário</label>
                        <input class="form-control" type="text" name="usuario" placeholder="Usuário" required value="<?php echo $mostrarven['usuario'];?>" readonly>
                        <br>
                        <label>Funcionário</label>
                        <input class="form-control" type="text" name="funcionario" placeholder="funcionario" required value="<?php echo $mostrarven['nome'];?>" readonly>
                        <br>
                        <label>Num pis</label>
                        <input  class="form-control" type="text" name="numpis" placeholder="Num pis" required value="<?php echo $mostrarven['numpis'];?>"readonly>
                        <br>
                        <label>Senha</label>
                        <input  class="form-control" type="password" name="senha" placeholder="Senha" maxlength="20" required>
                        <input  type="hidden" name="id_usuario" value='<?php echo $mostrarven['id_usuario'];?>'>

                    </div>
                        <br>
                        <label>Serviços adicionais</label> 
                        <input  class="form-control" type="text" name="servicos" placeholder="Serviços adicionais" maxlength="30" required>
                        <br>
                        <label>Modo de pagamento</label>
                        <select class="form-select" name="pagamento" required>
                        <option  value="credito"> Cartão de Crédito</option>
                        <option  value="boleto"> Boleto Bancário</option>
                        <option  value="debito"> Débito</option>
                        </select>
            </div>
            
    </form>
    </div>
</body>
</html>

<?php }else{ header('Location: venda.php');}?>
