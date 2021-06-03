<?php
include 'conexao/conexao.php';
include 'verifica.php';
include 'header.php';
global $pdo;
$sql = $pdo->prepare("SELECT * FROM venda");
$sql-> execute();

?>

<div class="container">
<div class="container col-md-6 offset-md-4">
    <h1>Lista de Gabaritos</h1><br>
</div>
<table class="table table-hover table table-bordered ">
    <thead class="thead-light">
        <tr>
            <th>Id</th>
            <th>Preço</th>
            <th>Forma de Pagamento</th>
            <th>Cliente</th>
            <th>Ações</th>
        </tr>
    </thead>
    <?php while ($comp = $sql->fetch()){ 
        $id_cliente = $comp['cliente']; 
        $sql2 = $pdo -> prepare("SELECT nome FROM cliente WHERE id_cliente = :id_cliente");
        $sql2-> bindValue('id_cliente', $id_cliente);
        $sql2-> execute();
        $comp2 = $sql2-> fetch(); 
        ?>
        <tbody>
            <th><?php echo $comp['id'] ?></th>
            <th><?php echo $comp['valortotal'] ?></th>
            <td><?php echo $comp['formapagamento'] ?></td>
            <td><?php echo $comp2['nome'] ?></td>
            </td>
            <td>
                <a href="boletolistar.php?id=<?php echo $comp['id'];?>" target="_blank" class="btn btn-sm btn-warning">Ver</a>
            </td>
        </tbody>
    <?php } ?>
</table>
</div>
