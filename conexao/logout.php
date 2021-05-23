<?php
    require 'conexao.php';

    if(isset($_SESSION['ide']) && !empty($_SESSION['ide'])){
        unset($_SESSION['ide']);
        echo  "<script language='javascript' type='text/javascript'>
        alert('Deslogado'); window.location.href= '../login.php';</script>";
        }else{
            echo  "<script language='javascript' type='text/javascript'>
        alert('Usuario nao logado'); window.location.href= '../login.php';</script>";
        }

?>