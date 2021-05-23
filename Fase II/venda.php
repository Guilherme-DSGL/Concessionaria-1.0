
<?php 
require 'conexao/conexao.php';
require 'verifica.php';
require 'header.php';
?>
<form class="formlogin" action="confcompra.php" method="POST">
    <div class="card">
        <div class="cardtop">
        <H2 class="text">Venda</H2>
        </div>
        <div class="cardcenter">
        
        <div class="col">
        <label>Cliente que deseja escolher</label>
        <br>
    <select class="form-select" name="id_cliente" required>
        <?php 
        global $pdo;
        $array = array();
        $sql = $pdo-> prepare("SELECT * FROM cliente"); 
        $sql-> execute();  
        while($array = $sql-> fetch()){ ?>
        <option value="<?php echo $array['id_cliente'];?>"><?php echo $array['Nome'];?></option>
        <?php }?>
    </select>
    <br>
    <br>
    <label>Veículo que deseja escolher</label>
    <select class="form-select"  name="modelo" required>
        <?php 
        global $pdo;
        $array = array();
        $sql = $pdo-> prepare("SELECT * FROM veiculos"); 
        $sql-> execute();  
        while($array = $sql-> fetch()){ ?>
        <option value="<?php echo $array['id_veiculos']?>"><?php echo 'Modelo ', $array['modelo'], ' Preço ', $array['preco'];?></option>
        <?php }?>
    </select>
  </div>
        <input  type="hidden" name="vendedor" value='<?php echo $_SESSION['id_usuario'];?>'>

        <button class="button btn btn-danger" type="submit">Dados</button>
</form>

</html>



