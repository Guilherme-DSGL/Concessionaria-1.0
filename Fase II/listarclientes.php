<?php
       require_once 'conexao/conexao.php';
       require_once 'verifica.php';
       require_once 'Usuario.class.php';
       require 'header.php';
       
?>

<div class="row marketing">
        <div class="col-lg-12">
          <form class="formlogin">
          <h1>Buscar Clientes</h1>
            <input id="buscacli" type="text" class="form-control" placeholder="Buscar Cliente">
          </form>
          <p id="result"></p>
        </div>
      </div>
<script> 
  $("#buscacli").keyup(function(){
   var buscacli = $("#buscacli").val();
   $.post('conexao/buscar.php', {buscacli: buscacli},function(data3){
    $("#result").html(data3);
        });
      });
      //$("#busca").focusout(function(){
        //$("#result").html("Pesquisar Por Clientes!");
      //});
</script>

</body>
</html>