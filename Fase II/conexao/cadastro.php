<?php
    require 'conexao.php';
    require '../verifica.php';
    if(!isset($_POST['pagamento']) && empty($_POST['pagamento']) && !isset($_POST['servicos']) && empty($_POST['servicos'])){

    if(isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) 
    && !empty($_POST['senha']) && isset($_POST['nome']) && !empty($_POST['nome']) 
    && isset($_POST['numpis']) && !empty($_POST['numpis'])){
      require_once '../Usuario.class.php';
      $u= new Usuario();
      $valor = addslashes($_POST['editar']);
      $usuario =addslashes($_POST['usuario']);
      $senha =addslashes($_POST['senha']);
      $numpis =addslashes($_POST['numpis']);
      $nome =addslashes($_POST['nome']);
      $emailf = addslashes($_POST['emailf']);
      echo $_POST['editar'];
      echo $valor;
      echo $usuario;
      if($valor == 'editar'){
        $u-> editar($usuario, $senha, $numpis, $nome, $emailf);
        echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário Editado'); window.location.href='../listar.php';</script>";

      }else if ($valor == 'naoeditar'){

      if($u->verificarFunc($usuario, $numpis)== false){
        echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário já existe'); window.location.href='../cadastrarfunc.php';</script>";
  
      }else if ($u -> verificarFunc($usuario, $numpis)== true){
        $u-> cadastrarFunc($usuario, $senha, $numpis, $nome, $emailf);
        echo $emailf;
        echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário Cadastrado'); window.location.href='../cadastrarfunc.php';</script>";
      }else{
        echo "<script language='javascript' type='text/javascript'>
        alert('Ocorreu algum erro, não cadastramos o usuario'); window.location.href='../cadastarfunc.php';</script>";
      }
    }
  
    }else if(isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['telefone']) 
    && !empty($_POST['telefone']) && isset($_POST['cpf']) && !empty($_POST['cpf']) 
    && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['endereco']) && !empty($_POST['endereco'])){
    require_once '../Usuario.class.php';
    $valor = addslashes($_POST['verificar']);
    $nome = addslashes($_POST['nome']);
    $telefone = addslashes($_POST['telefone']);
    $email = addslashes($_POST['email']);
    $CPF = addslashes($_POST['cpf']);
    $endereco = addslashes($_POST['endereco']);
    $u = new Usuario();
    if($valor == 'editar'){
        $u-> editarcli($nome, $telefone, $email, $CPF, $endereco);
        echo  "<script language='javascript' type='text/javascript'>
        alert('Cliente editado'); window.location.href='../listarclientes.php';</script>";
      }else if ($valor == 'naoeditar'){
        $u-> cadastrarcliente($nome, $telefone, $email, $CPF, $endereco);
        echo  "<script language='javascript' type='text/javascript'>
        alert('Cliente Cadastrado'); window.location.href='../cadastrarcliente.php';</script>";
      
    }
    

    }else if (isset($_POST['chassi']) && !empty($_POST['chassi']) && isset($_POST['preco']) && !empty($_POST['preco']) 
    && isset($_POST['fabricante']) && !empty($_POST['fabricante']) && isset($_POST['ano']) && !empty($_POST['ano'])
    && isset($_POST['modelo']) && !empty($_POST['modelo']) && isset($_POST['estq']) && !empty($_POST['estq']) && isset($_POST['cor']) 
    && !empty($_POST['cor'])){

    require_once '../Usuario.class.php';
    $u= new Usuario();
    $valor =addslashes($_POST['verificar']);
    $chassi =addslashes($_POST['chassi']);
    $preco =addslashes($_POST['preco']);
    $fabricante =addslashes($_POST['fabricante']);
    $ano =addslashes($_POST['ano']);
    $modelo =addslashes($_POST['modelo']);
    $cor = addslashes($_POST['cor']);
    $estq = addslashes($_POST['estq']);
    echo $chassi;
    echo $valor;
    if ($valor== 'editar') {
        $u-> editarveic($chassi, $preco, $fabricante, $ano, $modelo, $cor, $estq);
        echo  "<script language='javascript' type='text/javascript'>
        alert('Veiculo editado'); window.location.href='../listarveic.php';</script>";        
    }else if($valor == 'naoeditar'){
        
        $u->cadastrarv($chassi, $preco, $fabricante, $ano, $modelo, $cor, $estq);
        echo  "<script language='javascript' type='text/javascript'>
        alert('Veículo Cadastrado'); window.location.href='../cadastrarveiculos.php';</script>";
    }
  }
    }else if (isset($_POST['pagamento']) && !empty($_POST['pagamento']) && isset($_POST['servicos']) && !empty($_POST['servicos'])){  
    if(isset($_POST['chassi']) && !empty($_POST['chassi']) && isset($_POST['preco']) && !empty($_POST['preco']) 
    && isset($_POST['fabricante']) && !empty($_POST['fabricante']) && isset($_POST['ano']) && !empty($_POST['ano'])
    && isset($_POST['modelo']) && !empty($_POST['modelo']) && isset($_POST['cor']) && !empty($_POST['cor']) 
    && isset($_POST['nome']) && !empty($_POST['nome']) && isset($_POST['telefone']) 
    && !empty($_POST['telefone']) && isset($_POST['cpf']) && !empty($_POST['cpf']) 
    && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['endereco']) && !empty($_POST['endereco'])
    && isset($_POST['usuario']) && !empty($_POST['usuario']) && isset($_POST['senha']) 
    && !empty($_POST['senha']) && isset($_POST['funcionario']) && !empty($_POST['funcionario']) 
    && isset($_POST['pagamento']) && !empty($_POST['pagamento']) && isset($_POST['servicos']) && !empty($_POST['servicos'])){
      require_once '../Usuario.class.php';
      $u= new Usuario();
      $usuario =addslashes($_POST['usuario']);
      $senha =addslashes($_POST['senha']);
      if ($u->login($usuario, $senha) == false) {
        echo  "<script language='javascript' type='text/javascript'>
        alert('Senha errada'); window.location.href='../confcompra.php';</script>";
      }else{
        echo 'senha certa';
      $id_cliente = addslashes($_POST['id_cliente']);
      $id_usuario = addslashes($_POST['id_usuario']);
      $id_veiculos = addslashes($_POST['id_veiculos']);
      $chassi = addslashes($_POST['chassi']);
      $preco =addslashes($_POST['preco']);
      $estq = addslashes($_POST['estq']);
      $forma = addslashes($_POST['pagamento']);
      $servicos = addslashes($_POST['servicos']);
      $u-> cadastrarvenda($id_usuario, $preco, $id_veiculos, $estq, $id_cliente, $forma, $servicos, $chassi);
      $_SESSION['cliente'] = $id_cliente;
      $_SESSION['veiculo'] = $id_veiculos;
      echo  "<script language='javascript' type='text/javascript'>
        alert('Boleto Gerado!'); window.location.href='../boleto.php';</script>";
    }
    }



  }
?>