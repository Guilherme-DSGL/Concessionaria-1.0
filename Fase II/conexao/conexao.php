<?php 
    session_start();
    $localhost = "localhost";
    $user = "root";
    $password = "";
    $banco = "concessionaria";
    global $pdo;
try{
    $pdo = new PDO("mysql:dbname=" .$banco."; host=" .$localhost, $user, $password);
    $pdo-> setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "ERRO: ", $e->getMessage();
    exit;
}
$senha = '123';
$senhamd5 = md5($senha);
    $sql = $pdo-> prepare("SHOW COLUMNS FROM `venda` LIKE 'servicosadicionais'");
    $sql-> execute();
    if($sql -> rowCount() == 1){
    $sql = $pdo-> prepare("INSERT INTO usuario(sit, senha, nome, usuario) VALUES ('1', '$senhamd5', 'Gerente', 'Gerente')");
    $sql-> execute();
    $sql = $pdo-> prepare("ALTER TABLE venda DROP servicosadicionais");
    $sql-> execute();  
    $sql = $pdo-> prepare("ALTER TABLE `venda` ADD `servicos` varchar(130)");
    $sql-> execute();
    $sql = $pdo-> prepare("ALTER TABLE `venda` MODIFY `formapagamento` varchar(60)");
    $sql-> execute();
    $sql = $pdo-> prepare("ALTER TABLE venda DROP desconto");
    $sql-> execute();   
    }

?>