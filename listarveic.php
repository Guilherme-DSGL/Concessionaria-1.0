<?php
       require 'conexao/conexao.php';
       require 'verifica.php';
       
        require_once 'Usuario.class.php';
        require 'header.php';
        global $pdo;
        
        $sqllista = $pdo-> prepare("SELECT * FROM veiculos ");
        $sqllista-> execute();
?>

<div class="row marketing">
        <div class="col-lg-12">
          <form class="formlogin">
          <h1>Buscar Veículos</h1>
            <input id="buscaveic" type="text" class="form-control" placeholder="Buscar Cliente">
          </form>
          <p id="result"></p>
        </div>
      </div>
<script> 
  $("#buscaveic").keyup(function(){
   var buscaveic = $("#buscaveic").val();
   $.post('conexao/buscar.php', {buscaveic: buscaveic},function(data2){
    $("#result").html(data2);
        });
      });
      //$("#busca").focusout(function(){
        //$("#result").html("Pesquisar Por Clientes!");
      //});
</script>


</body>
</html>