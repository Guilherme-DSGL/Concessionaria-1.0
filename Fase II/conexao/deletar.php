<?php

    require 'conexao.php';
    require '../verifica.php';
    global $pdo;


     if(isset($_GET['id_usuario'])){
        $id_usuario = $_GET['id_usuario'];
        $vendedor = $_GET['id_usuario'];
        $sql = $pdo-> prepare("DELETE FROM venda WHERE vendedor = :vendedor");
         $sql-> bindValue('vendedor', $vendedor);
         $sql->execute();
         $sql = $pdo-> prepare("DELETE FROM usuario WHERE id_usuario = :id_usuario ");
         $sql-> bindValue('id_usuario', $id_usuario);
         $sql->execute();
         echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário deletado  e consequentemente as compras cadastradas com ele foram deletadas'); window.location.href='../listar.php';</script>";
     }else if(isset($_GET['id_veiculos'])){
        $id_veiculos = $_GET['id_veiculos'];
        $veiculos = $_GET['id_veiculos'];
        $sql = $pdo-> prepare("DELETE FROM venda WHERE veiculos = :veiculos ");
        $sql-> bindValue('veiculos', $veiculos);
        $sql->execute();
        $sql = $pdo-> prepare("DELETE FROM veiculos WHERE id_veiculos = :id_veiculos ");
        $sql-> bindValue('id_veiculos', $id_veiculos);
        $sql->execute();
        echo  "<script language='javascript' type='text/javascript'>
        alert('Veiculo deletado e consequentemente as compras cadastradas com ele foram deletadas'); window.location.href='../listarveic.php';</script>";      

    }else if(isset($_GET['id_cliente'])){
        $id_cliente = $_GET['id_cliente'];
        $cliente = $_GET['id_cliente'];
        $sql = $pdo-> prepare("DELETE FROM venda WHERE cliente = :cliente ");
        $sql-> bindValue('cliente', $cliente);
        $sql-> execute();
        $sql = $pdo-> prepare("DELETE FROM cliente WHERE id_cliente = :id_cliente ");
        $sql-> bindValue('id_cliente', $id_cliente);
        $sql->execute();
        echo  "<script language='javascript' type='text/javascript'>
        alert('Cliente deletado  e consequentemente as compras cadastradas com ele foram deletadas'); window.location.href='../listarclientes.php';</script>";
      }else if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = $pdo-> prepare("DELETE FROM venda WHERE id = :id ");
        $sql-> bindValue('id', $id);
        $sql->execute();
        echo  "<script language='javascript' type='text/javascript'>
        alert('Venda deletada'); window.location.href='../listarcomp.php';</script>";
      }else{
          header("Location: ../listarcomp.php");
      }


?>

