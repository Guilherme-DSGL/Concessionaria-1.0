<?php
    require 'Usuario.class.php';
    if(isset($_SESSION['ide']) && !empty($_SESSION['ide'])){  
   
    $u = new Usuario();

    $listLogged = $u->logged($_SESSION['id_usuario']);
    $nomeuser = $listLogged['nome'];
    }else{
        echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário não logado'); window.location.href= 'login.php';</script>";
    }
?>