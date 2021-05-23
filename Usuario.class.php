<?php 

class Usuario{
    public function login($usuario, $senha){
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM usuario WHERE usuario = :usuario AND senha = :senha");
        $sql -> bindValue('usuario', $usuario);
        $sql -> bindValue('senha', md5($senha));
        $sql-> execute();
            if ($sql-> rowCount()>0){
            $dado = $sql-> fetch();
            $_SESSION['ide'] = $dado['sit'];    
            if($_SESSION['ide']==1 || $_SESSION['ide']==2){
                $_SESSION['id_usuario'] = $dado['id_usuario'];
                return true;
            }}}
        public function logged($id_usuario){
            global $pdo;
            $array = array();

            $sql = "SELECT * FROM usuario WHERE id_usuario = :id_usuario";
            $sql = $pdo-> prepare($sql);
            $sql-> bindValue('id_usuario', $id_usuario);
            $sql-> execute();
            if($sql-> rowCount() > 0){
                $array = $sql-> fetch();
            }else{
                echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário não logado'); window.location.href='login.php';</script>";
            }
            return $array;
            }
    public function verificarFunc($usuario, $numpis){
            global $pdo;
    
            $sqlv = $pdo-> prepare("SELECT usuario FROM usuario WHERE usuario = :usuario OR numpis = :numpis");
            $sqlv-> bindValue('usuario', $usuario);
            $sqlv-> bindValue('numpis', $numpis);
            $sqlv-> execute();
                
            if($sqlv -> rowCount()>= 1){
            echo 'existe já';
                return false;
            }else if($sqlv -> rowCount() == 0){
            return true;
            }else{
            return false;
               }
    
            }    

            public function cadastrarFunc($usuario, $senha, $numpis, $nome, $emailf){

                global $pdo;
                $senhamd5= md5($senha);
                $sql = $pdo-> prepare("INSERT INTO usuario (sit, senha, nome, usuario, numpis, email)
                                       VALUES ('2', '$senhamd5', '$nome', '$usuario', '$numpis', '$emailf' )");
                $sql-> execute();

            }

    public function editar($usuario, $senha, $numpis, $nome, $emailf){
            global $pdo;
            $id_usuario = $_SESSION['ideditar'];
            $senhamd5 = md5($senha);
            $sql = $pdo-> prepare("UPDATE usuario SET senha = '$senhamd5', nome = '$nome', usuario = '$usuario', numpis = '$numpis', email = '$emailf' 
            WHERE id_usuario = :id_usuario"); 
            $sql-> bindValue('id_usuario', $id_usuario);
            $sql-> execute();

            }
    public function mostrar(){
        global $pdo;
        $id_usuario = $_SESSION['ideditar'];
        $mostrar = array();
        $sql = $pdo-> prepare("SELECT * FROM usuario WHERE id_usuario = :id_usuario"); 
        $sql-> bindValue('id_usuario', $id_usuario);
        $sql-> execute();

        if($sql -> rowCount() == 1){
            $mostrar = $sql-> fetch();
            return $mostrar;
        }
    }

    public function cadastrarv($chassi, $preco, $fabricante, $ano, $modelo, $cor, $estq){
        global $pdo;

        $sqlv = $pdo->prepare("SELECT chassi FROM veiculos WHERE chassi = :chassi");
        $sqlv-> bindValue('chassi', $chassi);
        $sqlv-> execute();

        if($sqlv-> rowCount()>1){

    }else if($sqlv-> rowCount()==0){
        $sql = $pdo->prepare("INSERT INTO veiculos(chassi, cor, preco, fabricante, ano, modelo, estq)
                             VALUES ('$chassi', '$cor', '$preco', '$fabricante', '$ano', '$modelo', '$estq')");
        $sql-> execute();                     
    }else{

    }
}   
    public function mostrarveic(){
        global $pdo;
        $id_veiculos = $_SESSION['ideditar'];
        $mostrar = array();
        $sql = $pdo-> prepare("SELECT * FROM veiculos WHERE id_veiculos = :id_veiculos"); 
        $sql-> bindValue('id_veiculos', $id_veiculos);
        $sql-> execute();

        if($sql -> rowCount() == 1){
            $mostrar = $sql-> fetch();
            return $mostrar;
        }
    }

    public function editarveic($chassi, $preco, $fabricante, $ano, $modelo, $cor, $estq){
        global $pdo;
        $id_veiculos = $_SESSION['ideditar'];
        $sql = $pdo-> prepare("UPDATE veiculos SET chassi = '$chassi', cor = '$cor', preco = '$preco',
        fabricante = '$fabricante', ano = '$ano', modelo = '$modelo', estq = '$estq'
        WHERE id_veiculos = :id_veiculos"); 
        $sql-> bindValue('id_veiculos', $id_veiculos);
        $sql-> execute();

        }
    public function cadastrarcliente($nome, $telefone, $email, $CPF, $endereco){
        global $pdo;
        $sqlv = $pdo-> prepare("SELECT CPF FROM cliente Where CPF = :CPF");
        $sqlv-> bindValue('CPF', $CPF);
        $sqlv-> execute();


        if ($sqlv-> rowCount()>1) {
        }else if ($sqlv-> rowCount() == 0){
        $sql = $pdo->prepare("INSERT INTO cliente(Nome, Telefone, E_mail, CPF, Endereco) VALUES ('$nome', '$telefone', '$email', '$CPF', '$endereco')");
        $sql-> execute();                     
        }
    }
    public function editarcli($nome, $telefone, $email, $CPF, $endereco){
        global $pdo;
        $id_cliente = $_SESSION['ideditar'];
        $sql = $pdo-> prepare("UPDATE cliente SET Nome = '$nome', Telefone = '$telefone', E_mail = '$email',
        CPF = '$CPF', Endereco = '$endereco' WHERE id_cliente = :id_cliente"); 
        $sql-> bindValue('id_cliente', $id_cliente);
        $sql-> execute();
    }
    public function mostrarcli(){
        global $pdo;
        $id_cliente = $_SESSION['ideditar'];
        $mostrar = array();
        $sql = $pdo-> prepare("SELECT * FROM cliente WHERE id_cliente = :id_cliente"); 
        $sql-> bindValue('id_cliente', $id_cliente);
        $sql-> execute();

        if($sql -> rowCount() == 1){
            $mostrar = $sql-> fetch();
            return $mostrar;
        }
    }
    public function cadastrarvenda($id_usuario, $preco, $id_veiculos, $estq, $id_cliente, $forma, $servicos, $chassi){
        global $pdo;
        $sql = $pdo-> prepare("SELECT estq FROM veiculos WHERE id_veiculos = :id_veiculos");
        $sql-> bindValue('id_veiculos', $id_veiculos);
        $sql-> execute();
        $dado = $sql-> fetch();
        if ($dado['estq'] == 0) {
            echo  "<script language='javascript' type='text/javascript'>
            alert('Acabou o estoque!'); window.location.href='../venda.php';</script>";
        }else{
        $estq = $dado['estq']-1; 
        $sql = $pdo->prepare("UPDATE veiculos SET estq = '$estq' where chassi = :chassi");
        $sql-> bindValue('chassi', $chassi);
        $sql-> execute();
        $sql = $pdo->prepare("INSERT INTO venda(valortotal, formapagamento, vendedor, cliente, veiculos, servicos)
                                VALUES ('$preco', '$forma', '$id_usuario', '$id_cliente', '$id_veiculos', '$servicos')");
        $sql-> execute();
    
    
    }

            
}
}
?>