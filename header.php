
<!DOCTYPE html>
<html >
<head>
    <title>Página do Funcionário</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <link REL="SHORTCUT ICON" href="img/logo.ico">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>
<body>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light mw-100">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Sistema Concessionária</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="indexsis.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Funcionário
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php if($_SESSION['ide']==1){?>
            <li><a class="dropdown-item" href="cadastrarfunc.php">Cadastrar</a></li>
            <?php } ?>
            <li><a class="dropdown-item" href="listar.php">Ver Funcionários</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Veiculos
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="cadastrarveiculos.php">Cadastrar</a></li>
            <li><a class="dropdown-item" href="listarveic.php">Editar ou Excluir</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="venda.php">Cadastrar Compra </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastrar Clientes
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="cadastrarcliente.php">Cadastrar</a></li>
            <li><a class="dropdown-item" href="listarclientes.php">Editar ou Excluir</a></li>
          </ul>
        </li>
      </ul>
      <div class="form-inline my-2 my-lg-0">
        <label class="me-4">Olá,&#32<?php echo $nomeuser?></label>
        <a class="btn btn-outline-success" href="conexao/logout.php"> Logout</a>
      </div>
    </div>
  </div>
</nav>

</html>