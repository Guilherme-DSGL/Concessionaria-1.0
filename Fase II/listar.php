<?php
       require_once 'conexao/conexao.php';
       require_once 'verifica.php';
       
        require_once 'Usuario.class.php';
        require 'header.php';
       
?>

<div class="row marketing">
        <div class="col-lg-12">
          <form class="formlogin">
          <h1>Buscar Funcionários</h1>
            <input id="busca" type="text" class="form-control" placeholder="Buscar Cliente">
          </form>
          <p id="result"></p>
        </div>
      </div>
<script> 
  $("#busca").keyup(function(){
   var busca = $("#busca").val();
   $.post('conexao/buscar.php', {busca: busca},function(data){
    $("#result").html(data);
        });
      });
      //$("#busca").focusout(function(){
        //$("#result").html("Pesquisar Por Clientes!");
      //});
</script>

</body>
</html>