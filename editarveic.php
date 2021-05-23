<?php   
    require 'conexao/conexao.php';
    require 'verifica.php'; 
    require 'header.php';
    $_SESSION['ideditar'] = $_GET['id_veiculos'];
    $u = new Usuario();
    $mostrar = $u-> mostrarveic();
?>

<form class="formlogin" action="conexao/cadastro.php" method="POST">
        <div class="card">
            <div class="cardtop">
            <H2 class="text">Editar Veículo</H2>
            </div>
            <div class="cardcenter">
                <label>Chassi</label>
                <input type="text" name="chassi" placeholder="chassi" maxlength="17" required value="<?php echo $mostrar['chassi'];?>">
                <br>
                <label>cor</label>
                <input type="text" name="cor" placeholder="cor" maxlength="15" required value="<?php echo $mostrar['cor'];?>">
                <br>
                <label>ano</label>
                <input type="text" name="ano" placeholder="ano" maxlength="4" required value="<?php echo $mostrar['ano'];?>">
                <br>
                <label>Preço</label>
                <input type="text" name="preco" placeholder="SOMENTE NÚMEROS" maxlength="10" required value="<?php echo $mostrar['preco'];?>">
                <br>
                <label>Fabricante</label>
                <input type="text" name="fabricante" placeholder="Fabricante" maxlength="20" required value="<?php echo $mostrar['fabricante'];?>">
                <br>
                <label>Modelo</label>
                <input type="text" name="modelo" placeholder="Modelo" maxlength="20" required value="<?php echo $mostrar['modelo'];?>">
                <br>
                <input type="text" name="estq" placeholder="Estoque" maxlength="5" required value="<?php echo $mostrar['estq'];?>">
                <br>
                <input type="hidden" name="verificar" value="editar">
            </div>
            <button class="button btn btn-danger" type="submit">Editar</button>
    </form>
</body>
</html>