<?php 

if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) && !empty($_POST['senha'])){
    require 'conexao.php';
    require '../Usuario.class.php';
    $u= new Usuario();

    $usuario =addslashes($_POST['usuario']);
    $senha =addslashes($_POST['senha']);
    echo $usuario;
    echo $senha;

    if($u->login($usuario, $senha) == true){
        echo $_SESSION['ide'];
        echo $_SESSION['id_usuario'];
        echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário Logado'); window.location.href= '../indexsis.php';</script>";
      }else if ($u->login($usuario, $senha) == false) {
        echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário ou senha erradas'); window.location.href= '../login.php';</script>";
      }
      

    }
  ?>