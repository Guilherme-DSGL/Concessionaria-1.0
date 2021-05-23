<?php
require_once 'conexao.php';
require_once '../verifica.php';
if (isset($_POST['busca'])) {

$busca =  $_POST['busca'];

global $pdo;
$sql = $pdo->prepare("SELECT * FROM usuario WHERE usuario LIKE '%$busca%'");
$sql-> bindValue('usuario', $busca);
$sql-> execute();
$num = $sql->rowCount();
if($num >0){?>
    <div class="container mb-10">
<table class="table tablep table-hover">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nome</th>
      <th scope="col">Usuário</th>
      <th scope="col">Número PIS</th>
      <th scope="col">Email</th>
      <th scope="col">Ações</th>


    </tr>
  </thead>
   <?php while($row = $sql-> fetch()){?>
    <tbody>
    <tr>
      <th scope="row"><?php echo $row['id_usuario']; ?></th>
      <td><?php echo $row['nome']; ?></td>
      <td><?php echo $row['usuario']; ?></td>
      <td><?php echo $row['numpis']; ?></td>
      <td><?php echo $row['email']; ?></td>


      <td>
      <?php 
      echo $_SESSION['ide'];
          if ($_SESSION['ide']==1) {
          if ($_SESSION['ide']==1 || $_SESSION['ide']==2){?>
          <a href="editar.php?id_usuario=<?php echo $row['id_usuario'];?>" class="btn btn-primary btn-sm">Editar</a>
          <?php } ?>
          <a href="conexao/deletar.php?id_usuario=<?php echo $row['id_usuario'];?>" class="btn btn-danger btn-sm">Deletar </a>
            <?php } ?>
      </td>

    </tr>

   <?php }
}else{
  echo '<div class="container mb-10"> Esta Pessoa Não Existe! </div>';

}
}else if(isset($_POST['buscaveic'])){


$busca =  $_POST['buscaveic'];

global $pdo;
$sql = $pdo->prepare("SELECT * FROM veiculos WHERE modelo LIKE '%$busca%'");
$sql-> bindValue('modelo', $busca);
$sql-> execute();
$num = $sql->rowCount();
if($num >0){?>
    <div class="container mb-10">
<table class="table tablep table-hover">
<thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">chassi</th>
      <th scope="col">cor</th>
      <th scope="col">preco</th>
      <th scope="col">fabricante</th>
      <th scope="col">ano</th>
      <th scope="col">modelo</th>
      <th scope="col">Estoque</th>
      <th scope="col">Ações</th>


    </tr>
  </thead>
   <?php while($row = $sql-> fetch()){?>
    <tbody>
    <tr>
      <th scope="row"><?php echo $row['id_veiculos']; ?></th>
      <td><?php echo $row['chassi']; ?></td>
      <td><?php echo $row['cor']; ?></td>
      <td><?php echo $row['preco']; ?></td>
      <td><?php echo $row['fabricante']; ?></td>
      <td><?php echo $row['ano']; ?></td>
      <td><?php echo $row['modelo']; ?></td>
      <td><?php echo $row['estq']; ?></td>

      <td>
         <a href="editarveic.php?id_veiculos=<?php echo $row['id_veiculos'];?>" class="btn btn-primary btn-sm">Editar</a>
          <a href="conexao/deletar.php?id_veiculos=<?php echo $row['id_veiculos'];?>" class="btn btn-danger btn-sm">Deletar </a>
      </td>
    </tr>

   <?php }
   }else{
    echo '<div class="container mb-10"> Este Veículo Não Existe! </div>';
  
  }
}else if (isset($_POST['buscacli'])){


  $busca =  $_POST['buscacli'];

  global $pdo;
  $sql = $pdo->prepare("SELECT * FROM cliente WHERE Nome LIKE '%$busca%'");
  $sql-> bindValue('Nome', $busca);
  $sql-> execute();
  $num = $sql->rowCount();
  if($num >0){?>
      <div class="container mb-10">
  <table class="table tablep table-hover">
  <thead>
      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Telefone</th>
        <th scope="col">Cpf</th>
        <th scope="col">E_mail</th>
        <th scope="col">Endereço</th>
  
      </tr>
    </thead>
     <?php while($row = $sql-> fetch()){?>
      <tbody>
      <tr>
        <th scope="row"><?php echo $row['Nome']; ?></th>
        <td><?php echo $row['Telefone']; ?></td>
        <td><?php echo $row['CPF']; ?></td>
        <td><?php echo $row['E_mail']; ?></td>
        <td><?php echo $row['Endereco']; ?></td>


  
        <td>
           <a href="editarcli.php?id_cliente=<?php echo $row['id_cliente'];?>" class="btn btn-primary btn-sm">Editar</a>
            <a href="conexao/deletar.php?id_cliente=<?php echo $row['id_cliente'];?>" class="btn btn-danger btn-sm">Deletar </a>
        </td>
      </tr>
  
     <?php }

     }else{
  echo '<div class="container mb-10"> Esta Pessoa Não Existe! </div>';

}


}



?>